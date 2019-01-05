<?php
namespace api\models\form;

use common\models\AgentDaily;
use common\models\Daily;
use common\models\UserLoginLog;
use api\models\UserStat;
use Yii;
use yii\base\Model;
use api\models\User;
use common\helpers\Util;
/**
 * Login form
 */
class LoginForm extends Model
{
    public $username;
    public $password;
    public $deviceid;


    /**
     * @var User
     */
    private $_user;

    // const GET_API_TOKEN = 'generate_api_token';
    const AFTER_LOGIN = 'after_login';

    public function init ()
    {
        parent::init();
        // $this->on(self::GET_API_TOKEN, [$this, 'onGenerateApiToken']);
        $this->on(self::AFTER_LOGIN, [$this, 'onAfterLogin']);
    }


    /**
     * @inheritdoc
     * 对客户端表单数据进行验证的rule
     */
    public function rules()
    {
        return [
            [['username', 'password'], 'required'],
            ['password', 'validatePassword'],
            ['username', 'validateOneline'],
            ['deviceid', 'string'],
        ];
    }


    /**
     * 校验登录状态
     */
    public function validateOneline($attribute, $params)
    {
        if (!$this->hasErrors()) {
            $this->_user = $this->getUser();
            if ($this->_user->online_status == User::STATUS_ONLINE) {
                $this->addError($attribute, '该账号已经登录');
            }
        }
    }


    /**
     * 自定义的密码认证方法
     */
    public function validatePassword($attribute, $params)
    {
        if (!$this->hasErrors()) {
            $this->_user = $this->getUser();
            if (!$this->_user || !$this->_user->validatePassword($this->password)) {
                $this->addError($attribute, '用户名或密码错误。');
            }
        }
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'username' => '用户名',
            'password' => '密码',
            'deviceid' => '设备ID',
        ];
    }

    /**
     * Logs in a user using the provided username and password.
     *
     * @return boolean|User whether the user is logged in successfully
     */
    public function login()
    {
        if ($this->validate()) {
            // $this->trigger(self::GET_API_TOKEN);
            $this->trigger(self::AFTER_LOGIN);
            return $this->_user;
        } else {
            return null;
        }
    }

    /**
     * 根据用户名获取用户的认证信息
     *
     * @return \api\models\User
     */
    protected function getUser()
    {
        if ($this->_user === null) {
            $this->_user = User::findByUsername($this->username);
        }

        return $this->_user;
    }


    public function onAfterLogin()
    {
        $userAgent = yii::$app->request->getUserAgent();
        $userIp = Yii::$app->request->getUserIP();

        //更新token和设置在线状态
        $this->_user->generateApiToken();
        $this->_user->online_status = User::STATUS_ONLINE;
        $this->_user->save(false);

        $this->deviceid = $this->deviceid ? $this->deviceid : md5($userIp . $userAgent);

        $deivceType = Util::getDeviceType();
        if (substr($this->deviceid, 0, 2) == 'H5') {
            $clientType = 'H5';
        } else if (substr($this->deviceid, 0, 3) == 'Web') {
            $clientType = 'Web';
        } else if ($deivceType == UserLoginLog::DEVICE_TYPE_IOS || $deivceType == UserLoginLog::DEVICE_TYPE_ANDROID) {
            $clientType = 'App';
        } else {
            $clientType = 'Other';
        }


        //记录登录日志
        $loginData = [
            'user_id' => $this->_user->id,
            'username' => $this->username,
            'login_ip' => sprintf("%u", ip2long($userIp)),
            'device_type' => $deivceType,
            'client_type' => $clientType,
            'deviceid' => $this->deviceid,
            'user_agent' => Yii::$app->request->getUserAgent(),
            'client_version' => Util::getClientVersion()
        ];

        $model = new UserLoginLog($loginData);
        //$model->setAttributes($loginData);
        $model->save(false);

        //更新用户统计表
        $userStat = $this->_user->userStat;

        if (!$userStat) {
            $userStat = new UserStat(['user_id' => $this->_user->id]);
        } else if ($userStat->last_login_at < strtotime(date('Y-m-d 00:00:00'))) {
            //活跃用户+1
            Daily::addCounter(['dau' => 1]);
            AgentDaily::addCounter(['agent_id' => $this->_user->invite_agent_id, 'dau' => 1]);
        }
        $data = [
            'last_login_at' => time(),
            'login_number' => (int)$userStat->login_number + 1,
            'log_id' => $model->id,
            'last_login_ip' => $userIp,
        ];
        $userStat->setAttributes($data);
        $userStat->save(false);

    }
}