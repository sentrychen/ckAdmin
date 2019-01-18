<?php

namespace agent\models\search;

use backend\behaviors\TimeSearchBehavior;
use backend\components\search\SearchEvent;
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
    public $keyword;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [

            [['keyword', 'is_read', 'user_type', 'is_deleted', 'created_at'], 'safe'],
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
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Message::find()->where(['!=', 'sender_id', 0]);

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
            'is_deleted' => $this->is_deleted ? 1 : 0,
            'user_type' => $this->user_type,
        ]);

        $query->andFilterWhere(['or', ['like', 'title', $this->keyword], ['like', 'content', $this->keyword]]);
        $this->trigger(SearchEvent::BEFORE_SEARCH, new SearchEvent(['query' => $query]));
        return $dataProvider;
    }

    public function searchByUser($params, $user_id)
    {
        $this->load($params);

        $query = Message::queryUserMessages(self::OBJ_AGENT, $user_id, $this->is_read);

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => [
                'defaultOrder' => [
                    'created_at' => SORT_DESC,
                ],
            ]
        ]);


        $query->andFilterWhere(['or', ['like', 'title', $this->keyword], ['like', 'content', $this->keyword]]);

        return $dataProvider;
    }
}
