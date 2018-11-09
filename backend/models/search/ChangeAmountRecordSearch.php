<?php

namespace backend\models\search;

use backend\behaviors\TimeSearchBehavior;
use backend\components\search\SearchEvent;
use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\ChangeAmountRecord;

/**
 * ChangeAmountRecordSearch represents the model behind the search form about `backend\models\ChangeAmountRecord`.
 */
class ChangeAmountRecordSearch extends ChangeAmountRecord
{


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['swtich', 'status', 'created_at', 'username', 'audit_by_name', 'amount_min', 'amount_max'], 'safe'],
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
        $query = ChangeAmountRecord::find()->joinWith('user');

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);


        $sort = $dataProvider->getSort();

        $sort->attributes += [
            'user.username' => [
                'asc' => ['username' => SORT_ASC],
                'desc' => ['username' => SORT_DESC],
            ],
        ];

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'switch' => $this->switch,
            self::tableName() . '.status' => $this->status,

        ]);

        $query->andFilterWhere(['like', 'audit_by_name', $this->audit_by_name])
            ->andFilterWhere(['like', 'username', $this->username])
            ->andFilterWhere(['between', 'amount', $this->amount_min, $this->amount_max]);

        $this->trigger(SearchEvent::BEFORE_SEARCH, new SearchEvent(['query' => $query]));

        return $dataProvider;
    }
}
