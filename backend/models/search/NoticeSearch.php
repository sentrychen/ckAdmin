<?php

namespace backend\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Notice;

/**
 * NoticeSearch represents the model behind the search form about `backend\models\Notice`.
 */
class NoticeSearch extends Notice
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'notice_obj', 'expire_at', 'set_top', 'is_deleted', 'deleted_at', 'is_cancled', 'cancled_at', 'publish_by', 'updated_at', 'created_at'], 'integer'],
            [['content', 'publish_name'], 'safe'],
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
        $query = Notice::find();

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
            'notice_obj' => $this->notice_obj,
            'expire_at' => $this->expire_at,
            'set_top' => $this->set_top,
            'is_deleted' => $this->is_deleted,
            'deleted_at' => $this->deleted_at,
            'is_cancled' => $this->is_cancled,
            'cancled_at' => $this->cancled_at,
            'publish_by' => $this->publish_by,
            'updated_at' => $this->updated_at,
            'created_at' => $this->created_at,
        ]);

        $query->andFilterWhere(['like', 'content', $this->content])
            ->andFilterWhere(['like', 'publish_name', $this->publish_name]);

        return $dataProvider;
    }
}
