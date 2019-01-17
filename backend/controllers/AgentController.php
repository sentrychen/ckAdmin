<?php
/**
 * Author: lf
 * Blog: https://blog.feehi.com
 * Email: job@feehi.com
 * Created at: 2016-04-02 10:02
 */

namespace backend\controllers;

use backend\actions\CreateAction;
use backend\actions\IndexAction;
use backend\actions\SortAction;
use backend\actions\UpdateAction;
use backend\actions\ViewAction;
use backend\models\Agent;
use backend\models\AgentAccountRecord;
use backend\models\Message;
use backend\models\search\AgentSearch;
use common\libs\Constants;
use yii;

class AgentController extends Controller
{

    public function actions()
    {
        return [
            'index' => [
                'class' => IndexAction::class,
                /*
                'data' => function () {
                    $searchModel = new AgentSearch();
                    $dataProvider = $searchModel->search(yii::$app->getRequest()->getQueryParams());
                    return [
                        'dataProvider' => $dataProvider,
                        'searchModel' => $searchModel,
                    ];
                }
                */
                'data' => $this->_getGridViewData(AgentSearch::class, [
                    'account.available_amount', 'account.total_amount', 'account.bet_amount'
                ]),
            ],

            'view' => [
                'class' => ViewAction::class,
                'modelClass' => Agent::class,
            ],
            'create' => [
                'class' => CreateAction::class,
                'modelClass' => Agent::class,
                'scenario' => 'create',
            ],
            'update' => [
                'class' => UpdateAction::class,
                'modelClass' => Agent::class,
                'scenario' => 'update',
            ],

            'sort' => [
                'class' => SortAction::class,
                'modelClass' => Agent::class,
            ],
        ];
    }

    public function actionMessage($ids)
    {
        $model = new Message(['ids' => $ids, 'user_type' => Message::OBJ_AGENT, 'notify_obj' => Message::SEND_MULTI]);

        //$model->scenario = 'create';
        if (yii::$app->getRequest()->getIsPost()) {

            $model->sender_id = yii::$app->getUser()->getId();
            $model->sender_name = yii::$app->getUser()->getIdentity()->username;
            if ($model->load(yii::$app->getRequest()->post()) && $model->save()) {
                yii::$app->getSession()->setFlash('success', yii::t('app', 'Success'));
                // return ['status'=>'succ'];
                return $this->render('message-ok', [
                    'model' => $model
                ]);
            } else {
                $errors = $model->getErrors();
                $err = '';
                foreach ($errors as $v) {
                    $err .= $v[0] . '<br>';
                }
                //throw new UnprocessableEntityHttpException($err);
                //return ['status'=>'fail'];
            }
        } else {
            $model->level = Message::LEVEL_LOW;
        }
        $model->loadDefaultValues();
        return $this->render('message', [
            'model' => $model
        ]);
    }


    public function actionChangeAmount($agent_id)
    {
        if (Yii::$app->option->agent_change_amount != Constants::YesNo_Yes)
            throw new yii\base\InvalidConfigException('系统禁止给代理上下分');
        $model = new AgentAccountRecord();
        $model->agent_id = $agent_id;
        if (yii::$app->getRequest()->getIsPost()) {
            if ($model->load(yii::$app->getRequest()->post()) && $model->validate()) {
                //$model->trade_no = Yii::$app->getUser()->getId();
                $account = $model->agent->account;
                if ($model->switch == AgentAccountRecord::SWITCH_IN) {
                    $model->trade_type_id = AgentAccountRecord::TRADE_TYPE_ADMINADD;
                    $model->name = '管理员上分';
                    $account->available_amount += (float)$model->amount;
                } else {
                    $model->name = '管理员下分';
                    $model->trade_type_id = AgentAccountRecord::TRADE_TYPE_ADMINREDUCE;
                    if ($account->available_amount >= $model->amount)
                        $account->available_amount -= (float)$model->amount;
                    else
                        $model->addError('amount', '下分额度不能超出代理现有可用额度');
                }
                $model->after_amount = $account->available_amount;

                if (!$model->hasErrors() && $model->save(false) && $account->save(false)) {
                    yii::$app->getSession()->setFlash('success', yii::t('app', 'Success'));
                    return $this->redirect(['index']);
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