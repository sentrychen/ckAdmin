<?php
namespace api\models\form;

use common\models\Daily;
use common\models\UserLoginLog;
use Yii;
use yii\base\Model;
use api\models\User;

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
        $loginData = [
            'user_id' => $this->_user->id,
            'username' => $this->username,
            'login_ip' => Yii::$app->request->getUserIP(),
            //'client_type' => 1 todo
        ];
        $model = new UserLoginLog($loginData);
        $model->save(false);

        //$num = UserLoginLog::find()->where(['created_at'> strtotime(date('Y-m-d'))])->distinct('user_id')->count('user_id')->one();
        //Daily::updateCounter(['dau'=>$num]);
    }
}