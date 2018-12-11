<?php
/**
 * Author: lf
 * Blog: https://blog.feehi.com
 * Email: job@feehi.com
 * Created at: 2016-03-23 12:54
 */

namespace backend\models\form;

use common\models\Options;

class SettingFinanceForm extends Options
{

    public $finance_withdraw_rate;        //用户超限取款扣费率

    public $finance_deposit_max;        //用户存款最大限额

    public $finance_deposit_min;        //用户存款最小限额

    public $finance_withdraw_max;      //用户取款最大限额

    public $finance_withdraw_min;      //用户取款最小限额

    public $finance_add_amount_open_aduit;          //平台上分是否开启审核

    public $finance_reduce_amount_open_aduit;          //平台下分是否开启审核

    public $finance_add_amount_max;       //平台最大上分限额，0表示不限制

    public $finance_reduce_amount_max;    //平台最大下分限额，0表示不限制


    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'finance_withdraw_rate' => '用户超限取款扣费率',
            'finance_deposit_max' => '用户存款最大限额',
            'finance_deposit_min' => '用户存款最小限额',
            'finance_withdraw_max' => '用户取款最大限额',
            'finance_withdraw_min' => '用户取款最小限额',
            'finance_add_amount_open_aduit' => '平台上分是否开启审核',
            'finance_reduce_amount_open_aduit' => '平台下分是否开启审核',
            'finance_add_amount_max' => '平台最大上分限额',
            'finance_reduce_amount_max' => '平台最大下分限额',
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['finance_deposit_max', 'finance_deposit_min', 'finance_withdraw_max', 'finance_withdraw_min', 'finance_add_amount_open_aduit', 'finance_reduce_amount_open_aduit','finance_add_amount_max','finance_reduce_amount_max'], 'integer'],
            ['finance_deposit_max', 'compare', 'compareAttribute' => 'finance_deposit_min', 'operator' => '>='],
            ['finance_withdraw_max', 'compare', 'compareAttribute' => 'finance_withdraw_min', 'operator' => '>='],
            [['finance_withdraw_rate'], 'filter', 'filter' => function ($value) {
                return $value / 100;
            }],
        ];
    }

    /**
     * 填充财务配置
     *
     */
    public function getFinanceSetting()
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
     * 写入财务配置到数据库
     *
     * @return bool
     */
    public function setFinanceConfig()
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