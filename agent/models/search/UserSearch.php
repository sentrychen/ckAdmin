<?php
/**
 * Author: lf
 * Blog: https://blog.feehi.com
 * Email: job@feehi.com
 * Created at: 2016-04-02 10:07
 */

namespace agent\models\search;

use agent\behaviors\TimeSearchBehavior;
use agent\components\search\SearchEvent;
use agent\models\User;
use agent\models\Agent;
use common\models\UserAccount;
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
            [['status', 'available_amount_min', 'invite_agent_id', 'available_amount_max', 'invite_agent_id', 'agent_name', 'username', 'created_at'], 'safe'],
        ];
    }

    public function scenarios()
    {
        return Model::scenarios();
    }

    /**
     * @param $params
     * @param null $agent_id
     * @param null $online
     * @return ActiveDataProvider
     */
    public function search($params, $agent_id = null, $online = null)
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

        $sort->attributes += [
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

            'account.xima_amount' => [
                'asc' => [UserAccount::tableName() . '.xima_amount' => SORT_ASC],
                'desc' => [UserAccount::tableName() . '.xima_amount' => SORT_DESC],
            ],
            'userStat.bet_amount' => [
                'asc' => [UserStat::tableName() . '.bet_amount' => SORT_ASC],
                'desc' => [UserStat::tableName() . '.bet_amount' => SORT_DESC],
            ],
            'userStat.profit' => [
                'asc' => [UserStat::tableName() . '.profit' => SORT_ASC],
                'desc' => [UserStat::tableName() . '.profit' => SORT_DESC],
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
        if (empty($this->invite_agent_id) && !empty($agent_id))
            $this->invite_agent_id = $agent_id;


        $query->andFilterWhere(['like', User::tableName() . '.username', $this->username])
            ->andFilterWhere(['between', UserAccount::tableName() . '.available_amount', $this->available_amount_min, $this->available_amount_max])
            ->andFilterWhere([UserStat::tableName() . '.online_status' => $online])
            ->andFilterWhere([User::tableName() . '.status' => $this->status]);
        if (empty($this->invite_agent_id)) {
            $agent_ids = yii\helpers\ArrayHelper::getColumn(Agent::getAgentTree(null, yii::$app->getUser()->getId(), null, true), 'id');
            $query->andFilterWhere([User::tableName() . '.invite_agent_id' => $agent_ids]);
        } else {
            $query->andFilterWhere([User::tableName() . '.invite_agent_id' => $this->invite_agent_id]);
        }
        $this->trigger(SearchEvent::BEFORE_SEARCH, new SearchEvent(['query' => $query]));
        return $dataProvider;
    }

}