<?php
namespace api\models\form;

use common\models\AgentDaily;
use common\models\Daily;
use common\models\PlatformDaily;
use common\models\UserLoginLog;
use common\models\PlatformUser;
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


    private $_user;

    const GET_API_TOKEN = 'generate_api_token';
    const AFTER_LOGIN = 'after_login';

    public function init ()
    {
        parent::init();
        $this->on(self::GET_API_TOKEN, [$this, 'onGenerateApiToken']);
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
        ];
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
        ];
    }

    /**
     * Logs in a user using the provided username and password.
     *
     * @return boolean whether the user is logged in successfully
     */
    public function login()
    {
        if ($this->validate()) {
            $this->trigger(self::GET_API_TOKEN);
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

    /**
     * 登录校验成功后，为用户生成新的token
     * 如果token失效，则重新生成token
     */
    public function onGenerateApiToken ()
    {
        if (!User::apiTokenIsValid($this->_user->api_token)) {
            $this->_user->generateApiToken();
            $this->_user->save(false);
        }
    }

    public function onAfterLogin()
    {
        $client = Util::getClientType();
        switch ($client)
        {
            case 'IOS':
                $client_type = UserLoginLog::CLIENT_TYPE_IOS;
                break;
            case 'Android':
                $client_type = UserLoginLog::CLIENT_TYPE_ANDROID;
                break;
            case 'H5':
                $client_type = UserLoginLog::CLIENT_TYPE_H5;
                break;
            default:
                $client_type = UserLoginLog::CLIENT_TYPE_H5;

        }

        $loginData = [
            'user_id' => $this->_user->id,
            'username' => $this->username,
            'login_ip' => Yii::$app->request->getUserIP(),
            'client_type' => $client_type,
            'client_version' => Yii::$app->request->getUserAgent(),
        ];

        $model = new UserLoginLog();
        $model->setAttributes($loginData);
        $model->save(false);

        $start_time = strtotime(date('Y-m-d 00:00:00'));
        $end_time = strtotime(date('Y-m-d 23:59:59'));
        $user = User::findOne(['id' => $this->_user->id]);
        $agent_id = $user->invite_agent_id;
        $num = UserLoginLog::find()->select('user_id')
               ->where(['user_id'=>$this->_user->id])
               ->andFilterWhere(['between', 'created_at', $start_time, $end_time])
               ->count();
        if($num==1){
            Daily::addCounter(['dau'=>$num]);
            AgentDaily::addCounter(['agent_id'=>$agent_id,'dau'=>$num]);
            $platform_user = PlatformUser::findOne(['user_id'=>$this->_user->id]);
            if($platform_user){
                $platform_id = $platform_user->platform_id?$platform_user->platform_id:0;
                PlatformDaily::addCounter(['platform_id'=>$platform_id,'dau'=>$num]);
            }

        }
    }
}