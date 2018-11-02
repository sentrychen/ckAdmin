<?php

namespace backend\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Message;

/**
 * MessageSearch represents the model behind the search form about `backend\models\Message`.
 */
class MessageSearch extends Message
{

    public $status;
    public $username;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'is_canceled', 'canceled_at', 'is_deleted', 'deleted_at', 'level', 'user_type', 'notify_obj', 'user_group', 'sender_id', 'updated_at', 'created_at'], 'integer'],
            [['title', 'content', 'sender_name'], 'safe'],
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
        $query = Message::find()->where(['!=', 'sender_id', 0]);

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
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
            'is_canceled' => $this->is_canceled,
            'canceled_at' => $this->canceled_at,
            'is_deleted' => $this->is_deleted,
            'deleted_at' => $this->deleted_at,
            'level' => $this->level,
            'user_type' => $this->user_type,
            'notify_obj' => $this->notify_obj,
            'user_group' => $this->user_group,
            'sender_id' => $this->sender_id,
            'updated_at' => $this->updated_at,
            'created_at' => $this->created_at,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'content', $this->content])
            ->andFilterWhere(['like', 'sender_name', $this->sender_name]);

        return $dataProvider;
    }
}
