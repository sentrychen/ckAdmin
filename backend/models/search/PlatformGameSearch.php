<?php

namespace backend\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\PlatformGame;

/**
 * PlatformGameSearch represents the model behind the search form about `backend\models\PlatformGame`.
 */
class PlatformGameSearch extends PlatformGame
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'platform_id', 'game_type_id', 'status', 'bet_num', 'bet_user_num', 'created_at', 'updated_at'], 'integer'],
            [['game_name', 'game_name_en', 'game_icon_url'], 'safe'],
            [['bet_amount', 'profit'], 'number'],
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
        $query = PlatformGame::find();

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
            'platform_id' => $this->platform_id,
            'game_type_id' => $this->game_type_id,
            'status' => $this->status,
            'bet_amount' => $this->bet_amount,
            'profit' => $this->profit,
            'bet_num' => $this->bet_num,
            'bet_user_num' => $this->bet_user_num,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'game_name', $this->game_name])
            ->andFilterWhere(['like', 'game_name_en', $this->game_name_en])
            ->andFilterWhere(['like', 'game_icon_url', $this->game_icon_url]);

        return $dataProvider;
    }
}
