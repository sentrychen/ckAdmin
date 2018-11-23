<?php
/**
 * Author: lf
 * Blog: https://blog.feehi.com
 * Email: job@feehi.com
 * Created at: 2017-10-08 00:30
 */

namespace common\clients;

interface ClientInterface
{
    /**
     * 登陆
     * @param \common\models\PlatformUser $user
     * @param string $redirectUrl
     * @return mixed
     */
    public function login($user, $redirectUrl = null);

    /**
     * 注册
     * @param $username
     * @param $password
     * @param \common\models\User $user
     * @return mixed
     */
    public function register($username, $password, $user);

    /**
     * 查询分数
     * @param \common\models\PlatformUser $user
     * @return mixed
     */
    public function queryAmount($user);

    /**
     * 上分
     * @param $amount
     * @param \common\models\PlatformUser $user
     * @return mixed
     */
    public function addAmount($amount, $user);

    /**
     * 下分
     * @param $amount
     * @param \common\models\PlatformUser $user
     * @return mixed
     */
    public function reduceAmount($amount, $user);

    /**
     * 获取错误信息
     * @return string
     */
    public function getError();
}