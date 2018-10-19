<?php
/**
 * Author: lf
 * Blog: https://blog.feehi.com
 * Email: job@feehi.com
 * Created at: 2016-04-02 10:02
 */

namespace backend\controllers;

use backend\actions\ViewAction;
use yii;
use backend\models\Rebate;
use backend\models\search\RebateSearch;
use backend\models\GameRecord;
use backend\models\search\GameRecordSearch;
use backend\actions\IndexAction;

use backend\actions\SortAction;

class ReportController extends Controller
{

    public function actions()
    {
        return [
            'betlist' => [
                'class' => IndexAction::class,
                'data' => function () {
                    $searchModel = new GameRecordSearch();
                    $dataProvider = $searchModel->search(yii::$app->getRequest()->getQueryParams());
                    return [
                        'dataProvider' => $dataProvider,
                        'searchModel' => $searchModel,
                    ];
                }
            ],
            'rebate' => [
                'class' => IndexAction::class,
                'data' => function () {
                    $searchModel = new RebateSearch();
                    $dataProvider = $searchModel->search(yii::$app->getRequest()->getQueryParams());
                    return [
                        'dataProvider' => $dataProvider,
                        'searchModel' => $searchModel,
                    ];
                }
            ],
        ];
    }
}