<?php
/**
 * Author: lf
 * Blog: https://blog.feehi.com
 * Email: job@feehi.com
 * Created at: 2016-04-02 10:07
 */

namespace backend\models\search;

use backend\behaviors\TimeSearchBehavior;
use backend\components\search\SearchEvent;
use backend\models\Trade;
use yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use yii\db\ActiveRecord;
use yii\db\BaseActiveRecord;

class TradeSearch extends Trade
{

    public function init()
    {
        parent::init();
    }

    public function behaviors()
    {
        return [
            TimeSearchBehavior::class
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id','trade_type_id','income_switch','username','created_at'], 'safe'],
        ];
    }

    public function scenarios()
    {
        return Model::scenarios();
    }

    /**
     * @param $params
     * @param $userid
     * @return ActiveDataProvider
     */
    public function search($params,$userid)
    {$query = self::find();
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => [
                'defaultOrder' => [
                    'created_at' => SORT_DESC,
                ],
            ]
        ]);
        $sort = $dataProvider->getSort();


        $this->load($params);
        $this->user_id = $userid;
        if (!$this->validate()) {
            return $dataProvider;
        }
        $query->andFilterWhere(['user_id' => $this->user_id])
            ->andFilterWhere(['like','username', $this->username])
            ->andFilterWhere(['trade_type_id' => $this->trade_type_id])
            ->andFilterWhere(['income_switch' => $this->income_switch]);
        if (!empty($this->winloss))
            $query->andFilterWhere([$this->winloss,'profit', 0]);

        $this->trigger(SearchEvent::BEFORE_SEARCH, new SearchEvent(['query' => $query]));
        return $dataProvider;
    }

}