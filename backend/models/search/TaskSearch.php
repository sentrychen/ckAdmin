<?php

namespace backend\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Task;

/**
 * TaskSearch represents the model behind the search form about `backend\models\Task`.
 */
class TaskSearch extends Task
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'switch', 'status', 'run_times', 'error_times', 'last_run_at', 'next_run_at', 'exec_mem', 'exec_time'], 'integer'],
            [['name', 'route', 'crontab_str'], 'safe'],
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
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Task::find();

        // add conditions that should always apply here

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
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'switch' => $this->switch,
            'status' => $this->status,
            'run_times' => $this->run_times,
            'error_times' => $this->error_times,
            'last_run_at' => $this->last_run_at,
            'next_run_at' => $this->next_run_at,
            'exec_mem' => $this->exec_mem,
            'exec_time' => $this->exec_time,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'route', $this->route])
            ->andFilterWhere(['like', 'crontab_str', $this->crontab_str]);

        return $dataProvider;
    }
}
