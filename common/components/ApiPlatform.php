<?php
/**
 * Author: lf
 * Blog: https://blog.feehi.com
 * Email: job@feehi.com
 * Created at: 2017-10-08 00:30
 */

namespace common\components;

use common\clients\ClientAbstract;
use common\libs\Constants;
use common\models\Platform;
use common\models\PlatformAccountRecord;
use common\models\PlatformUser;
use common\models\UserAccountRecord;
use common\models\UserLoginPlatformLog;
use Yii;
use yii\base\Exception;
use yii\base\InvalidArgumentException;
use yii\base\InvalidCallException;
use yii\base\InvalidConfigException;
use yii\helpers\Json;
use yii\db\Exception as dbException;

class ApiPlatform extends Platform
{

    /**
     * @var ClientAbstract
     */
    public $client = null;

    /**
     * @var PlatformUser
     */
    public $platformUser = null;

    public $user_id;

    /**
     * 尝试注册次数
     * @var int
     */
    public $registerTryTimes = 5;

    public static function getApi($code, $user_id = null)
    {
        $self = self::findByCode($code);
        $self->setClient();
        if ($user_id)
            $self->setPlatformUser($user_id);
        return $self;
    }

    public function setClient()
    {
        parent::init();
        $class = 'common\clients\\' . ucfirst(strtolower($this->code)) . 'Client';
        $params = [];
        if ($this->other_param) {
            $params = Json::decode($this->other_param);
            if (!is_array($params))
                $params = [];
        }
        $params['class'] = $class;
        $params['api_host'] = $this->api_host;
        $params['app_id'] = $this->app_id;
        $params['app_secret'] = $this->app_secret;
        $params['login_url'] = $this->login_url;

        $this->client = Yii::createObject($params);

        if (!$this->client instanceof ClientAbstract) {
            throw new InvalidConfigException('平台API客户端创建失败');
        }

    }

    public function setPlatformUser($user_id)
    {
        $this->user_id = $user_id;
        $this->platformUser = PlatformUser::findOne(['platform_code' => $this->code, 'user_id' => $user_id]);
    }


    /**
     * 返回用户登陆信息
     * @param null $redirectUrl 重定向地址
     * @param int $amount 上分值，-1不上分，0上所有分，>0上具体分数
     * @return bool|mixed
     */
    public function getLoginInfo($redirectUrl = null, $amount = 0)
    {

        //注册用户
        if (!$this->platformUser) {
            $this->register();
        }

        //登陆
        $res = $this->client->login($this->platformUser, $redirectUrl);
        if ($res['error'] != '') {
            throw new InvalidCallException($res['error']);
        }
        //开始上分
        if ($amount >= 0) {
            try {
                $this->addAmount($amount);
            } catch (Exception $e) {
            }
        }

        $this->platformUser->last_login_at = time();
        $this->platformUser->last_login_ip = yii::$app->request->getUserIP();
        $this->platformUser->save(false);
        $log_id = 0;
        if ($this->platformUser->user->userStat) {
            $log_id = $this->platformUser->user->userStat->log_id;
        }
        //记录平台登录日志
        $log = new UserLoginPlatformLog(['user_id' => $this->platformUser->user_id, 'platform_id' => $this->id, 'login_log_id' => $log_id]);
        $log->save(false);
        return $res['data'];
    }

    /**
     * 调用平台注册接口注册用户
     * @return bool
     */
    public function register()
    {
        if ($this->platformUser) return true;

        if (!$this->user_id) {
            throw new InvalidArgumentException('未设置用户ID');
        }

        $model = new PlatformUser(['platform_code' => $this->code, 'user_id' => $this->user_id]);

        if (!$model->platform) {
            throw new InvalidArgumentException('错误的游戏类型');
        }
        if (!$model->user) {
            throw new InvalidArgumentException('错误的用户ID');
        }

        //生成随机密码
        $password = yii::$app->security->generateRandomString(8);
        $loop = 0;
        $res['error'] = '';
        do {
            if ($loop > $this->registerTryTimes) {
                if ($res['error'])
                    throw new InvalidCallException($res['error']);
                throw new InvalidCallException('账号注册失败！');
            }
            //生成用户名
            $username = $model->user->username . ($loop ? rand(100, 999) : '');

            $res = $this->client->register($username, $password, $model->user);
            if ($res['error'] == '') {
                if (isset($res['data']['account_id'])) {
                    $model->game_account_id = $res['data']['account_id'];
                }
                $model->platform_id = $model->platform->id;
                $model->username = $model->user->username;
                $model->game_account = $username;
                $model->game_password = $password;
                $model->first_login_ip = yii::$app->request->getUserIP();

                if (!$model->save(false)) {
                    throw new InvalidCallException('保存平台账户失败！');
                }
                $this->platformUser = $model;
                return true;
            }

            $loop++;
        } while ($loop);

    }

    /**
     * 上分
     * @param int $amount
     * @return bool|int
     */
    public function addAmount($amount = 0)
    {
        if ($amount < 0)
            throw new InvalidArgumentException('上分额度不能小于0');

        $model = $this->platformUser;
        if (!$model)
            throw new InvalidArgumentException('平台用户账户不存在！');

        $account = $model->user->account;

        if ($amount == 0)
            $amount = (int)$account->available_amount;
        if ($amount > $account->available_amount)
            throw new InvalidArgumentException('上分额度不能大于用户现有额度！');

        if ($amount == 0) return 0;
        $tr = Yii::$app->db->beginTransaction();
        try {

            $account->available_amount -= $amount;
            if (!$account->save(false))
                throw new dbException('更新用户账户失败！');
            $model->available_amount += $amount;
            if (!$model->save(false))
                throw new dbException('更新用户平台账户失败！');
            $res = $this->client->addAmount($amount, $model);
            if ($res['error'] != '') {
                throw new InvalidCallException($res['error']);
            }

            $userAccountRecord = new UserAccountRecord();
            $userAccountRecord->user_id = $this->platformUser->user_id;
            $userAccountRecord->switch = UserAccountRecord::SWITCH_OUT;
            $userAccountRecord->trade_no = $this->id;
            $userAccountRecord->trade_type_id = Constants::TRADE_TYPE_ADDAMOUNT;
            $userAccountRecord->remark = "用户上分到" . $this->name;
            $userAccountRecord->amount = $amount;
            $userAccountRecord->after_amount = $account->available_amount;
            $userAccountRecord->save(false);

            $platformRecord = new PlatformAccountRecord();
            $platformRecord->platform_id = $this->id;
            $platformRecord->trade_no = $userAccountRecord->id;
            $platformRecord->user_id = $this->platformUser->user_id;
            $platformRecord->name = '用户上分';
            $platformRecord->amount = $amount;
            $platformRecord->switch = PlatformAccountRecord::SWITCH_OUT;
            $platformRecord->remark = "用户上分到" . $this->name;
            $platformRecord->save(false);

            $tr->commit();
            return $amount;
        } catch (\Exception $e) {
            //回滚
            $tr->rollBack();
            throw new InvalidCallException($e->getMessage());
        }
    }

    /**
     * 回收分数，0为回收平台所有分数
     * @param int $amount
     * @return int
     */
    public function getAmount($amount = 0)
    {
        if ($amount < 0)
            throw new InvalidArgumentException('回收分数额度不能小于0');

        $model = $this->platformUser;
        if (!$model)
            throw new InvalidArgumentException('平台用户账户不存在！');


        $qamount = $this->queryAmount();
        if ($amount == 0) {
            $amount = $qamount;
        } elseif ($amount > $qamount) {
            throw new InvalidArgumentException('平台可回收分数额度小于:' . $amount);
        }

        $res = $this->client->reduceAmount($amount, $model);
        if ($res['error'] != '') {
            throw new InvalidCallException($res['error']);
        }
        if ($res['data'] == 0) return 0;

        $tr = Yii::$app->db->beginTransaction();
        try {
            $account = $model->user->account;
            $account->available_amount += $res['data'];
            if (!$account->save(false))
                throw new dbException('更新用户账户失败！');
            $model->available_amount = $qamount - $res['data'];
            if (!$model->save(false))
                throw new dbException('更新用户平台账户失败！');

            $userAccountRecord = new UserAccountRecord();
            $userAccountRecord->user_id = $this->platformUser->user_id;
            $userAccountRecord->switch = UserAccountRecord::SWITCH_IN;
            $userAccountRecord->trade_no = $this->id;
            $userAccountRecord->trade_type_id = Constants::TRADE_TYPE_REDUCEAMOUNT;
            $userAccountRecord->remark = "用户从" . $this->name . '下分';
            $userAccountRecord->amount = $res['data'];
            $userAccountRecord->after_amount = $account->available_amount;
            $userAccountRecord->save(false);

            $platformRecord = new PlatformAccountRecord();
            $platformRecord->platform_id = $this->id;
            $platformRecord->trade_no = $userAccountRecord->id;
            $platformRecord->user_id = $this->platformUser->user_id;
            $platformRecord->name = '用户下分';
            $platformRecord->amount = $res['data'];
            $platformRecord->switch = PlatformAccountRecord::SWITCH_IN;
            $platformRecord->remark = "用户从" . $this->name . '下分';
            $platformRecord->save(false);

            $tr->commit();
            return $res['data'];

        } catch (\Exception $e) {
            @$this->client->addAmount($res['data'], $model);
            $tr->rollBack();
            throw new InvalidCallException($e->getMessage());
        }
    }

    /**
     * 查询分数
     */
    public function queryAmount()
    {
        $model = $this->platformUser;
        if (!$model)
            throw new InvalidArgumentException('平台用户账户不存在！');
        $res = $this->client->queryAmount($model);
        if ($res['error'] != '') {
            throw new InvalidCallException($res['error']);
        }
        return $res['data'];
    }


}