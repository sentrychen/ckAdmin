<?php
/**
 *
 */

namespace backend\controllers;

use yii;

/**
 * Class Controller
 * @package backend\controllers
 */
class Controller extends \yii\web\Controller
{

    /**
     * @param $searchModelClass
     * @param array $sumColumns
     * @param null $id
     * @return array
     */
    protected function _getGridViewData($searchModelClass, $sumColumns = [], $id = null)
    {
        $searchModel = Yii::createObject($searchModelClass);
        if ($id != null)
            $dataProvider = $searchModel->search(yii::$app->getRequest()->getQueryParams(), $id);
        else
            $dataProvider = $searchModel->search(yii::$app->getRequest()->getQueryParams());
        $totals = [];
        if (!empty($sumColumns)) {
            $query = clone $dataProvider->query;
            $joins = [];
            $select = "";
            foreach ($sumColumns as $col) {
                $as = $col;
                if (strpos($col, '.')) {
                    $cols = explode('.', $col);
                    $as = $cols[0] . '_' . $cols[1];
                    if (!isset($joins[$cols[0]])) {
                        $query->joinWith($cols[0] . ' as ' . $cols[0]);
                        $joins[$cols[0]] = 1;
                    }
                }
                $select .= 'SUM(' . $col . ') as ' . $as . ',';
            }
            $select = substr($select, 0, -1);
            $totals = $query->select($select)->createCommand()->queryOne();

        }
        return [
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel,
            'totals' => $totals,
        ];
    }
}