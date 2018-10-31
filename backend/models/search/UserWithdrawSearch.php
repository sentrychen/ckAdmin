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
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'user_id', 'status', 'audit_by_id', 'audit_at', 'user_bank_id', 'updated_at', 'created_at'], 'safe'],
            [[ 'audit_by_username', 'audit_remark', 'bank_name', 'bank_account', 'apply_ip'], 'safe'],
            [['apply_amount', 'transfer_amount'], 'safe'],
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
        $query = UserWithdraw::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

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
            'id' => $this->id,
            'user_id' => $this->user_id,
            'apply_amount' => $this->apply_amount,
            'status' => $this->status,
            'transfer_amount' => $this->transfer_amount,
            'audit_by_id' => $this->audit_by_id,
            'audit_at' => $this->audit_at,
            'user_bank_id' => $this->user_bank_id,
        ]);

        $query->andFilterWhere(['like', 'audit_by_username', $this->audit_by_username])
            ->andFilterWhere(['like', 'audit_remark', $this->audit_remark])
            ->andFilterWhere(['like', 'bank_name', $this->bank_name])
            ->andFilterWhere(['like', 'bank_account', $this->bank_account])
            ->andFilterWhere(['like', 'apply_ip', $this->apply_ip]);
        $this->trigger(SearchEvent::BEFORE_SEARCH, new SearchEvent(['query' => $query]));
        return $dataProvider;
    }
}
