<?php

namespace backend\models\search;

use backend\behaviors\TimeSearchBehavior;
use backend\components\search\SearchEvent;
use backend\models\UserDeposit;
use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * UserDepositSearch represents the model behind the search form about `backend\models\UserDeposit`.
 */
class UserDepositSearch extends UserDeposit
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
            [['id', 'user_id', 'status', 'created_at', 'username', 'audit_by_username', 'save_bank_id','pay_channel','apply_amount_min', 'apply_amount_max'], 'safe'],
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
     * @param $userid int
     * @return ActiveDataProvider
     */
    public function search($params, $userid = null)
    {
        $query = UserDeposit::find()->joinWith('user')->joinWith('companybank');

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
            'companybank.bank_account' => [
                'asc' => ['bank_account' => SORT_ASC],
                'desc' => ['bank_account' => SORT_DESC],
            ],
        ];

        $this->load($params);
        if ($userid)
            $this->user_id = $userid;
        if (!$this->validate()) {
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'user_id' => $this->user_id,
            'save_bank_id' => $this->save_bank_id,
            'pay_channel' => $this->pay_channel,
            UserDeposit::tableName() . '.status' => $this->status,
        ]);

        $query->andFilterWhere(['like', 'audit_by_username', $this->audit_by_username])
            ->andFilterWhere(['like', 'username', $this->username])
            ->andFilterWhere(['between', 'apply_amount', $this->apply_amount_min, $this->apply_amount_max]);
        $query->orderBy(UserDeposit::tableName() .'.created_at DESC');
        $this->trigger(SearchEvent::BEFORE_SEARCH, new SearchEvent(['query' => $query]));
        return $dataProvider;
    }
}
