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
 * @property int $platform_id 平台ID
 * @property string $agent_name 代理账号
 * @property int $agent_level 代理层级
 * @property string $rebate_rate 占成
 * @property string $rebate_limit 返佣上限
 * @property string $rebate_plan_id 返佣方案ID
 * @property string $self_bet_amount 自身有效投注
 * @property string $self_profit_loss 自身会员损益
 * @property string $self_bet_user_num 自身有效投注人数
 * @property string $self_rebate_amount 自身返佣
 * @property string $sub_bet_amount 下级有效投注总额
 * @property string $sub_bet_user_num 下级有效投注人数
 * @property string $sub_profit_loss 下级代理会员损益
 * @property string $sub_rebate_amount 下级返佣
 * @property string $total_profit_loss 合计损益
 * @property string $total_bet_amount 合计投注额
 * @property string $total_rebate_amount 合计返佣
 * @property string $total_bet_user_num 合计投注人数
 * @property string $xima_amount 当期洗码值
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
            [['rebate_rate', 'self_bet_amount', 'self_profit_loss', 'sub_bet_amount', 'sub_profit_loss', 'sub_rebate_amount', 'self_rebate_amount', 'total_rebate_amount', 'xima_amount'], 'number'],
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
            'platform_id' => '平台ID',
            'agent_name' => '代理账号',
            'agent_level' => '代理层级',
            'rebate_rate' => '返佣率',
            'rebate_limit' => '返佣上限(' . $chart . ')',
            'rebate_plan_id' => '返佣方案ID',
            'self_bet_amount' => '自身投注额(' . $chart . ')',
            'self_bet_user_num' => '自身投注人数',
            'self_profit_loss' => '自身损益(' . $chart . ')',
            'self_rebate_amount' => '自身返佣(' . $chart . ')',
            'sub_bet_amount' => '下级投注总额(' . $chart . ')',
            'sub_profit_loss' => '下级损益(' . $chart . ')',
            'sub_rebate_amount' => '下级返佣(' . $chart . ')',
            'sub_bet_user_num' => '下级投注人数',
            'total_bet_amount' => '合计投注总额(' . $chart . ')',
            'total_profit_loss' => '合计损益(' . $chart . ')',
            'total_rebate_amount' => '合计返佣(' . $chart . ')',
            'total_bet_user_num' => '合计投注人数',
            'xima_amount' => '当期洗码值(' . $chart . ')',
            'created_at' => '计佣时间',
        ];
    }

    public static function getYms()
    {
        $data = self::find()->select('ym')->distinct(true)->orderBy('ym')->asArray()->all();

        return ArrayHelper::map($data, 'ym', 'ym');
    }

    public static function getLevels()
    {
        $maxLevel = Agent::find()->max('agent_level');
        $levels = [];
        for ($i = 1; $i <= $maxLevel; $i++) {
            $levels[$i] = $i;
        }
        return $levels;
    }

    /**
     * 递归计算益损
     * @param $profit
     * @param $amount
     * @param int $sub_rate
     */
    public function calProfit($profit, $amount, $user_num, &$models, $parent = -1)
    {
        if (!$this->agent) return;

        if ($this->agent->rebatePlan) {
            $this->rebate_plan_id = $this->agent->rebatePlan->id;
        }

        $this->agent_level = $this->agent->agent_level;
        $this->agent_name = $this->agent->username;

        if ($parent == -1) {
            $this->self_profit_loss = $profit;
            $this->self_bet_amount = $amount;
            $this->self_bet_user_num = $user_num;
        } else {
            $this->sub_profit_loss += $profit;
            $this->sub_bet_amount += $amount;
            $this->sub_bet_user_num += $user_num;
        }

        if ($this->agent->parent && $this->agent->parent->id != $this->agent_id) {
            if (!isset($models[$this->platform_id][$this->agent->parent->id]))
                $models[$this->platform_id][$this->agent->parent->id] = new Rebate(['ym' => $this->ym, 'platform_id' => $this->platform_id, 'agent_id' => $this->agent->parent->id]);
            $models[$this->platform_id][$this->agent->parent->id]->calProfit($profit, $amount, $user_num, $models, 1);
        }
    }

    /**
     * 计算返佣率
     */
    public function calRebate(&$models, $profit = 0, $sub_rate = -1)
    {
        if (!$this->agent) return;
        if (!isset($this->rebate_rate)) {
            $this->total_bet_amount = (float)$this->sub_bet_amount + (float)$this->self_bet_amount;
            $this->total_bet_user_num = (int)$this->sub_bet_user_num + (float)$this->self_bet_user_num;
            $this->total_profit_loss = (float)$this->sub_profit_loss + (float)$this->self_profit_loss;
            if (!$this->rebatePlan) $this->rebate_rate = 0;
            else {
                $rebateLevel = false;
                foreach ($this->rebatePlan->levels as $level) {
                    if ($level->profit_amount <= $this->total_profit_loss && $level->bet_user_num <= $this->total_bet_user_num)
                        $rebateLevel = $level;
                }
                if ($rebateLevel) {
                    $rate = $rebateLevel->getRate($this->platform_id);
                    $this->rebate_rate = $rate->rebate_rate ?? 0;
                    $this->rebate_limit = $rebateLevel->rebate_limit;
                } else
                    $this->rebate_rate = 0;
            }
            $this->self_rebate_amount = $this->rebate_rate * $this->self_profit_loss;
        }
        $rebate_rate = $this->rebate_rate;

        if ($sub_rate == -1) {
            $profit = $this->self_profit_loss;
        }else{
            if ($this->rebate_rate > $sub_rate) {
                $this->sub_rebate_amount += ($this->rebate_rate - $sub_rate) * $profit;
            } else {
                $this->sub_rebate_amount += 0;
                $rebate_rate = $sub_rate;
            }
        }

        if ($this->agent->parent && $this->agent->parent->id != $this->agent_id && isset($models[$this->platform_id][$this->agent->parent->id])) {

            $models[$this->platform_id][$this->agent->parent->id]->calRebate($models, $profit,$rebate_rate);
        }


    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRebatePlan()
    {
        return $this->hasOne(RebatePlan::class, ['id' => 'rebate_plan_id']);
    }

    /**
     * @return agent|\yii\db\ActiveQuery
     */
    public function getAgent()
    {
        return $this->hasOne(Agent::class, ['id' => 'agent_id']);
    }

    /**
     * @return Platform|\yii\db\ActiveQuery
     */
    public function getPlatform()
    {
        return $this->hasOne(Platform::class, ['id' => 'platform_id']);
    }
}
