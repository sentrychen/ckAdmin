<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/12/7
 * Time: 14:09
 */

namespace agent\models\search;

use agent\models\AgentWithdraw;
use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\behaviors\TimeSearchBehavior;
use backend\components\search\SearchEvent;
use agent\models\AgentBank;

/**
 * AgentWithdraw represents the model behind the search form about `agent\models\AgentWithdraw`.
 */
class AgentWithdrawSearch extends AgentWithdraw
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
            [['id', 'agent_id', 'status', 'created_at', 'username', 'audit_by_username', 'apply_amount_min', 'apply_amount_max'], 'safe'],
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
     * @param null $agent_id
     * @return ActiveDataProvider
     */
    public function search($params,$agent_id=null)
    {
        $query = AgentWithdraw::find()->joinWith('agent');

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $sort = $dataProvider->getSort();

        $sort->attributes += [
            'agent.username' => [
                'asc' => ['username' => SORT_ASC],
                'desc' => ['username' => SORT_DESC],
            ],
        ];

        $this->load($params);
        if ($agent_id)
            $this->agent_id = $agent_id;
        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'agent_id' => $this->agent_id,
            AgentWithdraw::tableName() . '.status' => $this->status,
        ]);

        $query->andFilterWhere(['like', 'audit_by_username', $this->audit_by_username])
            ->andFilterWhere(['like', 'username', $this->username])
            ->andFilterWhere(['between', 'apply_amount', $this->apply_amount_min, $this->apply_amount_max]);
        $this->trigger(SearchEvent::BEFORE_SEARCH, new SearchEvent(['query' => $query]));
        return $dataProvider;
    }
}