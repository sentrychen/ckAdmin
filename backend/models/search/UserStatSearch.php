<?php
/**
 * Author: lf
 * Blog: https://blog.feehi.com
 * Email: job@feehi.com
 * Created at: 2016-04-02 10:07
 */

namespace backend\models\search;

use backend\behaviors\TimeSearchBehavior;

use backend\models\User;
use backend\models\UserLoginLog;
use common\models\UserStat;
use yii\base\Model;
use yii\data\ActiveDataProvider;

class UserStatSearch extends UserStat
{
    public $duration;
    public $username;
    public $device_type;
    public $client_type;
    public $invite_agent_id;

    public function init()
    {
        parent::init();
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['duration', 'invite_agent_id', 'username', 'device_type', 'client_type'], 'safe'],
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
    public function search($params)
    {
        $query = self::find()->joinWith('user')->joinWith('log');
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => [
                'defaultOrder' => [
                    'last_login_at' => SORT_DESC,
                ],
            ]
        ]);
        $sort = $dataProvider->getSort();

        $sort->attributes += [
            'user.username' => [
                'asc' => [User::tableName() . '.username' => SORT_ASC],
                'desc' => [User::tableName() . '.username' => SORT_DESC],
            ],
            'user.realname' => [
                'asc' => [User::tableName() . '.realname' => SORT_ASC],
                'desc' => [User::tableName() . '.realname' => SORT_DESC],
            ],
            'user.invite_agent_id' => [
                'asc' => [User::tableName() . '.invite_agent_id' => SORT_ASC],
                'desc' => [User::tableName() . '.invite_agent_id' => SORT_DESC],
            ],
            'duration' => [
                'asc' => [UserStat::tableName() . '.last_login_at' => SORT_DESC],
                'desc' => [UserStat::tableName() . '.last_login_at' => SORT_ASC],
            ],
            'log.client_type' => [
                'asc' => [UserLoginLog::tableName() . '.client_type' => SORT_ASC],
                'desc' => [UserLoginLog::tableName() . '.client_type' => SORT_DESC],
            ],
            'log.device_type' => [
                'asc' => [UserLoginLog::tableName() . '.device_type' => SORT_ASC],
                'desc' => [UserLoginLog::tableName() . '.device_type' => SORT_DESC],
            ],
            'log.client_version' => [
                'asc' => [UserLoginLog::tableName() . '.client_version' => SORT_ASC],
                'desc' => [UserLoginLog::tableName() . '.client_version' => SORT_DESC],
            ],
        ];

        $this->load($params);
        if (!$this->validate()) {
            return $dataProvider;
        }

        $query->andFilterWhere([User::tableName() . '.online_status' => User::STATUS_ONLINE])
            ->andFilterWhere(['like', User::tableName() . '.username', $this->username])
            ->andFilterWhere([User::tableName() . '.invite_agent_id' => $this->invite_agent_id])
            ->andFilterWhere([UserLoginLog::tableName() . '.client_type' => $this->client_type])
            ->andFilterWhere([UserLoginLog::tableName() . '.device_type' => $this->device_type]);

        //$this->trigger(SearchEvent::BEFORE_SEARCH, new SearchEvent(['query' => $query]));
        return $dataProvider;
    }


}