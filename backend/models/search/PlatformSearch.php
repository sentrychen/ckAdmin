<?php

namespace backend\models\search;

use backend\models\PlatformAccount;
use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Platform;

/**
 * PlatformSearch represents the model behind the search form about `backend\models\Platform`.
 */
class PlatformSearch extends Platform
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'status', 'updated_at', 'created_at'], 'safe'],
            [['name', 'code', 'api_host', 'app_id', 'app_secret', 'login_url'], 'safe'],
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
    public function search($params, $status = null)
    {
        $query = Platform::find()->joinWith('account');

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $sort = $dataProvider->getSort();

        $sort->attributes += [
            'account.available_amount' => [
                'asc' => [PlatformAccount::tableName() . '.available_amount' => SORT_ASC],
                'desc' => [PlatformAccount::tableName() . '.available_amount' => SORT_DESC],
            ],
            'account.frozen_amount' => [
                'asc' => [PlatformAccount::tableName() . '.frozen_amount' => SORT_ASC],
                'desc' => [PlatformAccount::tableName() . '.frozen_amount' => SORT_DESC],
            ],
        ];


        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        if ($status) $this->status = $status;
        // grid filtering conditions
        $query->andFilterWhere([
            'status' => $this->status,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'code', $this->code]);

        return $dataProvider;
    }
}
