<?php
/**
 * Author: lf
 * Blog: https://blog.feehi.com
 * Email: job@feehi.com
 * Created at: 2017-10-08 00:30
 */

namespace common\clients;

use common\helpers\Util;

abstract class  ClientAbstract
{
    protected $_error;

    public static function post($url, $data = null, $header = false, $timeout = 30)
    {
        return static::request($url, $data, $header, $timeout);
    }

    public static function request($url, $data = null, $header = false, $timeout = 30)
    {
        return util::request($url, $data, $header, $timeout);
    }

    public static function get($url, $data = null, $header = false, $timeout = 30)
    {
        $url .= (strpos($url, '?') ? '&' : '?') . http_build_query($data);
        return static::request($url, null, $header, $timeout);
    }

    /**
     * 登陆
     * @param \common\models\PlatformUser $user
     * @param string $redirectUrl
     * @return mixed
     */
    abstract public function login($user, $redirectUrl = null);

    /**
     * 注册
     * @param $username
     * @param $password
     * @param \common\models\User $user
     * @return mixed
     */
    abstract public function register($username, $password, $user);

    /**
     * 查询分数
     * @param \common\models\PlatformUser $user
     * @return mixed
     */
    abstract public function queryAmount($user);

    /**
     * 上分
     * @param $amount
     * @param \common\models\PlatformUser $user
     * @return mixed
     */
    abstract public function addAmount($amount, $user);

    /**
     * 下分
     * @param $amount
     * @param \common\models\PlatformUser $user
     * @return mixed
     */
    abstract public function reduceAmount($amount, $user);

    /**
     * 获取错误
     * @return mixed
     */
    public function getError()
    {
        return $this->_error;
    }

    /**
     * 设置错误
     * @param $error
     * @return $this
     */
    public function setError($error)
    {
        $this->_error = $error;
        return $this;
    }
}