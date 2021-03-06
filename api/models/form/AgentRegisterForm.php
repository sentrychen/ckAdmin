<?php

namespace api\models\form;

use api\models\Agent;
use Yii;
use yii\base\Model;

/**
 * Register form
 */
class AgentRegisterForm extends Model
{
    public $username;
    public $password;
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
                'targetClass' => Agent::class,
                'message' => '代理名称已经被使用'
            ],
            ['username', 'string', 'min' => 2, 'max' => 32],
            ['password', 'string', 'min' => 6],
            ['promo_code', 'integer', 'min' => 10000],
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
            'promo_code' => '邀请码',
        ];
    }

    /**
     * Signs user up.
     *
     * @return Agent|null the saved model or null if saving fails
     */
    public function register()
    {
        if (!$this->validate()) {
            return null;
        }

        $user = new Agent();
        $user->username = $this->username;
        $user->password = $this->password;
        if (empty($this->promo_code)) {
            $this->promo_code = yii::$app->option->agent_default_code;
        }
        $agent_id = Agent::find()->select('id')->where(['promo_code' => $this->promo_code])->scalar();

        if (!$agent_id) $agent_id = 0;

        $user->parent_id = $agent_id;

        return $user->save() ? $user : null;
    }
}