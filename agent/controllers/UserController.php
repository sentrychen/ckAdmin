<?php
/**
 * Author: lf
 * Blog: https://blog.feehi.com
 * Email: job@feehi.com
 * Created at: 2016-04-02 10:02
 */

namespace agent\controllers;

use agent\actions\ViewAction;
use agent\models\AgentAccountRecord;
use agent\models\search\BetListSearch;
use agent\models\search\LoginLogSearch;
use agent\models\search\UserAccountRecordSearch;
use agent\models\UserAccountRecord;
use common\libs\Constants;
use yii;
use agent\models\User;
use agent\models\search\UserSearch;
use agent\actions\CreateAction;
use agent\actions\UpdateAction;
use agent\actions\IndexAction;
use backend\actions\DeleteAction;
use agent\actions\SortAction;
use yii\db\Exception;

class UserController extends Controller
{

    public function actions()
    {
        return [
            'index' => [
                'class' => IndexAction::class,
                'data' => $this->_getGridViewData(UserSearch::class, ['account.available_amount', 'userStat.bet_amount', 'userStat.login_number', 'account.xima_amount', 'userStat.profit'])
            ],
            'view-layer' => [
                'class' => ViewAction::class,
                'modelClass' => User::class,
            ],
            'create' => [
                'class' => CreateAction::class,
                'modelClass' => User::class,
                'scenario' => 'create',
            ],
            'update' => [
                'class' => UpdateAction::class,
                'modelClass' => User::class,
                'scenario' => 'update',
            ],

            'sort' => [
                'class' => SortAction::class,
                'modelClass' => User::class,
            ],
        ];
    }



    /**
     * @param $id
     * @return array|string
     */
    public function actionTradeList($id = null)
    {
        /*
        $searchModel = new UserAccountRecordSearch();
        $dataProvider = $searchModel->search(yii::$app->getRequest()->getQueryParams(), $id);

        $query = clone $dataProvider->query;

        $query->select('SUM(case WHEN switch= ' . UserAccountRecord::SWITCH_IN . ' then amount else 0 end ) as inAmount,SUM(case WHEN switch = ' . UserAccountRecord::SWITCH_OUT . ' then amount else 0 end ) as outAmount');

        $total = $query->createCommand()->queryOne();
        */
        return $this->render('tradelist',
            $this->_getGridViewData(UserAccountRecordSearch::class, ['amount', 'after_amount'])
        );
    }

    /**
     * @param $id
     * @return array|string
     */
    public function actionBetList($id = null)
    {
        /*
        $searchModel = new BetListSearch();
        $dataProvider = $searchModel->search(yii::$app->getRequest()->getQueryParams(), $id);
        $query = clone $dataProvider->query;
        $query->select('sum(bet_amount) as betAmount,sum(profit) as profit');
        $total = $query->createCommand()->queryOne();
        */
        return $this->render('betlist',
            $this->_getGridViewData(BetListSearch::class, ['period_boot','bet_amount', 'profit','amount_before','amount_after','xima'])
        );
    }

    /**
     * @param $id
     * @return array|string
     */
    public function actionLogList($id = null)
    {
        $searchModel = new LoginLogSearch();
        $dataProvider = $searchModel->search(yii::$app->getRequest()->getQueryParams(), $id);

        return $this->render('loglist', ['dataProvider' => $dataProvider, 'searchModel' => $searchModel]);
    }


    public function actionChangeAmount($user_id)
    {
        if (Yii::$app->option->agent_change_amount != Constants::YesNo_Yes)
            throw new yii\base\InvalidConfigException('系统禁止给代理上下分');
        /*
         * @var $agent Agent
         */
        $agent = Yii::$app->getUser()->getIdentity();
        $model = new UserAccountRecord();
        $model->user_id = $user_id;
        if (yii::$app->getRequest()->getIsPost()) {
            if ($model->load(yii::$app->getRequest()->post()) && $model->validate()) {
                $account = $model->user->account;
                $agentAccount = $agent->account;
                $agentAccountRecord = new AgentAccountRecord(['agent_id' => $agent->id]);
                $agentAccountRecord->amount = $model->amount;
                if ($model->switch == UserAccountRecord::SWITCH_IN) {
                    if ($agentAccount->available_amount < $model->amount) {
                        $model->addError('amount', '上分额度不能超出代理现有可用额度');
                    } else {
                        $model->trade_type_id = Constants::TRADE_TYPE_AGENTADD;
                        $account->available_amount += (float)$model->amount;
                        $agentAccount->available_amount -= (float)$model->amount;
                        $agentAccountRecord->switch = AgentAccountRecord::SWITCH_OUT;
                        $agentAccountRecord->trade_type_id = AgentAccountRecord::TRADE_TYPE_ADDAMOUNT;
                        $agentAccountRecord->name = "上分给用户";
                        $agentAccountRecord->remark = "上分给用户：" . $model->user->username;
                    }

                } else {
                    if ($account->available_amount < $model->amount) {
                        $model->addError('amount', '下分额度不能超出用户现有可用额度');
                    } else {
                        $model->trade_type_id = Constants::TRADE_TYPE_AGENTREDUCE;
                        $account->available_amount -= (float)$model->amount;
                        $agentAccount->available_amount += (float)$model->amount;
                        $agentAccountRecord->switch = AgentAccountRecord::SWITCH_IN;
                        $agentAccountRecord->trade_type_id = AgentAccountRecord::TRADE_TYPE_REDUCEAMOUNT;
                        $agentAccountRecord->name = "给用户下分";
                        $agentAccountRecord->remark = "给用户：" . $model->user->username . ' 下分';
                    }

                }
                $model->after_amount = $account->available_amount;
                $agentAccountRecord->after_amount = $agentAccount->available_amount;

                if (!$model->hasErrors()) {
                    //开始事务
                    $tr = Yii::$app->db->beginTransaction();
                    try {
                        if (!$account->save(false)) {
                            throw new Exception('会员账户保存失败');
                        }
                        if (!$agentAccount->save(false)) {
                            throw new Exception('代理账户保存失败');
                        }
                        if (!$agentAccountRecord->save(false)) {
                            throw new Exception('代理交易记录保存失败');
                        }
                        $model->trade_no = $agentAccountRecord->id;

                        if (!$model->save(false)) {
                            throw new Exception('会员交易记录保存失败');
                        }
                        $tr->commit();
                        yii::$app->getSession()->setFlash('success', yii::t('app', 'Success'));
                        return $this->redirect(['index']);
                    } catch (Exception $e) {
                        $tr->rollBack();
                        $model->addError('amount', $e->getMessage());
                    }
                }

            }
            $errors = $model->getErrors();
            $err = '';
            foreach ($errors as $v) {
                $err .= $v[0] . '<br>';
            }
            yii::$app->getSession()->setFlash('error', $err);

        }
        $model->loadDefaultValues();
        return $this->render('change-amount', [
            'model' => $model
        ]);
    }
}