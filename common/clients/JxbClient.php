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

    protected $apiHost = "http://43.249.206.216:8888";


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
            if ($res['code'] == 0) return $res['data']['id'] ?? true;
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

        $data['userid'] = $user->game_account_id;
        $data['score'] = $amount;
        $data['type'] = 0;
        $res = static::get($url, $data);
        if ($res) {
            $res = Json::decode($res);
            if (isset($res['code']) && $res['code'] == 0) return $amount;
            $this->setError(isset($res['message']) ? $res['message'] : '上分失败');
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
        $url = "{$this->apiHost}/admin/backend/points";
        $data['userid'] = $user->game_account_id;
        $data['score'] = $amount;
        $data['type'] = 1;
        $res = static::get($url, $data);
        if ($res) {
            $res = Json::decode($res);
            if (isset($res['code']) && $res['code'] == 0) return $amount;
            $this->setError(isset($res['message']) ? $res['message'] : '下分失败');
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
        $url = "{$this->apiHost}/admin/backend/user";
        //$authData = $user->decodeAuthData();
        $data['userid'] = $user->game_account_id;
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
     * @param int $begindate 开始日期
     * @param int $enddate 开始日期
     * @return array
     */
    public function betList($begindate, $enddate)
    {
        $this->setError(false);
        $data['beginTime'] = $begindate * 1000;
        $data['endTime'] = $enddate * 1000;
        $url = "{$this->apiHost}/admin/backend/user/gamerecord/list";
        return Json::decode(static::get($url, $data));
        
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
        $res = Json::decode($res);
        if (!$res || !isset($res['code'])) {
            $this->setError('调用登录接口失败');
            return false;
        }
        if ($res['code'] != 0) {
            $this->setError($res['message']);
            return false;
        }
        return $res['data'];
    }

}