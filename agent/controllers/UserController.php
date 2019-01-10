<?php
/**
 * Author: lf
 * Blog: https://blog.feehi.com
 * Email: job@feehi.com
 * Created at: 2016-04-02 10:02
 */

namespace agent\controllers;

use agent\actions\ViewAction;
use agent\models\search\BetListSearch;
use agent\models\search\LoginLogSearch;
use agent\models\search\UserAccountRecordSearch;
use agent\models\UserAccountRecord;
use yii;
use agent\models\User;
use agent\models\search\UserSearch;
use agent\actions\CreateAction;
use agent\actions\UpdateAction;
use agent\actions\IndexAction;
use backend\actions\DeleteAction;
use agent\actions\SortAction;

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
}