<?php

namespace backend\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Rebate;

/**
 * RebateSearch represents the model behind the search form about `backend\models\Rebate`.
 */
class RebateSearch extends Rebate
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'agent_id', 'agent_level'], 'integer'],
            [['ym', 'agent_name'], 'safe'],
            [['self_bet_amount', 'sub_bet_amount', 'self_profit_loss', 'sub_profit_loss', 'total_sub_amount', 'cur_sub_amount', 'cur_rebate_amount', 'total_rebate_amount'], 'number'],
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
        $query = Rebate::find();

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
            'agent_level' => $this->agent_level,
            'self_bet_amount' => $this->self_bet_amount,
            'sub_bet_amount' => $this->sub_bet_amount,
            'self_profit_loss' => $this->self_profit_loss,
            'sub_profit_loss' => $this->sub_profit_loss,
            'total_sub_amount' => $this->total_sub_amount,
            'cur_sub_amount' => $this->cur_sub_amount,
            'cur_rebate_amount' => $this->cur_rebate_amount,
            'total_rebate_amount' => $this->total_rebate_amount,
        ]);

        $query->andFilterWhere(['like', 'ym', $this->ym])
            ->andFilterWhere(['like', 'agent_name', $this->agent_name]);

        return $dataProvider;
    }
}
