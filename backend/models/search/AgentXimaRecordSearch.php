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
use backend\models\AgentXimaRecord;
use yii\base\Model;
use yii\data\ActiveDataProvider;

class AgentXimaRecordSearch extends AgentXimaRecord
{

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
            [['user_id', 'agent_id', 'record_id', 'platform_id', 'game_type', 'username', 'created_at'], 'safe'],
        ];
    }

    public function scenarios()
    {
        return Model::scenarios();
    }

    /**
     * @param $params
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = self::find()->joinWith('user');
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
        $query->andFilterWhere(['user_id' => $this->user_id])
            ->andFilterWhere(['agent_id' => $this->agent_id])
            ->andFilterWhere(['like', 'record_id', $this->record_id])
            ->andFilterWhere(['like', 'username', $this->username])
            ->andFilterWhere(['game_type' => $this->game_type])
            ->andFilterWhere(['platform_id' => $this->platform_id]);

        $this->trigger(SearchEvent::BEFORE_SEARCH, new SearchEvent(['query' => $query]));
        return $dataProvider;
    }

}