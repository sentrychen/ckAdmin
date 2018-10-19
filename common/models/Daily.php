<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%daily}}".
 *
 * @property int $ymd 日期
 * @property int $dnu 日新增用户
 * @property int $dau 日活跃用户
 * @property int $ndu 日首存用户数
 * @property int $nda 日首存额度
 * @property int $dbu 日投注用户数
 * @property int $dba 日投注额度
 * @property int $ddu 日存款用户数
 * @property int $dda 日存款额度
 * @property int $dwu 日取款用户数
 * @property int $dwa 日取款额度
 * @property int $dpa 日赢额度
 * @property int $dla 日输额度
 */
class Daily extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%daily}}';
    }

    public static function getSumData($startDate, $endDate = 'now')
    {
        $startDate = (int)date('Ymd', strtotime($startDate));
        $endDate = (int)date('Ymd', strtotime($endDate));
        $data = static::find()
            ->select('sum(dnu) as dnu, sum(dau) as dau, sum(ndu) as ndu, sum(nda) as nda,sum(dbu) as dbu, 
            sum(dba) as dba, sum(ddu) as ddu, sum(dda) as dda, sum(dwu) as dwu, sum(dwa) as dwa, sum(dpa) as dpa, sum(dla) as dla')
            ->where(['between', 'ymd', $startDate, $endDate])->asArray()->one();
        return $data;
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ymd'], 'required'],
            [['ymd', 'dnu', 'dau', 'ndu', 'nda', 'dbu', 'dba', 'ddu', 'dda', 'dwu', 'dwa', 'dpa', 'dla'], 'integer'],
            [['ymd'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'ymd' => '日期',
            'dnu' => '日新增用户',
            'dau' => '日活跃用户',
            'ndu' => '日首存用户数',
            'nda' => '日首存额度',
            'dbu' => '日投注用户数',
            'dba' => '日投注额度',
            'ddu' => '日存款用户数',
            'dda' => '日存款额度',
            'dwu' => '日取款用户数',
            'dwa' => '日取款额度',
            'dpa' => '日赢额度',
            'dla' => '日输额度',
        ];
    }
}
