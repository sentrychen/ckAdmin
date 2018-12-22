<?php

namespace backend\models\search;

use backend\behaviors\TimeSearchBehavior;
use backend\components\search\SearchEvent;
use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\UserWithdraw;

/**
 * UserWithdrawSearch represents the model behind the search form about `backend\models\UserWithdraw`.
 */
class UserWithdrawSearch extends UserWithdraw
{

    public $apply_amount_min;

    public $apply_amount_max;
    public $username;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'user_id', 'status', 'created_at', 'username', 'audit_by_username', 'apply_amount_min', 'apply_amount_max'], 'safe'],
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
     * @param null $userid
     * @return ActiveDataProvider
     */
    public function search($params,$userid=null)
    {
        $query = UserWithdraw::find()->joinWith('user')->joinWith('userAccount');

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
        if ($userid)
            $this->user_id = $userid;
        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            UserWithdraw::tableName() . '.user_id' => $this->user_id,
            UserWithdraw::tableName() . '.status' => $this->status,
        ]);

        $query->andFilterWhere(['like', 'audit_by_username', $this->audit_by_username])
            ->andFilterWhere(['like', 'username', $this->username])
            ->andFilterWhere(['between', 'apply_amount', $this->apply_amount_min, $this->apply_amount_max]);
        $this->trigger(SearchEvent::BEFORE_SEARCH, new SearchEvent(['query' => $query]));
        return $dataProvider;
    }
}
