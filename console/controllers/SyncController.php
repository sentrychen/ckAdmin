<?php
/**
 * Author: lf
 * Blog: https://blog.feehi.com
 * Email: job@feehi.com
 * Created at: 2017-03-14 21:07
 */

namespace console\controllers;

use common\components\ApiPlatform;
use common\models\GameType;
use common\models\PlatformUser;
use console\models\BetList;
use console\models\Platform;
use Yii;
use yii\console\ExitCode;

set_time_limit(0);

/**
 * File attach management
 */
class SyncController extends \yii\console\Controller
{

    //同步皇家国际投注记录
    public function actionHjBetlist()
    {

        try {
            $platform = Platform::findOne(['code' => 'HJ', 'status' => Platform::STATUS_ENABLED]);

            if (!$platform) return ExitCode::UNAVAILABLE;

            $startTime = BetList::find()->where(['platform_id' => $platform->id])->max('bet_at');

            if (!$startTime) {
                $startTime = strtotime("-1 day");
            }

            $endTime = $now = time();

            $logErr = '[同步皇家国际投注记录](' . date('Y-m-d H:i:s', $startTime) . ' - ' . date('Y-m-d H:i:s', $endTime) . ')]：';

            if (!$platform) {
                yii::error($logErr . '平台参数错误！', 'task');
                return ExitCode::DATAERR;
            }

            $stepTime = 7 * 24 * 3600;


            //$config = yii::$app->params['clients']['HJ'];
            //$client = yii::createObject($config);
            $api = ApiPlatform::getApi('HJ');
            if (!$api || !$api->client) {
                yii::error($logErr . '接口调用失败！原因：皇家国际平台未激活', 'task');
                return ExitCode::UNAVAILABLE;
            }
            $data = [];
            while ($now > $startTime) {
                if ($endTime - $startTime > $stepTime)
                    $endTime = $startTime + $stepTime;
                $res = $api->client->betList(date('Y-m-d H:i:s', $startTime), date('Y-m-d H:i:s', $endTime));

                if ($res['error'] == '') {
                    $data = array_merge($data, $res['data']);
                } else {

                    yii::error($logErr . '接口调用失败！原因：' . $res['error'], 'task');
                    return ExitCode::UNAVAILABLE;
                }
                $startTime = $endTime + 1;
                $endTime = $now;
            }

            $gameTypeIds = array_flip(GameType::getTypeNames());

            if (!empty($data)) {

                foreach ($data as $row) {
                    if ($row['state'] != 1) continue;

                    if (!BetList::findOne(['record_id' => $row['record_id']])) {
                        $model = new BetList();

                        $platformUser = PlatformUser::findOne(['game_account' => $row['username'], 'platform_id' => $platform->id]);
                        if (!$platformUser) continue;
                        $model->record_id = $row['record_id'];
                        $model->user_id = $platformUser->user_id;
                        $model->username = $platformUser->user->username;
                        $model->platform_username = $row['username'];
                        $model->platform_id = $platform->id;
                        $model->game_type_id = $gameTypeIds[$row['game_type']] ?? 0;
                        $model->game_type = $row['game_type'];
                        $model->table_no = $row['table_id'];
                        $periods = explode('/', $row['period_info']);
                        $model->period_boot = $periods[0] ?? 0;
                        $model->period_round = $periods[1] ?? 0;
                        $model->bet_amount = round($row['bet_amount']);
                        $model->game_result = $row['game_result'];
                        $model->bet_record = $row['bet_record'];
                        $model->profit = $row['profit'];
                        $model->amount_before = $row['balance_before'];
                        $model->amount_after = $row['balance_after'];
                        //$model->xima = $row['xima'];
                        $model->state = $row['state'];
                        $model->bet_at = strtotime($row['bet_time']);
                        $model->draw_at = strtotime($row['draw_time']);

                        if (!$model->save(false)) {
                            yii::error($logErr . '数据存储失败！原因：' . implode(',', $model->getErrors()), 'task');
                            return ExitCode::DATAERR;
                        }
                        // $model->calculateXima(); //计算洗码值
                        $model->ximaStat(); //计算洗码值
                    }
                }
            }
            return ExitCode::OK;
        } catch (\Exception $e) {
            yii::error('[同步皇家国际投注记录] 失败！原因：' . $e->getMessage(), 'task');
            return ExitCode::UNSPECIFIED_ERROR;
        }
    }

    //同步机械版投注记录
    public function actionJxbBetlist()
    {

        try {
            $platform = Platform::findOne(['code' => 'JXB', 'status' => Platform::STATUS_ENABLED]);
            if (!$platform) return ExitCode::UNAVAILABLE;

            $startTime = BetList::find()->where(['platform_id' => $platform->id])->max('bet_at');

            if (!$startTime) {

                $startTime = strtotime("-1 day");
            }

            $endTime = $now = time();

            $logErr = '[同步机械版投注记录](' . date('Y-m-d H:i:s', $startTime) . ' - ' . date('Y-m-d H:i:s', $endTime) . ')]：';

            if (!$platform) {
                yii::error($logErr . '平台参数错误！', 'task');
                return ExitCode::DATAERR;
            }

            $stepTime = 7 * 24 * 3600;


            //$config = yii::$app->params['clients']['JXB'];
            //$client = yii::createObject($config);
            $api = ApiPlatform::getApi('JXB');
            if (!$api || !$api->client) {
                yii::error($logErr . '接口调用失败！原因：机械臂平台未激活', 'task');
                return ExitCode::UNAVAILABLE;
            }
            $data = [];
            while ($now > $startTime) {
                if ($endTime - $startTime > $stepTime)
                    $endTime = $startTime + $stepTime;
                $res = $api->client->betList($startTime, $endTime);
                if ($res['error'] == '') {
                    $data = array_merge($data, $res['data']);
                } else {
                    yii::error($logErr . '接口调用失败！原因：' . $res['error'], 'task');
                    return ExitCode::UNAVAILABLE;
                }
                $startTime = $endTime + 1;
                $endTime = $now;
            }

            $resultTypes = [
                'baccarat' => [
                    'banker', 'player', 'tie',
                    'banker,banker_pair', 'banker,player_pair', 'banker,banker_pair,player_pair',
                    'player,banker_pair', 'player,player_pair', 'player,banker_pair,player_pair',
                    'tie,banker_pair', 'tie,player_pair', 'tie,banker_pair,player_pair',
                ],
                'dragonTiger' => ['dragon', 'tiger', 'tie'],
                'duel' => ['spade', 'heart', 'club', 'diamond', 'joker'],
            ];
            $betTypes = [
                'baccarat' => ['player', 'banker', 'tie', 'player_pair', 'banker_pair', 'small', 'big'],
                'dragonTiger' => ['dragon', 'tiger', 'tie'],
                'duel' => ['spade', 'heart', 'club', 'diamond', 'joker'],
            ];
            $gameTypes = ['dragonTiger' => 'dragon_tiger', 'baccarat' => 'baccarat', 'duel' => 'duel'];
            $gameTypeIds = array_flip(GameType::getTypeNames());
            if (!empty($data)) {

                foreach ($data as $row) {
                    //if ($row['state'] != 1) continue;
                    if (!BetList::findOne(['record_id' => $row['id']])) {
                        $model = new BetList();

                        $platformUser = PlatformUser::findOne(['game_account' => $row['username'], 'platform_id' => $platform->id]);
                        if (!$platformUser) continue;
                        $model->record_id = $row['id'];
                        $model->user_id = $platformUser->user_id;
                        $model->username = $platformUser->user->username;
                        $model->platform_username = $row['username'];
                        $model->platform_id = $platform->id;
                        $model->game_type = $gameTypes[$row['gamePlayName']] ?? $row['gamePlayName'];
                        $model->game_type_id = $gameTypeIds[$model->game_type] ?? 0;
                        $model->table_no = $row['roomId'];
                        $model->period_boot = 0;
                        $model->period_round = $row['numberId'];
                        $model->bet_amount = round($row['betCoin']);
                        $model->game_result = $resultTypes[$row['gamePlayName']][$row['win']] ?? $row['win'];
                        $scores = explode(',', $row['score']);
                        $betRecords = [];
                        $model->bingo_amount = 0;
                        foreach ($scores as $id => $score) {
                            if ($score > 0){
                                $bet = $betTypes[$row['gamePlayName']][$id] ?? false;
                                if ($bet){
                                    $betRecords[] = $bet;
                                    if (strpos($model->game_result.',',$bet.',') !==false){
                                        $model->bingo_amount += (int) $score;
                                    }
                                }

                            }

                        }
                        $model->bet_record = implode(',', $betRecords);
                        $model->profit = $row['betResult'];
                        $model->amount_before = $row['beforeAmount'];
                        $model->amount_after = $row['afterAmount'];
                        $model->banker_cards = $row['bankCard'] ?? '';
                        $model->player_cards = $row['playCard'] ?? '';
                        //$model->xima = '';
                        $model->state = 1;
                        $model->bet_at = round($row['gameTime'] / 1000);
                        $model->draw_at = round($row['gameTime'] / 1000);
                        if (!$model->save(false)) {
                            yii::error($logErr . '数据存储失败！原因：' . implode(',', $model->getErrors()), 'task');
                            return ExitCode::DATAERR;
                        }
                        $model->ximaStat(); //计算洗码值
                    }
                }
            }
            return ExitCode::OK;
        } catch (\Exception $e) {
            yii::error('[同步机械臂投注记录] 失败！原因：' . $e->getMessage(), 'task');
            return ExitCode::UNSPECIFIED_ERROR;
        }
    }
}