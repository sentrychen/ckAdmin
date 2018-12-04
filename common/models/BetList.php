<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%bet_list}}".
 *
 * @property string $id 投注流水ID
 * @property string $record_id 投注单号
 * @property string $user_id 用户ID
 * @property string $username 用户名
 * @property string $platform_username 平台用户名
 * @property int $platform_id 游戏平台ID
 * @property string $game_type 游戏类型
 * @property string $table_no 桌号
 * @property int $period_boot 靴次
 * @property int $period_round 局次
 * @property int $bet_amount 投注金额
 * @property string $game_result 开奖结果
 * @property string $bet_record 投注点
 * @property int $profit 赢输
 * @property int $amount_before 投注前余额
 * @property int $amount_after 投注后余额
 * @property string $xima 洗码值
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

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['record_id', 'user_id', 'platform_id', 'bet_amount', 'profit', 'amount_before', 'amount_after', 'state', 'bet_at', 'draw_at', 'created_at'], 'integer'],
            [['user_id', 'platform_id'], 'required'],
            [['xima'], 'number'],
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
        return [
            'id' => '投注流水ID',
            'record_id' => '投注单号',
            'user_id' => '用户ID',
            'username' => '用户名',
            'platform_username' => '平台用户名',
            'platform_id' => '游戏平台ID',
            'game_type' => '游戏类型',
            'table_no' => '桌号',
            'period_boot' => '靴次',
            'period_round' => '局次',
            'bet_amount' => '投注金额',
            'game_result' => '开奖结果',
            'bet_record' => '投注点',
            'profit' => '赢输',
            'amount_before' => '投注前余额',
            'amount_after' => '投注后余额',
            'xima' => '洗码值',
            'state' => '游戏状态',
            'banker_cards' => '庄家牌面',
            'player_cards' => '闲家牌面',
            'bet_at' => '投注时间',
            'draw_at' => '开奖时间',
            'created_at' => '创建时间',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPlatform()
    {
        return $this->hasOne(Platform::class, ['id' => 'platform_id']);
    }
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGameType()
    {
        return $this->hasOne(GameType::class, ['name_en' => 'game_type']);
    }

    public function afterSave($insert, $changedAttributes)
    {
        parent::afterSave($insert, $changedAttributes);
        $user = User::findOne(['id' => $this->user_id]);
        if($user){
            $start_time = strtotime(date('Y-m-d 00:00:00'));
            $end_time = strtotime(date('Y-m-d 23:59:59'));
            $platform_id = $this->platform_id;
            $agent_id = isset($user->invite_agent_id)?$user->invite_agent_id:0;
            $amount = isset($this->bet_amount)?$this->bet_amount:0;
            $win_profit = 0;
            $lost_profit = 0;
            if(isset($this->profit) && $this->profit>0){
                $win_profit = $this->profit;
            }
            if(isset($this->profit) && $this->profit<0){
                $lost_profit = abs($this->profit);
            }
            /*
            $dis_count = BetList::find()->select('user_id')->where(['between', 'bet_at', $start_time, $end_time])->distinct()->count();
            $all_count = BetList::find()->select('user_id')->where(['between', 'bet_at', $start_time, $end_time])->count();
            $sum_money = BetList::find()->where(['between', 'bet_at', $start_time, $end_time])->sum('bet_amount');
            $win_money = BetList::find()->where(['>', 'profit', 0])->andFilterWhere(['between', 'bet_at', $start_time, $end_time])->sum('profit');
            $lost_money = BetList::find()->where(['<', 'profit', 0])->andFilterWhere(['between', 'bet_at', $start_time, $end_time])->sum('profit');

            $daliy = [
                'dbu' => $dis_count,
                'dbo' => $all_count,
                'dba' => $sum_money,
                'dpa' => $win_money,
                'dla' => abs($lost_money)
            ];
            Daily::updateCounter($daliy);

            $data = [];
            $plat = BetList::find()->select(['platform_id','id'=>'count(id)','bet_amount'=>'sum(bet_amount)'])
                    ->where(['between', 'bet_at', $start_time, $end_time])->groupBy('platform_id')->all();
            foreach ($plat as $key =>$val){
                $data[$val->platform_id]['platform_id'] = $val->platform_id;
                $data[$val->platform_id]['dbo'] = $val->id;
                $data[$val->platform_id]['dba'] = $val->bet_amount;
            }
            $dis_num = BetList::find()->select(['platform_id','user_id'=>'count(distinct(user_id))'])
                       ->where(['between', 'bet_at', $start_time, $end_time])->groupBy('platform_id')->all();
            foreach ($dis_num as $key => $val){
                $data[$val->platform_id]['dbu'] = $val->user_id;
            }
            $win_amount = BetList::find()->select(['platform_id','profit'=>'sum(profit)'])->where(['>', 'profit', 0])
                          ->andFilterWhere(['between', 'bet_at', $start_time, $end_time])->groupBy('platform_id')->all();
            foreach ($win_amount as $key => $val){
                $data[$val->platform_id]['dpa'] =  $val->profit;
            }
            $lost_amount = BetList::find()->select(['platform_id','profit'=>'sum(profit)'])->where(['<', 'profit', 0])
                           ->andFilterWhere(['between', 'bet_at', $start_time, $end_time])->groupBy('platform_id')->all();
            foreach ($lost_amount as $key =>  $val){
                $data[$val->platform_id]['dla'] = abs($val->profit);
            }
            foreach($data as $arr){
                PlatformDaily::updateCounter($arr);
            }
            */

            $count = BetList::find()->select(['platform_id',])->where(['user_id'=>$user->id])
                ->andFilterWhere(['between', 'bet_at', $start_time, $end_time])->count();

            $com_data = [
                'dba'      => $amount,     //日投注额度
                'dpa'      => $win_profit, //日赢额度
                'dla'      => $lost_profit //日输额度
            ];
            if($count==1){
                $com_data['dbu'] = 1; //日投注用户数
                $com_data['dbo'] = 1; //日投注单数
                $agent_data['agent_id'] = $agent_id; //代理id
                $platform_data['platform_id'] = $platform_id; //平台id
                Daily::addCounter($com_data);
                PlatformDaily::addCounter(array_merge($com_data,$platform_data));
                AgentDaily::addCounter(array_merge($com_data,$agent_data));
            }else{
                $com_data['dbo'] = 1;
                $agent_data['agent_id'] = $agent_id;
                $platform_data['platform_id'] = $platform_id;
                Daily::addCounter($com_data);
                PlatformDaily::addCounter(array_merge($com_data,$platform_data));
                AgentDaily::addCounter(array_merge($com_data,$agent_data));
            }
        }
    }
}
