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
use agent\models\Rebate;
use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;

class RebateSearch extends Rebate
{

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
        return [[['agent_id', 'ym'], 'safe'],
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
        $query = self::find();
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => [
                'defaultOrder' => [
                    'ym' => SORT_DESC
                ]
            ]
        ]);
        $this->load($params);
        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'ym' => $this->ym,
        ]);
        if (empty($this->agent_id)) {
            $agent_ids = yii\helpers\ArrayHelper::getColumn(Agent::getAgentTree(null, yii::$app->getUser()->getId(), null, true), 'id');
            $query->andFilterWhere(['agent_id' => $agent_ids]);
        } else {
            $query->andFilterWhere(['agent_id' => $this->agent_id]);
        }

        return $dataProvider;
    }

}