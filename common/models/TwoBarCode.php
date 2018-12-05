<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
/**
 * This is the model class for table "{{%two_bar_code}}".
 *
 * @property int $id 自增id
 * @property string $name 名称
 * @property string $url url地址
 * @property string $icon 图标
 * @property string $url_code url数据流
 * @property double $sort 排序
 * @property int $status 账号状态 1：启用 0：停用
 * @property int $created_at 创建时间
 * @property int $updated_at 最后修改时间
 */
class TwoBarCode extends \yii\db\ActiveRecord
{
    const STATUS_ENABLED = 1;
    const STATUS_DISABLED = 0;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%two_bar_code}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'url', 'created_at'], 'required'],
            [['url_code'], 'string'],
            [['sort'], 'number'],
            [['status', 'created_at', 'updated_at'], 'integer'],
            [['name', 'url', 'icon'], 'string', 'max' => 255],
        ];
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
    public function attributeLabels()
    {
        return [
            'id' => '自增id',
            'name' => '名称',
            'url' => 'url地址',
            'icon' => '图标',
            'url_code' => 'url数据流',
            'sort' => '排序',
            'status' => '开启状态',
            'created_at' => '创建时间',
            'updated_at' => '最后修改时间',
        ];
    }

    public static function getStatuses($key = null)
    {
        $status = [
            self::STATUS_ENABLED => '启用',
            self::STATUS_DISABLED => '停用',
        ];
        return $status[$key] ?? $status;
    }
}
