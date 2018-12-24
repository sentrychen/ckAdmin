<?php

namespace backend\models\search;

use backend\models\XimaPlan;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Rebate;

/**
 * RebateLevelSearch represents the model behind the search form about `backend\models\RebatePlan`.
 */
class XimaPlanSearch extends XimaPlan
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'safe'],
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
     * @param int $type 1 用户 2 代理
     * @return ActiveDataProvider
     */
    public function search($params, $type)
    {
        $query = XimaPlan::find()->where(['type' => $type]);

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
        $query->andFilterWhere(['like', 'name', $this->name]);
        return $dataProvider;
    }
}
