<?php
/**
 * Author: lf
 * Blog: https://blog.feehi.com
 * Email: job@feehi.com
 * Created at: 2017-10-08 00:30
 */

namespace common\services;


use common\clients\ClientAbstract;
use common\models\PlatformUser;
use yii;
use yii\base\InvalidArgumentException;
use yii\base\InvalidCallException;
use yii\base\InvalidConfigException;
use yii\db\Exception as dbException;

class PlatformService extends PlatformUser
{

    /**
     * @var $client \common\clients\ClientAbstract
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
        $this->register();

        //登陆
        $loginData = $this->getClient()->login($this, $redirectUrl);

        //开始上分
        $this->addAmount();


        if ($this->getClient()->getError())
            throw new InvalidCallException($this->getClient()->getError());

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
                throw new InvalidArgumentException('无效的用户ID');
            }
            $password = yii::$app->security->generateRandomString(8);
            $loop = 0;
            do {
                if ($loop > 5) {
                    if ($this->getClient()->getError())
                        throw new InvalidCallException($this->getClient()->getError());
                    throw new InvalidCallException('账号注册失败！');
                }
                //生成用户名
                $username = $user->username . ($loop ? rand(100, 999) : '');
                if ($this->getClient()->register($username, $password, $user)) {
                    $this->game_account = $username;
                    $this->game_password = $password;
                    $this->first_login_ip = yii::$app->request->getUserIP();
                    $this->save(false);
                    $this->getClient()->setError(false);
                    return true;
                }
                $loop++;
            } while ($loop);
        } else {
            return true;
        }

    }

    public function getClient()
    {
        if (!$this->client instanceof ClientAbstract) {
            if (!$platform = $this->platform)
                return false;
            $clients = yii::$app->params['clients'];
            if (!isset($clients[$platform->code]))
                return false;
            $this->client = yii::createObject($clients[$platform->code]);
            if (!$this->client instanceof ClientAbstract)
                return false;
        }
        return $this->client;
    }

    /**
     * 上分
     */
    public function addAmount($amount = 0)
    {

        $account = $this->user->account;
        if ($amount <= 0)
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
            $addAmount = $this->getClient()->addAmount($amount, $this);
            if (false === $addAmount) {
                throw new InvalidCallException($this->getClient()->getError());
            }
            if ($addAmount != $amount) {
                $tr->rollBack();
                return true;
            } else
                $tr->commit();
        } catch (\Exception $e) {
            Yii::error($e->getMessage());
            // $this->addError('user_id', $e->getMessage());
            //回滚
            $tr->rollBack();
            throw new InvalidCallException($e->getMessage());
        }
        return true;
    }

    /**
     * 回收分数
     */
    public function getAmount()
    {
        $amount = $this->queryAmount();
        $reduce = 0;
        if ($amount > 0) {
            $reduce = $this->getClient()->reduceAmount($amount, $this);
            if ($reduce > 0) {
                $tr = Yii::$app->db->beginTransaction();
                try {
                    $account = $this->user->account;
                    $account->available_amount += $reduce;
                    if (!$account->save(false))
                        throw new dbException('更新用户账户失败！');
                    $this->available_amount = 0;
                    if (!$this->save(false))
                        throw new dbException('更新用户平台账户失败！');
                    $tr->commit();

                } catch (\Exception $e) {
                    Yii::error($e->getMessage());
                    @$this->getClient()->addAmount($reduce, $this);
                    $tr->rollBack();
                }
            }
        }

        return $reduce;

    }

    /**
     * 查询分数
     */
    public function queryAmount()
    {
        return $this->getClient()->queryAmount($this);
    }

}