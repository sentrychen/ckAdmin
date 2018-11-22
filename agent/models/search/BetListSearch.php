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
use agent\models\BetList;
use agent\models\UserAccountRecord;
use yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use yii\db\ActiveRecord;
use yii\db\BaseActiveRecord;

class BetListSearch extends BetList
{

    public $winloss;
    public $agent_id;

    public static function getWinLossList()
    {
        return [
            '>' => '赢',
            '<' => '输',
        ];
    }

    public function init()
    {
        parent::init();
    }

    public function behaviors()
    {
        return [
            [
                'class' => TimeSearchBehavior::class,
                'timeAttributes' => ['bet_at' => 'bet_at']
            ]
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'agent_id', 'platform_id', 'game_type', 'username', 'winloss', 'bet_at'], 'safe'],
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
     */
    public function search($params, $agent_id = null)
    {
        $query = self::find()->joinWith('user u');
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => [
                'defaultOrder' => [
                    'bet_at' => SORT_DESC,
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
            ->andFilterWhere(['like', 'u.username', $this->username])
            ->andFilterWhere(['game_type' => $this->game_type])
            ->andFilterWhere(['platform_id' => $this->platform_id]);
        if (!empty($this->winloss))
            $query->andFilterWhere([$this->winloss, 'profit', 0]);
        if (empty($this->agent_id)) {
            $agent_ids = yii\helpers\ArrayHelper::getColumn(Agent::getAgentTree(null, yii::$app->getUser()->getId(), null, true), 'id');
            $query->andFilterWhere(['invite_agent_id' => $agent_ids]);
        } else {
            $query->andFilterWhere(['invite_agent_id' => $this->agent_id]);
        }



        $this->trigger(SearchEvent::BEFORE_SEARCH, new SearchEvent(['query' => $query]));
        return $dataProvider;
    }
}