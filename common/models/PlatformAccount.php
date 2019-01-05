<?php

namespace common\models;

use common\behaviors\NoticeBehavior;
use common\components\notice\AdminNoticeEvent;
use common\components\notice\UserNoticeEvent;
use common\helpers\Util;
use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "{{%platform_account}}".
 *
 * @property int $platform_id 代理ID
 * @property string $available_amount 可用余额
 * @property string $frozen_amount 冻结金额
 * @property string $alarm_amount 告警额度
 * @property int $updated_at 更新日期
 * @property int $created_at 创建日期
 */
class PlatformAccount extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%platform_account}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['platform_id'], 'required'],
            [['platform_id', 'updated_at', 'created_at'], 'integer'],
            [['available_amount', 'frozen_amount', 'alarm_amount'], 'number'],
            [['platform_id'], 'unique'],
        ];
    }


    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            TimestampBehavior::class,
            NoticeBehavior::class,
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        $chart = Yii::$app->params['moneyChart'] ?? '¥';
        return [
            'platform_id' => '代理ID',
            'available_amount' => '可用余额(' . $chart . ')',
            'frozen_amount' => '冻结金额(' . $chart . ')',
            'alarm_amount' => '告警金额(' . $chart . ')',
            'updated_at' => '更新日期',
            'created_at' => '创建日期',
        ];
    }

    /**
     * @return Platform|\yii\db\ActiveQuery
     */
    public function getPlatform()
    {
        return $this->hasOne(Platform::class, ['id' => 'platform_id']);
    }

    public static function getToalAvailableAmount()
    {
        return static::find()->sum('available_amount');
    }


    public function afterSave($insert, $changedAttributes)
    {
        parent::afterSave($insert, $changedAttributes);
        if (isset($changedAttributes['available_amount'])
            && $changedAttributes['available_amount'] >= $this->alarm_amount
            && $this->available_amount < $this->alarm_amount) {
            $message = $this->platform->name . "资金额度只剩（" . Util::formatMoney($this->available_amount) . "）低于告警额度（" . Util::formatMoney($this->alarm_amount) . "）";
            $this->trigger(AdminNoticeEvent::PLATFORM_AMOUNT_BELOW, new AdminNoticeEvent(['roles' => ['财务管理', '超级管理员']]));
        }
    }
}
