<?php
/**
 * Author: lf
 * Blog: https://blog.feehi.com
 * Email: job@feehi.com
 * Created at: 2017-10-08 00:30
 */

namespace common\clients;


use common\helpers\Util;
use yii\helpers\Json;

class HjClient implements ClientInterface
{

    protected $sign = "35274a28abbd18857d523912603758d0";
    protected $apiHost = "http://api.hj8828.com/api";
    protected $loginHost = "http://appapp.gzlwcg.com/login-third.html";

    protected $_error;

    /**
     * 用户注册
     *
     * @param string $username 用户名
     * @param string $password 密码
     * @param \common\models\User $user
     * @return boolean
     */
    public function register($username, $password, $user)
    {

        $this->setError(false);

        $url = "{$this->apiHost}/regedit?sign={$this->sign}&username={$username}&password={$password}&ratio_switch={$user->xima_type}&ratio={$user->xima_rate}&ratio_setting={$user->xima_status}";

        $res = Util::request($url);
        if ($res) {
            $res = Json::decode($res);
            if ($res['status'] == 1) return true;
            $this->setError($res['err_msg']);
        } else
            $this->setError('注册接口调用失败');
        return false;
    }


    /**
     * 查找用户
     * @param string $username 用户名
     * @return array
     */
    public function findUser($username)
    {

        $this->setError(false);
        $url = "{$this->apiHost}/finduser?sign={$this->sign}&username={$username}";
        return $this->request($url);
    }

    /**
     * 修改密码
     *
     * @param string $username 用户名
     * @param string $newpwd 新密码
     * @param string $oldpwd 旧密码
     * @return array
     */
    public function editPwd($username, $newpwd, $oldpwd)
    {
        $this->setError(false);
        $url = "{$this->apiHost}/editpwd?sign={$this->sign}&username={$username}&newpwd={$newpwd}&oldpwd={$oldpwd}";
        return $this->request($url);
    }

    /**
     * 给用户加分
     *
     * @param $amount
     * @param \common\models\PlatformUser $user
     * @return boolean
     */
    public function addAmount($amount, $user)
    {
        $this->setError(false);
        $amount = (float)$amount;
        $url = "{$this->apiHost}/addintegral?sign={$this->sign}&username={$user->game_account}&password={$user->game_password}&integral={$amount}";

        $res = Util::request($url);
        if ($res) {
            $res = Json::decode($res);
            if ($res['status'] == 1) return $amount;
            if ($res['status'] == 1001) return 0;
            $this->setError($res['err_msg']);
        } else
            $this->setError('上分接口调用失败');
        return false;
    }

    /**
     * 给用户减分
     *
     * @param $amount
     * @param \common\models\PlatformUser $user
     * @return boolean
     */
    public function reduceAmount($amount, $user)
    {
        $this->setError(false);
        $amount = (float)$amount;
        $url = "{$this->apiHost}/reduceintegral?sign={$this->sign}&username={$user->game_account}&password={$user->game_password}&integral={$amount}";
        $res = Util::request($url);
        if ($res) {
            $res = Json::decode($res);
            if ($res['status'] == 1) return true;
            $this->setError($res['err_msg']);
        } else
            $this->setError('下分接口调用失败');
        return false;
    }

    /**
     * 查询用户分数
     *
     * @param \common\models\PlatformUser $user
     * @return mixed
     */
    public function queryAmount($user)
    {

        $this->setError(false);
        $url = "{$this->apiHost}/query?sign={$this->sign}&username={$user->game_account}";
        $res = Util::request($url);
        if ($res) {
            $res = Json::decode($res);
            if ($res['status'] == 1) return $res['integral'];
            $this->setError($res['err_msg']);
        } else
            $this->setError('查询分数接口调用失败');
        return false;
    }

    /**
     * 代理下属所有用户投注数据报表
     *
     * @param string $begindate 开始日期
     * @param string $enddate 开始日期
     * @return array
     */
    public function betList($begindate, $enddate)
    {
        $this->setError(false);
        $begin = strtotime($begindate);
        $end = strtotime($enddate);
        $days = ceil(($end - $begin) / 86400);
        if ($days > 7 || $days < 0) {
            return $this->_resMsg('日期范围不能超过7天！');
        }
        $url = "{$this->apiHost}/betlist?sign={$this->sign}&begindate=" . urlencode(date('Y-m-d H:i:s', $begin)) . "&enddate=" . urlencode(date('Y-m-d H:i:s', $end));
        return $this->request($url);
    }

    /**
     * 代理上下分记录查询
     *
     * @param string $client_id 代理本地上下分 id 号
     * @return array
     */
    public function queryXibu($client_id)
    {
        $this->setError(false);
        $url = "{$this->apiHost}/query_xibu?sign={$this->sign}&client_id={$client_id}";
        return $this->request($url);
    }

    /**
     * 修改密码（无原密码）
     * @param string $username 用户名
     * @param string $newpwd 新密码
     * @return array
     */
    public function newPassword($username, $newpwd)
    {
        $this->setError(false);
        if ($username == "") {
            return $this->_resMsg('用户名不能为空！');
        }
        if ($newpwd == "") {
            return $this->_resMsg('新密码不能为空！');
        }
        $url = "{$this->apiHost}/new_password?sign={$this->sign}&username={$username}&newpwd={$newpwd}";
        return $this->request($url);
    }

    /**
     * 获取登陆url
     *
     * @param \common\models\PlatformUser $user
     * @param null $redirectUrl
     * @return string
     */
    public function login($user, $redirectUrl = null)
    {
        $this->setError(false);
        $password = md5(md5($user->game_password));

        return $this->loginHost . '?loginUrl=' . urlencode($redirectUrl) . '&username=' . $user->game_account . '&password=' . $password . '&sign=' . $this->sign;
    }

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