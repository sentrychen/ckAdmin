<?php

namespace agent\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use agent\models\AgentBank;

/**
 * CompanyBankSearch represents the model behind the search form about `backend\models\CompanyBank`.
 */
class AgentBankSearch extends AgentBank
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'card_type', 'status', 'created_by_id', 'created_at', 'updated_at'], 'safe'],
            [['bank_username', 'bank_account', 'bank_name', 'province', 'city', 'branch_name', 'created_by_ip'], 'safe'],
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
        $query = AgentBank::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => ['defaultOrder' => ['id' => SORT_DESC]],
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'card_type' => $this->card_type,
            'status' => $this->status,
        ]);

        $query->andFilterWhere(['like', 'bank_username', $this->bank_username])
            ->andFilterWhere(['like', 'bank_account', $this->bank_account])
            ->andFilterWhere(['like', 'bank_name', $this->bank_name]);


        return $dataProvider;
    }
}
