<?php

namespace common\models;

use common\models\XimaLevel;
use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "{{%xima_plan}}".
 *
 * @property int $id 代理洗码方案ID
 * @property string $name 方案名称
 * @property int $status 启用状态0 禁用 1启用
 * @property int $type 方案类别 1 用户 2代理
 * @property int $agent_id 方案创建者ID，0为系统
 * @property int $is_default 是否为默认方案
 * @property int $created_at 创建日期
 * @property int $updated_at 更新日期
 */
class XimaPlan extends \yii\db\ActiveRecord
{

    const TYPE_USER = 1;
    const TYPE_AGENT = 2;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%xima_plan}}';
    }

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            TimestampBehavior::class,
        ];
    }


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['status', 'type', 'agent_id', 'is_default', 'created_at', 'updated_at'], 'integer'],
            [['name'], 'string', 'max' => 64],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => '代理洗码方案ID',
            'name' => '方案名称',
            'status' => '启用状态',
            'type' => '方案类别',
            'agent_id' => '方案创建者ID，0为系统',
            'is_default' => '是否为默认方案',
            'created_at' => '创建日期',
            'updated_at' => '更新日期',
        ];
    }

    /**
     * @return Agent|\yii\db\ActiveQuery|null
     */
    public function getAgent()
    {
        return $this->hasOne(Agent::class, ['id' => 'agent_id']);
    }


    public function getLevels()
    {
        return $this->hasMany(XimaLevel::class, ['plan_id' => 'id'])->orderBy(['level' => SORT_ASC]);
    }
}
