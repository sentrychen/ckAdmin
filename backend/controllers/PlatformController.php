<?php

namespace backend\controllers;

use backend\models\PlatformAccountRecord;
use Yii;
use backend\models\search\PlatformSearch;
use backend\models\Platform;
use backend\actions\CreateAction;
use backend\actions\UpdateAction;
use backend\actions\IndexAction;
use backend\actions\DeleteAction;
use backend\actions\SortAction;
/**
 * PlatformController implements the CRUD actions for Platform model.
 */
class PlatformController extends Controller
{
    public function actions()
    {
        return [
            'index' => [
                'class' => IndexAction::className(),
                /*
                'data' => function(){
                    $searchModel = new PlatformSearch();
                    $dataProvider = $searchModel->search(yii::$app->getRequest()->getQueryParams());
                    return [
                        'dataProvider' => $dataProvider,
                        'searchModel' => $searchModel,
                    ];
                }
                */
                'data' => $this->_getGridViewData(PlatformSearch::class,['account.available_amount','account.frozen_amount'])
            ],
            'create' => [
                'class' => CreateAction::className(),
                'modelClass' => Platform::className(),
            ],
            'update' => [
                'class' => UpdateAction::className(),
                'modelClass' => Platform::className(),
            ],
            'delete' => [
                'class' => DeleteAction::className(),
                'modelClass' => Platform::className(),
            ],
            'sort' => [
                'class' => SortAction::className(),
                'modelClass' => Platform::className(),
            ],
        ];
    }

    public function actionAmount()
    {
        return $this->render('amount',$this->_getGridViewData(PlatformSearch::class,
            ['account.available_amount', 'account.frozen_amount', 'account.alarm_amount']));

    }

    public function actionChangeAmount($platform_id)
    {
        $model = new PlatformAccountRecord();
        $model->platform_id = $platform_id;
        $model->scenario = 'create';
        if (yii::$app->getRequest()->getIsPost()) {
            if ($model->load(yii::$app->getRequest()->post()) && $model->validate()) {
                $model->name = "手工调整额度";
                $model->remark .= " [处理人员：" . yii::$app->getUser()->getIdentity()->username . ']';
                if ($model->save(false)) {
                    yii::$app->getSession()->setFlash('success', yii::t('app', 'Success'));
                    return $this->redirect(['amount']);
                }

            }
            $errors = $model->getErrors();
            $err = '';
            foreach ($errors as $v) {
                $err .= $v[0] . '<br>';
            }
            yii::$app->getSession()->setFlash('error', $err);

        }
        $platformModel = Platform::findOne(['id' => $platform_id]);
        $model->loadDefaultValues();
        return $this->render('change-amount', [
            'model' => $model, 'platformModel' => $platformModel
        ]);
    }
}
