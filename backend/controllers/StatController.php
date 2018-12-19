<?php

namespace backend\controllers;

use backend\models\search\AgentDailySearch;
use backend\models\search\DailySearch;
use backend\models\search\PlatformDailySearch;
use backend\models\search\UserDepositSearch;
use Yii;

class StatController extends Controller
{
    public function actionAgent()
    {
        return $this->render('agent', $this->_getGridViewData(AgentDailySearch::class,[
            'dnu', 'dau', 'ndu','nda','dbu', 'dbo','dba','ddu','dda','dwu','dwa','dpa','dla','dna'
        ]));

    }

    public function actionPlatform()
    {
        return $this->render('platform',$this->_getGridViewData(PlatformDailySearch::class,[
            'dnu', 'dau','dua','dda','dbu','dbo','dba','dpa','dla'
        ]));
    }

    public function actionDaily()
    {
        return $this->render('daily', $this->_getGridViewData(DailySearch::class,[
            'dnu','dau','ndu','nda','dbu','dba','ddu','dda','dwu','dwa','dpa','dla'
        ]));
    }

}
