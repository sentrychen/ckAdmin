<?php
/**
 * Author: lf
 * Blog: https://blog.feehi.com
 * Email: job@feehi.com
 * Created at: 2016-03-23 12:54
 */

namespace backend\models\form;

use common\models\Options;

class SettingAgentForm extends \common\models\Options
{
    public $agent_status;  //代理状态，0：正常代理，1：关闭代理注册，2：关闭代理登陆，9：停止代理

    public $agent_max_level;   //最大代理层级

    public $agent_max_rebate;     //最大占成

    public $agent_default_rebate;   //默认占成

    public $agent_xima_status;      //洗码状态

    public $agent_xima_type;        //洗码类型

    public $agent_xima_rate;        //洗码率

    public $agent_backend_url;     //代理后台网址

    public $agent_user_reg_url;     //用户注册网址

    public $agent_reg_url;          //代理注册网址

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'agent_status' => '代理状态',
            'agent_max_level' => '最大代理层级',
            'agent_max_rebate' => '最大占成',
            'agent_default_rebate' => '默认占成',
            'agent_backend_url' => '代理后台网址',
            'agent_user_reg_url' => '用户注册网址',
            'agent_reg_url' => '代理注册网址',
            'agent_xima_status' => '查看洗码',
            'agent_xima_type' => '洗码类型',
            'agent_xima_rate' => '洗码率'
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [
                [
                    'agent_backend_url',
                    'agent_user_reg_url',
                    'agent_reg_url'
                ],
                'url'
            ],
            [['agent_status', 'agent_max_level', 'agent_xima_type', 'agent_xima_status'], 'integer'],
            [['agent_max_rebate', 'agent_default_rebate', 'agent_xima_rate'], 'double', 'min' => 0, 'max' => 100],
            [['agent_max_rebate', 'agent_default_rebate', 'agent_xima_rate'], 'filter', 'filter' =>function($value){return $value/100;}],
            ['agent_default_rebate', 'compare', 'compareAttribute' => 'agent_max_rebate', 'operator' => '<='],
        ];
    }

    /**
     * 填充代理配置
     *
     */
    public function getAgentSetting()
    {
        $names = $this->getNames();
        foreach ($names as $name) {
            $model = self::findOne(['name' => $name]);
            if ($model != null) {
                $this->$name = $model->value;
            } else {
                $this->name = '';
            }
        }
    }


    /**
     * 写入代理配置到数据库
     *
     * @return bool
     */
    public function setAgentConfig()
    {
        $names = $this->getNames();
        foreach ($names as $name) {
            $model = self::findOne(['name' => $name]);
            if ($model != null) {
                $value = $this->$name;
                $value === null && $value = '';
                $model->value = $value;
                $result = $model->save();
            } else {
                $model = new Options();
                $model->name = $name;
                $model->value = '';
                $result = $model->save();
            }
            if ($result == false) {
                return $result;
            }
        }
        return true;
    }

}