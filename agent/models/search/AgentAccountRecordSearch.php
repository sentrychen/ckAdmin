<?php

namespace agent\models\search;

use backend\behaviors\TimeSearchBehavior;
use backend\components\search\SearchEvent;
use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\AgentAccountRecord;

/**
 * AgentAccountRecordSearch represents the model behind the search form about `backend\models\AgentAccountRecord`.
 */
class AgentAccountRecordSearch extends AgentAccountRecord
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['agent_id', 'switch', 'name', 'created_at'], 'safe'],
        ];
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
        $query = AgentAccountRecord::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => [
                'defaultOrder' => [
                    'created_at' => SORT_DESC,
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
            'switch' => $this->switch,

        ]);

        $query->andFilterWhere(['like', 'name', $this->name]);
        $this->trigger(SearchEvent::BEFORE_SEARCH, new SearchEvent(['query' => $query]));
        return $dataProvider;
    }
}
