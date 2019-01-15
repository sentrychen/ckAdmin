<?php
/**
 * Author: lf
 * Blog: https://blog.feehi.com
 * Email: job@feehi.com
 * Created at: 2016-04-02 10:02
 */

namespace backend\controllers;

use backend\models\Message;
use backend\actions\ViewAction;
use yii;
use backend\models\Agent;
use backend\models\search\AgentSearch;
use backend\actions\CreateAction;
use backend\actions\UpdateAction;
use backend\actions\IndexAction;
use backend\actions\SortAction;

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
                'data' =>$this->_getGridViewData(AgentSearch::class,[
                    'account.available_amount', 'account.total_amount', 'account.bet_amount'
                ]) ,
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
}