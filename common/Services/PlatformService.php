<?php
/**
 * Author: lf
 * Blog: https://blog.feehi.com
 * Email: job@feehi.com
 * Created at: 2017-10-08 00:30
 */

namespace common\services;


use common\clients\ClientInterface;
use common\models\PlatformUser;
use yii;
use yii\base\InvalidArgumentException;
use yii\base\InvalidCallException;
use yii\base\InvalidConfigException;
use yii\db\Exception as dbException;

class PlatformService extends PlatformUser
{

    /**
     * @var $client \common\clients\ClientInterface
     */
    public $client;

    /**
     * 返回用户登陆信息
     * @param null $redirectUrl
     * @return bool|mixed
     */
    public function getLoginInfo($redirectUrl = null)
    {

        //注册用户
        if (!$this->register()) return false;

        //开始上分
        if (!$this->addAmount()) return false;

        //登陆
        if (!$loginData = $this->getClient()->login($this, $redirectUrl)) return false;

        $this->last_login_at = time();
        $this->last_login_ip = yii::$app->request->getUserIP();
        $this->save(false);
        return $loginData;
    }

    public function register()
    {
        if (!$this->id) {
            $user = $this->user;
            if (!$user) {
                return false;
            }
            $password = yii::$app->security->generateRandomString(8);
            $loop = 0;
            do {
                if ($loop > 5) {
                    return false;
                }
                //生成用户名
                $username = $user->username . ($loop ? rand(100, 999) : '');
                if ($this->getClient()->register($username, $password, $user)) {
                    $this->game_account = $username;
                    $this->game_password = $password;
                    $this->first_login_ip = yii::$app->request->getUserIP();
                    $this->save(false);
                    return true;
                } else {
                    $this->addError('user_id', $this->getClient()->getError());
                }
                $loop++;
            } while ($loop);
        } else {
            return true;
        }

    }

    public function getClient()
    {
        if (!$this->client instanceof ClientInterface) {
            if (!$platform = $this->platform)
                throw new InvalidArgumentException('无效的平台ID');
            $clients = yii::$app->params['clients'];
            if (!isset($clients[$platform->code]))
                throw new InvalidConfigException('客户端对象未配置');
            $this->client = yii::createObject($clients[$platform->code]);
            if (!$this->client instanceof ClientInterface)
                throw new InvalidCallException('创建客户端对象失败');
        }
        return $this->client;
    }

    /**
     * 上分
     */
    public function addAmount()
    {

        $account = $this->user->account;
        $amount = (int)$account->available_amount;
        if ($amount <= 0) return true;

        $tr = Yii::$app->db->beginTransaction();
        try {
            $account->available_amount = 0;
            if (!$account->save(false))
                throw new dbException('更新用户账户失败！');
            $this->available_amount += $amount;
            if (!$this->save(false))
                throw new dbException('更新用户平台账户失败！');
            if (!$this->getClient()->addAmount($amount, $this)) {
                throw new dbException('调用上分接口失败！');
            }

            $tr->commit();
        } catch (\Exception $e) {
            Yii::error($e->getMessage());
            $this->addError('user_id', $e->getMessage());
            //回滚
            $tr->rollBack();
            return false;
        }
        return true;
    }

    /**
     * 回收分数
     */
    public function recycleAmount()
    {
        return false;
    }

    /**
     * 回收分数
     */
    public function queryAmount()
    {
        return false;
    }

}