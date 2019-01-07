<?php

namespace common\models;

use common\libs\Constants;
use Exception;
use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\Exception as dbException;

/**
 * This is the model class for table "{{%bet_list}}".
 *
 * @property string $id 投注流水ID
 * @property string $record_id 投注单号
 * @property string $user_id 用户ID
 * @property string $username 用户名
 * @property string $platform_username 平台用户名
 * @property int $platform_id 游戏平台ID
 * @property string $game_type_id 游戏类型
 * @property string $game_type 游戏类型
 * @property string $table_no 桌号
 * @property int $period_boot 靴次
 * @property int $period_round 局次
 * @property int $bet_amount 投注金额
 * @property int $bingo_amount 押中金额
 * @property string $game_result 开奖结果
 * @property string $bet_record 投注点
 * @property int $profit 赢输
 * @property int $amount_before 投注前余额
 * @property int $amount_after 投注后余额
 * @property int $xima_status 洗码状态
 * @property int $xima_type 洗码类型
 * @property string $xima_rate 洗码率
 * @property string $xima 洗码值
 * @property string $xima_limit 洗码上限
 * @property string $xima_plan_id 洗码方案
 * @property int $state 游戏状态
 * @property int $bet_at 投注时间
 * @property string $player_cards 闲家牌面
 * @property string $banker_cards 庄家牌面
 * @property int $draw_at 开奖时间
 * @property int $created_at 创建时间
 */
class BetList extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%bet_list}}';
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
            [['record_id', 'user_id', 'platform_id', 'game_type_id', 'xima_plan_id', 'xima_limit', 'bet_amount', 'bingo_amount', 'profit', 'amount_before', 'amount_after', 'state', 'bet_at', 'draw_at', 'created_at'], 'integer'],
            [['user_id', 'platform_id'], 'required'],
            [['xima', 'xima_status', 'xima_type', 'xima_rate'], 'number'],
            [['username', 'platform_username', 'game_type'], 'string', 'max' => 64],
            [['table_no', 'period_boot', 'period_round'], 'string', 'max' => 32],
            [['game_result,player_cards,banker_cards'], 'string', 'max' => 128],
            [['bet_record'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        $chart = Yii::$app->params['moneyChart'] ?? '¥';
        return [
            'id' => '投注流水ID',
            'record_id' => '投注单号',
            'user_id' => '用户ID',
            'username' => '用户名',
            'platform_username' => '平台用户名',
            'platform_id' => '游戏平台ID',
            'game_type_id' => '游戏类型ID',
            'game_type' => '游戏类型',
            'table_no' => '桌号',
            'period_boot' => '靴次',
            'period_round' => '局次',
            'bet_amount' => '投注金额(' . $chart . ')',
            'bingo_amount' => '押中(' . $chart . ')',
            'game_result' => '开奖结果',
            'bet_record' => '投注点',
            'profit' => '赢输(' . $chart . ')',
            'amount_before' => '投注前余额(' . $chart . ')',
            'amount_after' => '投注后余额(' . $chart . ')',
            'xima_status' => '洗码状态',
            'xima_type' => '洗码类型',
            'xima_rate' => '洗码率',
            'xima' => '洗码值(' . $chart . ')',
            'xima_limit' => '洗码上限(' . $chart . ')',
            'xima_plan_id' => '洗码方案',
            'state' => '游戏状态',
            'banker_cards' => '庄家牌面',
            'player_cards' => '闲家牌面',
            'bet_at' => '投注时间',
            'draw_at' => '开奖时间',
            'created_at' => '创建时间',
        ];
    }


    public static function recordLabels($record = null)
    {
        $labels = [
            'player' => '<span class="label label-info">闲</span>',
            'palyer' => '<span class="label label-info">闲</span>',
            'banker' => '<span class="label label-danger">庄</span>',
            'tie' => '<span class="label label-success">和</span>',
            'player_pair' => '<span class="label label-primary">闲对</span>',
            'banker_pair' => '<span class="label label-warning">庄对</span>',
            'dragon' => '<span class="label label-danger">龙</span>',
            'tiger' => '<span class="label label-info">虎</span>',
            'dragon_even' => '<span class="label label-warning">龙双</span>',
            'dragon_odd' => '<span class="label label-warning">龙单</span>',
            'tiger_even' => '<span class="label label-primary">虎双</span>',
            'tiger_odd' => '<span class="label label-primary">虎单</span>',
            'small' => '<span class="label label-info">小</span>',
            'big' => '<span class="label label-danger">大</span>',
            'even' => '<span class="label label-info">单</span>',
            'odd' => '<span class="label label-danger">双</span>',
            'spade' => '<span class="label label-inverse">黑桃</span>',
            'heart' => '<span class="label label-danger">红桃</span>',
            'club' => '<span class="label label-default">梅花</span>',
            'diamond' => '<span class="label text-danger bg-default">方块</span>',
            'joker' => '<span class="label label-warning">王</span>',
        ];

        return $record ? ($labels[$record] ?? '<span class="label label-default">' . $record . '</span>') : $labels;
    }

    /**
     * @return User|\yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'user_id']);
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
     *
     * 洗码统计
     * @return bool
     */
    public function ximaStat()
    {

        $members = [];

        //如果投注金额小于等于0 返回
        if ($this->bet_amount <= 0) return false;
        //如果已经洗码，则返回
        if ($this->xima_status !== null) return false;
        //如果系统禁止洗码，则返回
        if (Yii::$app->option->agent_xima_status == Constants::YesNo_No) return false;
        //如果投注记录对应的用户不存在，则返回
        if (!$this->user) return false;
        $user = $this->user;
        $members[] = $user;
        if ($user->inviteAgent) {
            $members[] = $user->inviteAgent;
            while (end($members)->parent) {
                $members[] = end($members)->parent;
            }
        }

        $model = end($members);
        $total_bet_amount = 0;
        if ($model instanceof Agent) {
            if ($model->account) {
                $total_bet_amount = $model->account->bet_amount + (float)$this->bet_amount;;
            }
        } else if ($this->user->userStat) {
            $total_bet_amount = $this->user->userStat->bet_amount;
        }

        //如果顶级对象没有设置洗码方案或者没有符合条件的洗码率则返回
        if (!$model->ximaPlan || !($rateConfig = $this->getXimaRate($model->ximaPlan, $total_bet_amount))) {
            $this->xima_status = Constants::YesNo_No;
            $this->xima = 0;
            $this->save(false);
            return false;
        }

        $this->xima_status = Constants::YesNo_Yes;
        $this->xima_type = $rateConfig['xima_type'];
        $this->xima_rate = $rateConfig['xima_rate'];
        $this->xima_limit = $rateConfig['xima_limit'];
        $this->xima_plan_id = $model->ximaPlan->id;

        //如果是单边洗码,并且单边押中为0
        $amount = $this->bet_amount;
        if ($this->xima_type == Constants::XIMA_ONE_SIDED) {
            if (!$this->bingo_amount) {
                $this->xima = 0;
                $this->save(false);
                return false;
            } else {
                $amount = (float)$this->bingo_amount;
            }
        }
        $this->xima = $this->xima_rate * $amount;
        $this->save(false);

        return $this->createXimaRecord($members, $amount, $rateConfig);
    }

    /**
     * 递归创建代理及用户洗码记录
     * @param array $members
     * @param int $amount
     * @param array $rateConfig
     * @return bool|AgentXimaRecord|UserXimaRecord
     */
    public function createXimaRecord($members, $amount = 0, $rateConfig = [])
    {
        if (empty($members)) return true;

        $member = array_pop($members);
        if ($member instanceof Agent) {
            $ximaRecord = new AgentXimaRecord();
            $ximaRecord->ym = date('Ym');
            if ($member->account) {
                $member->account->bet_amount += (float)$this->bet_amount;
                $member->account->save(false);
            }
        } else {
            $ximaRecord = new UserXimaRecord();
        }

        $ximaData = [
            'user_id' => $this->user_id,
            'bet_id' => $this->id,
            'record_id' => $this->record_id,
            'agent_id' => $member->id,
            'bet_amount' => $this->bet_amount,
            'for_xm_amount' => $amount,
            'platform_id' => $this->platform_id,
            'game_type' => $this->game_type,
            'profit' => $this->profit,
            'xima_type' => $this->xima_type,
            'xima_rate' => $rateConfig['xima_rate'],
            'xima_limit' => $rateConfig['xima_limit'],
            'xima_plan_id' => $rateConfig['xima_plan_id'],
        ];
        $subRateConfig = false;
        if (!empty($members)) {
            $subMemeber = end($members);

            $total_bet_amount = 0;
            if ($subMemeber instanceof Agent) {
                if ($subMemeber->account) {
                    $total_bet_amount = $subMemeber->account->bet_amount + (float)$this->bet_amount;;
                }
            } else if ($this->user->userStat) {
                $total_bet_amount = $this->user->userStat->bet_amount;
            }
            if ($subMemeber->ximaPlan)
                $subRateConfig = $this->getXimaRate($subMemeber->ximaPlan, $total_bet_amount);
        }
        $ximaRecord->setAttributes($ximaData);
        //如果下级不符合洗码条件
        if (!$subRateConfig || ($subRateConfig['xima_type'] == Constants::XIMA_ONE_SIDED && !$this->bingo_amount)) {
            if ($ximaRecord instanceof AgentXimaRecord) {
                $ximaRecord->sub_xima_amount = 0;
                $ximaRecord->sub_xima_rate = 0;
            }
            $ximaRecord->xima_amount = $rateConfig['xima_rate'] * $amount;
            $ximaRecord->real_xima_amount = ($ximaRecord->xima_limit > 0 && $ximaRecord->xima_amount > $ximaRecord->xima_limit) ? $ximaRecord->xima_limit : $ximaRecord->xima_amount;

            return $ximaRecord->save(false);
        }

        if ($subRateConfig['xima_rate'] > $rateConfig['xima_rate']) {
            $subRateConfig['xima_rate'] = $rateConfig['xima_rate'];
        }
        //如果下级是单边洗码
        if ($subRateConfig['xima_type'] == Constants::XIMA_ONE_SIDED) {
            $bingo_amount = (float)$this->bingo_amount;
            $ximaRecord->xima_amount = $rateConfig['xima_rate'] * ($amount - $bingo_amount) + ($rateConfig['xima_rate'] - $subRateConfig['xima_rate']) * $bingo_amount;
            $amount = $bingo_amount;
        } else
            $ximaRecord->xima_amount = ($rateConfig['xima_rate'] - $subRateConfig['xima_rate']) * $amount;

        if ($ximaRecord instanceof AgentXimaRecord) {
            $ximaRecord->sub_xima_amount = $subRateConfig['xima_rate'] * $amount;
            $ximaRecord->sub_xima_rate = $subRateConfig['xima_rate'];
        }
        $ximaRecord->real_xima_amount = ($ximaRecord->xima_limit > 0 && $ximaRecord->xima_amount > $ximaRecord->xima_limit) ? $ximaRecord->xima_limit : $ximaRecord->xima_amount;

        $ximaRecord->save(false);
        return $this->createXimaRecord($members, $amount, $subRateConfig);


    }

    /**
     * 根据投注额计算洗码率
     * @param $plan
     * @param $amount
     * @return boolean|array
     */
    private function getXimaRate($plan, $amount)
    {
        if (!$plan->levels) return false;
        $ximaLevel = false;
        foreach ($plan->levels as $level) {
            if ($level->bet_amount <= $amount)
                $ximaLevel = $level;
        }
        if (!$ximaLevel) return false;
        $rate = $ximaLevel->getRate($this->platform_id);
        if (!$rate->xima_rate) return false;
        return [
            'xima_limit' => $ximaLevel->xima_limit ?? 0,
            'xima_type' => $rate->xima_type,
            'xima_rate' => $rate->xima_rate,
            'xima_plan_id' => $plan->id
        ];
    }


    public function afterSave($insert, $changedAttributes)
    {
        parent::afterSave($insert, $changedAttributes);
        $user = User::findOne(['id' => $this->user_id]);
        if ($insert && $user) {
            $start_time = strtotime(date('Y-m-d 00:00:00'));
            $end_time = strtotime(date('Y-m-d 23:59:59'));
            $platform_id = $this->platform_id;
            $agent_id = isset($user->invite_agent_id) ? $user->invite_agent_id : 0;
            $amount = isset($this->bet_amount) ? $this->bet_amount : 0;
            $win_profit = 0;
            $lost_profit = 0;
            if (isset($this->profit) && $this->profit > 0) {
                $win_profit = $this->profit;
            }
            if (isset($this->profit) && $this->profit < 0) {
                $lost_profit = abs($this->profit);
            }

            //开始事务
            $tr = Yii::$app->db->beginTransaction();
            try {

                $count = BetList::find()->select(['platform_id',])->where(['user_id' => $user->id])
                    ->andFilterWhere(['between', 'bet_at', $start_time, $end_time])->count();

                $com_data = [
                    'dba' => $amount,     //日投注额度
                    'dpa' => $win_profit, //日赢额度
                    'dla' => $lost_profit //日输额度
                ];
                if ($agent_id != 0) {
                    if ($count == 1) {
                        $com_data['dbu'] = 1; //日投注用户数
                        $com_data['dbo'] = 1; //日投注单数
                        $agent_data['agent_id'] = $agent_id; //代理id
                        $platform_data['platform_id'] = $platform_id; //平台id
                        Daily::addCounter($com_data);
                        PlatformDaily::addCounter(array_merge($com_data, $platform_data));
                        AgentDaily::addCounter(array_merge($com_data, $agent_data));
                    } else {
                        $com_data['dbo'] = 1;
                        $agent_data['agent_id'] = $agent_id;
                        $platform_data['platform_id'] = $platform_id;
                        Daily::addCounter($com_data);
                        PlatformDaily::addCounter(array_merge($com_data, $platform_data));
                        AgentDaily::addCounter(array_merge($com_data, $agent_data));
                    }
                }

                $userStat = UserStat::findOne($this->user_id);
                $userStat->bet_number += 1;
                $userStat->bet_amount += $amount;
                if (!$userStat->save(false))
                    throw new dbException('保存会员统计记录失败！');

                $game = PlatformGame::findOne(['platform_id' => $platform_id, 'game_type_id' => $this->game_type_id]);
                if ($game) {
                    $game->bet_num += 1;
                    $game->bet_amount += $amount;
                    $game->profit += $lost_profit - $win_profit;
                    $game->save(false);
                }

                $tr->commit();
            } catch (Exception $e) {
                Yii::error($e->getMessage());
                //回滚
                $tr->rollBack();
                $this->setAttributes($changedAttributes);
                $this->save(false);
            }
        }
    }

}
