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
use backend\models\search\UserSearch;
use backend\models\User;
use common\models\Agent;
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
                    $dataProvider = $searchModel->search(yii::$app->getRequest()->getQueryParams());
                    return [
                        'dataProvider' => $dataProvider,
                        'searchModel' => $searchModel,
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

    public function actionReport($username = "")
    {
        //$username = yii::$app->getRequest()->get('username','');

        $model = UserSearch::findOne(['username'=>$username]);

        return $this->render('report', ['model' => $model,'username'=>$username]);
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
}