<?php
/**
 * Author: lf
 * Blog: https://blog.feehi.com
 * Email: job@feehi.com
 * Created at: 2016-04-02 10:07
 */

namespace backend\models\search;

use backend\behaviors\TimeSearchBehavior;
use backend\components\search\SearchEvent;
use backend\models\User;
use common\models\Agent;
use backend\models\UserAccount;
use common\models\UserStat;
use yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use yii\db\ActiveRecord;
use yii\db\BaseActiveRecord;

class UserSearch extends User
{
    public $agent_name;
    public $available_amount;
    public $available_amount_min;
    public $available_amount_max;
    public $duration;

    public function init()
    {
        parent::init();
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
    public function rules()
    {
        return [
            [['status', 'duration', 'available_amount_min', 'available_amount_max', 'invite_agent_id', 'username', 'created_at'], 'safe'],
        ];
    }

    public function scenarios()
    {
        return Model::scenarios();
    }

    /**
     * @param $params
     * @return \yii\data\ActiveDataProvider
     */
    public function search($params, $agent_id = null)
    {
        $query = self::find()->joinWith('userStat')->joinWith('inviteAgent')->joinWith('account');
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => [
                'defaultOrder' => [
                    'created_at' => SORT_DESC,
                ],
            ]
        ]);
        $sort = $dataProvider->getSort();

        $sort->attributes +=[
            'agent_name' => [
                    'asc' => [Agent::tableName() . '.username' => SORT_ASC],
                    'desc' => [Agent::tableName() . '.username' => SORT_DESC],
                ],
            'userStat.last_login_at' => [
                'asc' => [UserStat::tableName() . '.last_login_at' => SORT_ASC],
                'desc' => [UserStat::tableName() . '.last_login_at' => SORT_DESC],
            ],
            'userStat.login_number' => [
                'asc' => [UserStat::tableName() . '.login_number' => SORT_ASC],
                'desc' => [UserStat::tableName() . '.login_number' => SORT_DESC],
            ],
            'userStat.relate_number' => [
                'desc' => [UserStat::tableName() . '.relate_number' => SORT_DESC],
                'asc' => [UserStat::tableName() . '.relate_number' => SORT_ASC],
            ],
            'account.frozen_amount' => [
                'asc' => [UserAccount::tableName() . '.frozen_amount' => SORT_ASC],
                'desc' => [UserAccount::tableName() . '.frozen_amount' => SORT_DESC],
            ],
            'account.xima_amount' => [
                'asc' => [UserAccount::tableName() . '.xima_amount' => SORT_ASC],
                'desc' => [UserAccount::tableName() . '.xima_amount' => SORT_DESC],
            ],
            'userStat.deposit_amount' => [
                'asc' => [UserStat::tableName() . '.deposit_amount' => SORT_ASC],
                'desc' => [UserStat::tableName() . '.deposit_amount' => SORT_DESC],
            ],
            'userStat.withdrawal_amount' => [
                'asc' => [UserStat::tableName() . '.withdrawal_amount' => SORT_ASC],
                'desc' => [UserStat::tableName() . '.withdrawal_amount' => SORT_DESC],
            ],
            'userStat.bet_amount' => [
                'asc' => [UserStat::tableName() . '.bet_amount' => SORT_ASC],
                'desc' => [UserStat::tableName() . '.bet_amount' => SORT_DESC],
            ],
            'account.available_amount' => [
                'asc' => [UserAccount::tableName() . '.available_amount' => SORT_ASC],
                'desc' => [UserAccount::tableName() . '.available_amount' => SORT_DESC],
            ],
        ];

        $this->load($params);
        if (!$this->validate()) {
            return $dataProvider;
        }
        $query->andFilterWhere(['like', User::tableName() . '.username', $this->username])
            ->andFilterWhere([User::tableName() . '.invite_agent_id' => $this->invite_agent_id])
            ->andFilterWhere(['between', UserAccount::tableName() .'.available_amount', $this->available_amount_min,$this->available_amount_max])
//            ->andFilterWhere([User::tableName() . '.invite_agent_id' => $agent_id])
            ->andFilterWhere([User::tableName() . '.status' => $this->status]);

        $this->trigger(SearchEvent::BEFORE_SEARCH, new SearchEvent(['query' => $query]));
        return $dataProvider;
    }


}