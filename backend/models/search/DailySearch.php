<?php

namespace backend\models\search;


use backend\models\Daily;
use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * RebateSearch represents the model behind the search form about `backend\models\Daily`.
 */
class DailySearch extends Daily
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ymd'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Daily::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => [
                'defaultOrder' => [
                    'ymd' => SORT_DESC,
                ],
            ]
        ]);

        $this->load($params);

        if (!$this->validate()) {
            return $dataProvider;
        }
        if (!empty($this->ymd)) {
            $time = explode("~", $this->ymd);
            $query->andFilterWhere([
                'between',
                'ymd',
                date('Ymd', strtotime($time[0])),
                date('Ymd', strtotime($time[1]))
            ]);
        }

        return $dataProvider;
    }
}
