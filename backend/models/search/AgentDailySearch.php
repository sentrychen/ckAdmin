<?php

namespace backend\models\search;

use backend\models\AgentDaily;
use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * RebateSearch represents the model behind the search form about `backend\models\Rebate`.
 */
class AgentDailySearch extends AgentDaily
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ymd', 'agent_id'], 'safe'],
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
        $query = AgentDaily::find();

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
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'agent_id' => $this->agent_id,
        ]);
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
