<?php
/**
 * Author: lf
 * Blog: https://blog.feehi.com
 * Email: job@feehi.com
 * Created at: 2016-04-02 10:02
 */

namespace backend\controllers;

use backend\actions\CreateAction;
use backend\actions\DeleteAction;
use backend\actions\IndexAction;
use backend\actions\SortAction;
use backend\actions\UpdateAction;
use backend\actions\ViewAction;
use backend\models\ChangeAmountRecord;
use backend\models\Message;
use backend\models\MessageFlag;
use backend\models\PlatformUser;
use backend\models\search\BetListSearch;
use backend\models\search\LoginLogSearch;
use backend\models\search\UserAccountRecordSearch;
use backend\models\search\UserDepositSearch;
use backend\models\search\UserSearch;
use backend\models\search\UserWithdrawSearch;
use backend\models\UserAccountRecord;
use backend\models\User;
use common\models\Agent;
use common\models\UserAccount;
use yii;
use yii\web\Response;


class UserController extends Controller
{

    public function actions()
    {
        return [
            'index' => [
                'class' => IndexAction::className(),
                'data' => function () {
                    $searchModel = new UserSearch();
                    $model = new Message();
                    $dataProvider = $searchModel->search(yii::$app->getRequest()->getQueryParams());
                    return [
                        'dataProvider' => $dataProvider,
                        'searchModel' => $searchModel,
                        'model'=>$model
                    ];
                }
            ],
            'view-layer' => [
                'class' => ViewAction::className(),
                'modelClass' => User::className(),
            ],
            'create' => [
                'class' => CreateAction::className(),
                'modelClass' => User::className(),
                'scenario' => 'create',
            ],
            'update' => [
                'class' => UpdateAction::className(),
                'modelClass' => User::className(),
                'scenario' => 'update',
            ],
            'delete' => [
                'class' => DeleteAction::className(),
                'modelClass' => User::className(),
            ],
            'sort' => [
                'class' => SortAction::className(),
                'modelClass' => User::className(),
            ],
        ];
    }

    public function actionToday()
    {
        $searchModel = new UserSearch();
        $dataProvider = $searchModel->search(['UserSearch'=>['created_at'=>date('Y-m-d') .' ~ ' . date('Y-m-d')]]);

        return $this->render('today',['dataProvider' => $dataProvider,'searchModel' => $searchModel]);
    }

    public function actionOnline()
    {
        $searchModel = new UserSearch();
        $dataProvider = $searchModel->search([],null,1);

        return $this->render('online',['dataProvider' => $dataProvider,'searchModel' => $searchModel]);
    }

    public function actionReport($username = "")
    {
        //$username = yii::$app->getRequest()->get('username','');

        $model = UserSearch::findOne(['username'=>$username]);

        return $this->render('report', ['model' => $model]);
    }


    /**
     * @param $id
     * @return array|string
     */
    public function actionTradeList($id)
    {
        $searchModel = new UserAccountRecordSearch();
        $dataProvider = $searchModel->search(yii::$app->getRequest()->getQueryParams(),$id);
        $query = clone $dataProvider->query;
        $total = $query->select('SUM(case WHEN switch= '.UserAccountRecord::SWITCH_IN.' then amount else 0 end ) as inAmount,SUM(case WHEN switch = '.UserAccountRecord::SWITCH_OUT.' then amount else 0 end ) as outAmount')->asArray()->one();

        return $this->render('tradelist',['dataProvider' => $dataProvider,'searchModel' => $searchModel,'total'=>$total]);
    }

    /**
     * @param $id
     * @return array|string
     */
    public function actionDepositList($id)
    {
        $searchModel = new UserDepositSearch();
        $dataProvider = $searchModel->search(yii::$app->getRequest()->getQueryParams(),$id);
        $query = clone $dataProvider->query;
        //$total = $query->select('SUM(confirm_amount)')->asArray()->one();
        $total = $query->sum('confirm_amount');
        return $this->render('depositlist',['dataProvider' => $dataProvider,'searchModel' => $searchModel,'total'=>$total]);
    }

    /**
     * @param $id
     * @return array|string
     */
    public function actionWithdrawList($id)
    {
        $searchModel = new UserWithdrawSearch();
        $dataProvider = $searchModel->search(yii::$app->getRequest()->getQueryParams(),$id);
        $query = clone $dataProvider->query;
        $total = $query->sum('transfer_amount');

        return $this->render('withdrawlist',['dataProvider' => $dataProvider,'searchModel' => $searchModel,'total'=>$total]);
    }

    /**
     * @param $id
     * @return array|string
     */
    public function actionBetList($id)
    {
        $searchModel = new BetListSearch();
        $dataProvider = $searchModel->search(yii::$app->getRequest()->getQueryParams(),$id);
        $query = clone $dataProvider->query;
        $total = $query->select('sum(bet_amount) as betAmount,sum(profit) as profit')->asArray()->one();

        return $this->render('betlist',['dataProvider' => $dataProvider,'searchModel' => $searchModel,'total'=>$total]);
    }

    /**
     * @param $id
     * @return array|string
     */
    public function actionLogList($id)
    {
        $searchModel = new LoginLogSearch();
        $dataProvider = $searchModel->search(yii::$app->getRequest()->getQueryParams(),$id);

        return $this->render('loglist',['dataProvider' => $dataProvider,'searchModel' => $searchModel]);
    }

    /**
     * @param $term
     * @return array
     */
    public function actionSearch($term)
    {

        Yii::$app->response->format = Response::FORMAT_JSON;
        return User::find()->select('username as label,username as value')->where(['like', 'username', $term])->asArray()->all();
    }

    public function actionSearchAgent($term)
    {

        Yii::$app->response->format = Response::FORMAT_JSON;
        return Agent::find()->select('username as label,id as value')->where(['like', 'username', $term])->asArray()->all();
    }

    public function actionAmount($id){
        Yii::$app->response->format = Response::FORMAT_RAW;
        $model = PlatformUser::findOne($id);

        return Yii::$app->formatter->asCurrency($model->available_amount);
    }

    public function actionChangeAmount($user_id){
        $model = new ChangeAmountRecord();
        $model->user_id = $user_id;
        $model->scenario = 'create';
        if (yii::$app->getRequest()->getIsPost()) {
            if ($model->load(yii::$app->getRequest()->post()) && $model->save()) {
                yii::$app->getSession()->setFlash('success', yii::t('app', 'Success'));
                return $this->redirect(['index']);
            } else {
                $errors = $model->getErrors();
                $err = '';
                foreach ($errors as $v) {
                    $err .= $v[0] . '<br>';
                }
                yii::$app->getSession()->setFlash('error', $err);
            }
        }
        $userModel = User::findOne(['id'=>$user_id]);
        $model->loadDefaultValues();
        return $this->render('change-amount', [
            'model' => $model,'userModel'=>$userModel
        ]);
    }

    public function actionMessage()
    {
        $model = new Message();
        $model->scenario = 'create';
        if (yii::$app->getRequest()->getIsPost()) {
            if ($model->load(yii::$app->getRequest()->post()) && $model->save()) {
                yii::$app->getSession()->setFlash('success', yii::t('app', 'Success'));
                return $this->redirect(['index']);
            } else {
                $errors = $model->getErrors();
                $err = '';
                foreach ($errors as $v) {
                    $err .= $v[0] . '<br>';
                }
                yii::$app->getSession()->setFlash('error', $err);
            }
        }
        $model->loadDefaultValues();
        return $this->render('message', [
            'model' => $model
        ]);
    }

    public function actionSendMessage()
    {
        $model = new Message();
        $model->loadDefaultValues();
        $request = Yii::$app->request;
        $id_str = $request->get('userIds')?$request->get('userIds'):'';
        return $this->render('send_message', [
            'model' => $model,
            'id_str'=>implode(',',$id_str)
        ]);
    }

    public function actionSaveMessage()
    {
        $message = new Message();
        $message_flag = new MessageFlag();
        if (yii::$app->getRequest()->getIsPost()) {
            $message->notify_obj = Message::SEND_MULTI;
            $message->user_type = Message::OBJ_MEMBER;
            $message->sender_id = yii::$app->getUser()->getId();
            $message->sender_name = yii::$app->getUser()->getIdentity()->username;
            $message->created_at = time();

            if ($message->load(yii::$app->getRequest()->post(), '') && $message->save()) {
                $row = message::find()->where(['is_deleted' => 0, 'user_type' => 1])->orderBy('id DESC')->limit(1)->one();
                $request = Yii::$app->request;
                $ids_str = $request->post('ids_str');
                $user_ids = explode(',', $ids_str);
                foreach ($user_ids as $key => $user_id) {
                    $flag = clone $message_flag;
                    $flag->user_id = $user_id;
                    $flag->user_type = Message::OBJ_MEMBER;
                    $flag->message_id = $row->id;
                    $flag->created_at = time();
                    $flag->save();
                }
                yii::$app->getSession()->setFlash('success', yii::t('app', 'Success'));
                return 'succ';
            } else {
                return 'fail';
            }
        }
    }

}