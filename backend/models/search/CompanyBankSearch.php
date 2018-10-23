<?php

namespace backend\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\CompanyBank;

/**
 * CompanyBankSearch represents the model behind the search form about `backend\models\CompanyBank`.
 */
class CompanyBankSearch extends CompanyBank
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'card_type', 'status', 'created_by_id', 'created_at', 'updated_at'], 'integer'],
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
        $query = CompanyBank::find();

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
            'card_type' => $this->card_type,
            'status' => $this->status,
            'created_by_id' => $this->created_by_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'bank_username', $this->bank_username])
            ->andFilterWhere(['like', 'bank_account', $this->bank_account])
            ->andFilterWhere(['like', 'bank_name', $this->bank_name])
            ->andFilterWhere(['like', 'province', $this->province])
            ->andFilterWhere(['like', 'city', $this->city])
            ->andFilterWhere(['like', 'branch_name', $this->branch_name])
            ->andFilterWhere(['like', 'created_by_ip', $this->created_by_ip]);

        return $dataProvider;
    }
}
