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
use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use yii\db\ActiveRecord;
use yii\db\BaseActiveRecord;

class AgentSearch extends Agent
{
    public $create_start_at;
    public $create_end_at;


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
            [['id', 'username', 'parent_id', 'realname', 'promo_code', 'status', 'created_at'], 'safe'],
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
        $query = self::find()->joinWith('account');
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => [
                'defaultOrder' => [
                    'created_at' => SORT_DESC
                ]
            ]
        ]);
        $sort = $dataProvider->getSort();

        $sort->attributes += [
            'account.available_amount' => [
                'asc' => ['available_amount' => SORT_ASC],
                'desc' => ['available_amount' => SORT_DESC],
            ],
            'account.bet_amount' => [
                'asc' => ['bet_amount' => SORT_ASC],
                'desc' => ['bet_amount' => SORT_DESC],
            ],
            'account.total_amount' => [
                'asc' => ['total_amount' => SORT_ASC],
                'desc' => ['total_amount' => SORT_DESC],
            ]
        ];

        $this->load($params);
        if (!$this->validate()) {
            return $dataProvider;
        }


        $query->andFilterWhere(['like', 'realname', $this->realname])
            ->andFilterWhere(['like', 'username', $this->realname])
            ->andFilterWhere(['like', 'promo_code', $this->promo_code]);
        if (empty($this->parent_id)) {
            $agent_ids = yii\helpers\ArrayHelper::getColumn(Agent::getAgentTree(null, yii::$app->getUser()->getId(), null, true), 'id');
            $query->andFilterWhere(['parent_id' => $agent_ids]);
        } else {
            $query->andFilterWhere(['parent_id' => $this->parent_id]);
        }

        $this->trigger(SearchEvent::BEFORE_SEARCH, new SearchEvent(['query' => $query]));
        return $dataProvider;
    }

}