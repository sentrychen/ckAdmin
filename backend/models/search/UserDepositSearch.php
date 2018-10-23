<?php

namespace backend\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\UserDeposit;

/**
 * UserDepositSearch represents the model behind the search form about `backend\models\UserDeposit`.
 */
class UserDepositSearch extends UserDeposit
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'user_id', 'status', 'audit_by_id', 'audit_at', 'pay_channel', 'save_bank_id', 'feedback', 'feedback_at', 'updated_at', 'created_at'], 'integer'],
            [['username', 'audit_by_username', 'audit_remark', 'pay_username', 'pay_nickname', 'pay_info', 'feedback_remark'], 'safe'],
            [['apply_amount', 'confirm_amount'], 'number'],
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
        $query = UserDeposit::find();

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
            'user_id' => $this->user_id,
            'apply_amount' => $this->apply_amount,
            'status' => $this->status,
            'confirm_amount' => $this->confirm_amount,
            'audit_by_id' => $this->audit_by_id,
            'audit_at' => $this->audit_at,
            'pay_channel' => $this->pay_channel,
            'save_bank_id' => $this->save_bank_id,
            'feedback' => $this->feedback,
            'feedback_at' => $this->feedback_at,
            'updated_at' => $this->updated_at,
            'created_at' => $this->created_at,
        ]);

        $query->andFilterWhere(['like', 'username', $this->username])
            ->andFilterWhere(['like', 'audit_by_username', $this->audit_by_username])
            ->andFilterWhere(['like', 'audit_remark', $this->audit_remark])
            ->andFilterWhere(['like', 'pay_username', $this->pay_username])
            ->andFilterWhere(['like', 'pay_nickname', $this->pay_nickname])
            ->andFilterWhere(['like', 'pay_info', $this->pay_info])
            ->andFilterWhere(['like', 'feedback_remark', $this->feedback_remark]);

        return $dataProvider;
    }
}
