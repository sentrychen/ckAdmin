<?php

namespace api\models\form;

use api\models\Agent;
use common\helpers\Util;
use Yii;
use yii\base\Model;
use api\models\User;
use common\models\Daily;
use common\models\AgentDaily;
/**
 * Register form
 */
class RegisterForm extends Model
{
    public $username;
    public $password;
    public $deviceid;
    public $promo_code;


    private $_user;


    public function init()
    {
        parent::init();

    }


    /**
     * @inheritdoc
     * 对客户端表单数据进行验证的rule
     */
    public function rules()
    {
        return [
            [['username', 'password'], 'required'],
            [['username', 'password', 'promo_code'], 'filter', 'filter' => 'trim'],
            [
                'username',
                'unique',
                'targetClass' => User::class,
                'message' => '用户名已经被使用'
            ],
            ['username', 'string', 'min' => 2, 'max' => 32],
            ['password', 'string', 'min' => 6],
            ['deviceid', 'string'],
            ['promo_code', 'integer'],
            [
                'promo_code',
                'exist',
                'targetClass' => Agent::class,
                'message' => '邀请码不正确'
            ],

        ];
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
            'promo_code' => '邀请码',
        ];
    }

    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function register()
    {
        if (!$this->validate()) {
            return null;
        }

        $user = new User();
        $user->username = $this->username;
        $user->password = $this->password;
        $user->ip = yii::$app->request->getUserIP();
        $user->deviceid = $this->deviceid ? $this->deviceid : md5($user->ip . yii::$app->request->getUserAgent());
        $deivceType = Util::getDeviceType();
        if (substr($user->deviceid, 0, 2) == 'H5') {
            $deivceType = $deivceType . ' H5';
        } else if (substr($user->deviceid, 0, 3) == 'Web') {
            $deivceType = $deivceType . ' Web';
        } else if ($deivceType == 'iOS' || $deivceType == 'Android') {
            $deivceType = $deivceType . ' App';
        }

        $user->origin = $deivceType;
        if (empty($this->promo_code)) {
            $this->promo_code = yii::$app->option->agent_default_code;
        }
        $agent_id = Agent::find()->select('id')->where(['promo_code' => $this->promo_code])->scalar();

        if (!$agent_id) {
            $this->addError('promo_code', '邀请码不正确');
            return null;
        }

        $user->invite_agent_id = $agent_id;

        return  $user->save()? $user : null;
    }
}