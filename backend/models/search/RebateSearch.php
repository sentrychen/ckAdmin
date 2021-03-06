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
            [['ym', 'agent_id','agent_level','platform_id'], 'safe'],
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
            'sort' => [
                'defaultOrder' => [
                    'ym' => SORT_DESC,
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
            'ym' => $this->ym,
            'agent_id' => $this->agent_id,
            'platform_id' => $this->platform_id,
        ]);
        return $dataProvider;
    }
}
