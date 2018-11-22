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
use agent\models\User;
use agent\models\UserAccountRecord;
use yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use yii\db\ActiveRecord;
use yii\db\BaseActiveRecord;

class UserAccountRecordSearch extends UserAccountRecord
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
            TimeSearchBehavior::class
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'agent_id', 'trade_type_id', 'switch', 'username', 'created_at'], 'safe'],
        ];
    }

    public function scenarios()
    {
        return Model::scenarios();
    }

    /**
     * @param $params
     * @param null $agent_id
     * @return ActiveDataProvider
     * @internal param $userid
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
        $sort = $dataProvider->getSort();


        $this->load($params);

        if (!$this->validate()) {
            return $dataProvider;
        }
        if (empty($this->agent_id) && !empty($agent_id))
            $this->agent_id = $agent_id;


        $query->andFilterWhere(['user_id' => $this->user_id])
            ->andFilterWhere(['trade_type_id' => $this->trade_type_id])
            ->andFilterWhere(['like', 'u.username', $this->username])
            ->andFilterWhere(['switch' => $this->switch]);
        if (!empty($this->winloss))
            $query->andFilterWhere([$this->winloss, 'profit', 0]);
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