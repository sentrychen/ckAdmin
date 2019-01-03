<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "{{%agent_xima_record}}".
 *
 * @property string $id 交易ID
 * @property int $agent_id 会员ID
 * @property int $user_id 用户ID
 * @property int $platform_id 平台ID
 * @property string $game_type 游戏类型
 * @property int $record_id 投注单号
 * @property int $bet_id 投注记录ID
 * @property int $bet_amount 投注金额
 * @property int $for_xm_amount 用于洗码额度
 * @property int $profit 赢输
 * @property int $xima_type 洗码类型 1单边 2双边
 * @property string $xima_rate 洗码率
 * @property string $sub_xima_rate 下级洗码率
 * @property string $xima_amount 洗码值
 * @property string $sub_xima_amount 下级洗码值
 * @property string $xima_limit 洗码上限
 * @property string $xima_plan_id 洗码方案
 * @property string $real_xima_amount 实得洗码值
 * @property int $ym 月度
 * @property int $updated_at 更新日期
 * @property int $created_at 创建日期
 */
class AgentXimaRecord extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%agent_xima_record}}';
    }

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
            [['agent_id', 'user_id', 'platform_id', 'game_type', 'bet_id'], 'required'],
            [['agent_id', 'record_id', 'user_id', 'platform_id', 'ym', 'bet_id', 'xima_plan_id', 'profit', 'xima_type', 'updated_at', 'created_at'], 'integer'],
            [['xima_rate', 'sub_xima_rate', 'xima_amount', 'sub_xima_amount', 'bet_amount', 'for_xm_amount', 'xima_limit', 'real_xima_amount'], 'number'],
            [['game_type'], 'string', 'max' => 64],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        $chart = Yii::$app->params['moneyChart'] ?? '¥';
        return [
            'id' => '交易ID',
            'agent_id' => '代理',
            'user_id' => '用户',
            'platform_id' => '平台ID',
            'game_type' => '游戏类型',
            'record_id' => '投注单号',
            'bet_id' => '投注记录',
            'bet_amount' => '投注金额(' . $chart . ')',
            'for_xm_amount' => '用于洗码额度(' . $chart . ')',
            'profit' => '赢输(' . $chart . ')',
            'xima_type' => '洗码类型',
            'xima_rate' => '洗码率',
            'xima_limit' => '洗码上限(' . $chart . ')',
            'xima_plan_id' => '洗码方案',
            'sub_xima_rate' => '下级洗码率',
            'xima_amount' => '洗码值(' . $chart . ')',
            'real_xima_amount' => '实得洗码值(' . $chart . ')',
            'sub_xima_amount' => '下级洗码值(' . $chart . ')',
            'ym' => '月度',
            'updated_at' => '更新日期',
            'created_at' => '创建日期',
        ];
    }

    /**
     * @return User|\yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'user_id']);
    }

    /**
     * @return Agent|\yii\db\ActiveQuery
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

    /**
     * @return GameType|\yii\db\ActiveQuery
     */
    public function getGameType()
    {
        return $this->hasOne(GameType::class, ['name_en' => 'game_type']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getXimaPlan()
    {
        return $this->hasOne(XimaPlan::class, ['id' => 'xima_plan_id']);
    }

    public function afterSave($insert, $changedAttributes)
    {
        parent::afterSave($insert, $changedAttributes);

        if ($insert && $this->real_xima_amount > 0) {
            $ximaAmount = $this->real_xima_amount;
            if ($this->agent->account) {
                $this->agent->account->available_amount += (float)$ximaAmount;
                $this->agent->account->total_xima_amount += (float)$ximaAmount;
                $this->agent->account->total_amount += (float)$ximaAmount;
                if ($this->agent->account->save(false)) {
                    $userRecord = new AgentAccountRecord();
                    $userRecord->agent_id = $this->agent_id;
                    $userRecord->switch = AgentAccountRecord::SWITCH_IN;
                    $userRecord->trade_no = $this->id;
                    $userRecord->trade_type_id = AgentAccountRecord::TRADE_TYPE_XIMA;
                    $userRecord->name = '洗码结算';
                    $userRecord->remark = '洗码收入结算。投注用户:' . $this->user->username . ',游戏平台:' . $this->platform->name;
                    $userRecord->amount = $ximaAmount;
                    $userRecord->after_amount = $this->agent->account->available_amount;
                    $userRecord->save(false);
                }
            }
            Daily::addCounter(['dxm' => $ximaAmount]);
            AgentDaily::addCounter(['dxm' => $ximaAmount, 'agent_id' => $this->agent_id]);
            PlatformDaily::addCounter(['dxm' => $ximaAmount, 'platform_id' => $this->platform_id]);
        }
    }
}
