<?php

namespace backend\models\search;

use backend\behaviors\TimeSearchBehavior;
use backend\models\UserRelate;
use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * UserRelateSearch represents the model behind the search form about `backend\models\UserRelate`.
 */
class UserRelateSearch extends UserRelate
{

    public $username;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'user_id', 'realate_id', 'username', 'ip', 'deviceid'], 'safe'],
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
     * @param $userid int
     * @return ActiveDataProvider
     */
    public function search($params, $userid)
    {
        $query = UserRelate::find()->joinWith('user u')->joinWith('relateUser r');

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
        $this->user_id = $userid;
        if (!$this->validate()) {
            return $dataProvider;
        }

        $query->andFilterWhere(['or', ['and', ['like', 'u.username', $this->username], ['!=', 'u.id', $userid]], ['and', ['like', 'r.username', $this->username], ['!=', 'r.id', $userid]]])
            ->andFilterWhere([UserRelate::tableName() . '.ip' => $this->ip])
            ->andFilterWhere([UserRelate::tableName() . '.deviceid' => $this->deviceid])
            ->andFilterWhere(['or', ['user_id' => $userid], ['relate_id' => $userid]]);
        return $dataProvider;
    }
}
