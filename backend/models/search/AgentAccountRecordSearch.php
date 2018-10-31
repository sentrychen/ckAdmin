<?php

namespace backend\models\search;

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
            [['id', 'agent_id', 'switch', 'updated_at', 'created_at'], 'integer'],
            [['name', 'remark'], 'safe'],
            [['amount', 'after_amount'], 'number'],
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
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'agent_id' => $this->agent_id,
            'amount' => $this->amount,
            'switch' => $this->switch,
            'after_amount' => $this->after_amount,
            'updated_at' => $this->updated_at,
            'created_at' => $this->created_at,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'remark', $this->remark]);

        return $dataProvider;
    }
}
