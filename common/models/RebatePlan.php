<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%rebate_plan}}".
 *
 * @property int $id 返佣方案ID
 * @property string $name 方案名称
 * @property int $agent_id 创建代理ID 0 为系统默认
 * @property int $status 启用状态 0禁用 1启用
 * @property int $is_default 是否为默认方案
 * @property int $created_at 创建日期
 * @property int $updated_at 更新日期
 */
class RebatePlan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%rebate_plan}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['agent_id', 'status', 'is_default', 'created_at', 'updated_at'], 'integer'],
            [['name'], 'string', 'max' => 64],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => '返佣方案ID',
            'name' => '方案名称',
            'agent_id' => '创建代理ID 0 为系统默认',
            'status' => '启用状态 0禁用 1启用',
            'is_default' => '是否为默认方案',
            'created_at' => '创建日期',
            'updated_at' => '更新日期',
        ];
    }


}
