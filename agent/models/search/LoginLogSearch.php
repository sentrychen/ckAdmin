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
use agent\models\Agent;
use agent\models\UserLoginLog;
use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;

class LoginLogSearch extends UserLoginLog
{

    public $agent_id;
    public $username;

    public function init()
    {
        parent::init();
    }

    public function behaviors()
    {
        return [
            TimeSearchBehavior::class,
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'agent_id', 'client_type', 'device_type', 'created_at'], 'safe'],
        ];
    }

    public function scenarios()
    {
        return Model::scenarios();
    }

    /**
     * @param $params
     * @param int $userid
     * @return ActiveDataProvider
     */
    public function search($params, $agent_id = null)
    {
        $query = self::find()->joinWith('user u');
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
            return $dataProvider;
        }
        if (empty($this->agent_id) && !empty($agent_id))
            $this->agent_id = $agent_id;
        $query->andFilterWhere(['user_id' => $this->user_id])
            ->andFilterWhere(['like', 'u.username', $this->username])
            ->andFilterWhere(['client_type' => $this->client_type])
            ->andFilterWhere(['device_type' => $this->device_type]);
        if (empty($this->agent_id)) {
            $agent_ids = yii\helpers\ArrayHelper::getColumn(Agent::getAgentTree(null, yii::$app->getUser()->getId(), null, true), 'id');
            $query->andFilterWhere(['u.invite_agent_id' => $agent_ids]);
        } else {
            $query->andFilterWhere(['u.invite_agent_id' => $this->agent_id]);
        }
        $this->trigger(SearchEvent::BEFORE_SEARCH, new SearchEvent(['query' => $query]));
        return $dataProvider;
    }
}