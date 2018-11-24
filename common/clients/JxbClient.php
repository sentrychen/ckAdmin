<?php
/**
 * Author: lf
 * Blog: https://blog.feehi.com
 * Email: job@feehi.com
 * Created at: 2017-10-08 00:30
 */

namespace common\clients;


use yii\helpers\Json;


class JxbClient extends ClientAbstract
{

    protected $apiHost = "http://103.231.167.85:8888";


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
        $data['username'] = $username;
        $data['password'] = $password;
        $res = static::get("{$this->apiHost}/user/register", $data);
        if ($res) {
            $res = Json::decode($res);
            if ($res['code'] == 0) return true;
            $this->setError($res['message']);
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
        $url = "{$this->apiHost}/admin/backend/points";
        $authData = $user->decodeAuthData();
        $data['userid'] = $authData['userid'];
        $data['score'] = $amount;
        $data['type'] = 0;
        $res = static::get($url, $data);
        if ($res) {
            $res = Json::decode($res);
            if ($res['code'] == 0) return $amount;
            $this->setError($res['message']);
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
        $url = "{$this->apiHost}/backend/points";
        $authData = $user->decodeAuthData();
        $data['userid'] = $authData['userid'];
        $data['score'] = $amount;
        $data['type'] = 1;
        $res = static::get($url, $data);
        if ($res) {
            $res = Json::decode($res);
            if ($res['code'] == 0) return $amount;
            $this->setError($res['message']);
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
        $url = "{$this->apiHost}/backend/user";
        $authData = $user->decodeAuthData();
        $data['userid'] = $authData['userid'];
        $res = static::get($url, $data);
        if ($res) {
            $res = Json::decode($res);
            if ($res['code'] == 0) return $res['data']['availableAmount'];
            $this->setError($res['message']);
        } else
            $this->setError('查询分数接口调用失败');
        return 0;
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
     * 获取登陆url
     *
     * @param \common\models\PlatformUser $user
     * @param null $redirectUrl
     * @return string
     */
    public function login($user, $redirectUrl = null)
    {
        $this->setError(false);
        $post['username'] = $user->game_account;
        $post['password'] = $user->game_password;
        $res = static::post("{$this->apiHost}/user/login", $post);
        if (!$res) {
            $this->setError('调用登录接口失败');
            return false;
        }
        $res = Json::decode($res);
        if ($res['code'] != 0) {
            $this->setError($res['message']);
            return false;
        }

        $data['auth'] = $res['data']['data']['token'];
        $data['userid'] = $res['data']['data']['userid'];
        //验证登录
        $res2 = static::get("{$this->apiHost}/user/login/validateAuthorization", $data);
        if (!$res2) {
            $this->setError('调用登录验证接口失败');
            return false;
        }
        $res2 = Json::decode($res2);
        if ($res2['code'] != 0) {
            $this->setError($res2['message']);
            return false;
        }

        $user->encodeAuthData($data);
        return $res['data']['data'];
    }

}