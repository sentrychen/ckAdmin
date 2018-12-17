<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "{{%rebate}}".
 *
 * @property int $id 序号
 * @property string $ym 期数
 * @property int $agent_id 代理ID
 * @property string $agent_name 代理账号
 * @property int $agent_level 代理层级
 * @property string $rebate_rate 占成
 * @property string $self_bet_amount 自身有效投注
 * @property string $self_profit_loss 自身会员损益
 * @property string $sub_bet_amount 下级有效投注总额
 * @property string $sub_profit_loss 下级代理会员损益
 * @property string $sub_rebate_amount 下级返佣
 * @property string $self_rebate_amount 自身返佣
 * @property string $total_rebate_amount 合计返佣
 * @property int $created_at 计佣时间
 */
class Rebate extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%rebate}}';
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
            [['agent_id', 'agent_level', 'created_at'], 'integer'],
            [['rebate_rate', 'self_bet_amount', 'self_profit_loss', 'sub_bet_amount', 'sub_profit_loss', 'sub_rebate_amount', 'self_rebate_amount', 'total_rebate_amount'], 'number'],
            [['ym'], 'string', 'max' => 7],
            [['agent_name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        $chart = Yii::$app->params['moneyChart'] ?? '¥';
        return [
            'id' => '序号',
            'ym' => '期数',
            'agent_id' => '代理ID',
            'agent_name' => '代理账号',
            'agent_level' => '代理层级',
            'rebate_rate' => '返佣率',
            'self_bet_amount' => '自身会员有效投注(' . $chart . ')',
            'self_profit_loss' => '自身会员损益(' . $chart . ')',
            'sub_bet_amount' => '下级有效投注总额(' . $chart . ')',
            'sub_profit_loss' => '下级代理会员损益(' . $chart . ')',
            'sub_rebate_amount' => '下级返佣(' . $chart . ')',
            'self_rebate_amount' => '自身返佣(' . $chart . ')',
            'total_rebate_amount' => '合计返佣(' . $chart . ')',
            'created_at' => '计佣时间',
        ];
    }

    public static function getYms(){
        $data = self::find()->select('ym')->distinct(true)->orderBy('ym')->asArray()->all();

        return ArrayHelper::map($data,'ym','ym');
    }

    public static function getLevels(){
        $maxLevel = Agent::find()->max('agent_level');
        $levels = [];
        for($i =1;$i<= $maxLevel;$i++){
            $levels[$i] = $i;
        }
        return $levels;
    }

    /**
     * 计算返佣值,递归计算上级返佣
     * @param $profit
     * @param $amount
     * @param int $sub_rate
     */
    public function calRebate($profit, $amount, $sub_rate = -1)
    {
        $this->agent_level = $this->agent->agent_level;
        $this->agent_name = $this->agent->username;
        $this->rebate_rate = $this->agent->rebate_rate;

        $rebate_rate = $this->rebate_rate;
        if ($sub_rate == -1) {
            $this->self_profit_loss = $profit;
            $this->self_bet_amount = $amount;
            $this->self_rebate_amount = $this->rebate_rate * $profit;
        } else {
            $this->sub_profit_loss += $profit;
            $this->sub_bet_amount += $amount;
            if ($this->rebate_rate > $sub_rate) {
                $this->sub_rebate_amount += ($this->rebate_rate - $sub_rate) * $profit;
            } else {
                $this->sub_rebate_amount += 0;
                $rebate_rate = $sub_rate;
            }
        }

        $this->total_rebate_amount = $this->self_rebate_amount + $this->sub_rebate_amount;

        if ($this->save(false)) {
            if ($this->agent->parent && $this->agent->parent->id != $this->agent_id) {
                $parent = self::findOne(['ym' => $this->ym, 'agent_id' => $this->agent->parent->id]);
                if (!$parent)
                    $parent = new Rebate(['ym' => $this->ym, 'agent_id' => $this->agent->parent->id]);
                $parent->calRebate($profit, $amount, $rebate_rate);
            }
        }
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAgent()
    {
        return $this->hasOne(Agent::class, ['id' => 'agent_id']);
    }
}
