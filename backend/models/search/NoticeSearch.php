<?php

namespace backend\models\search;

use backend\behaviors\TimeSearchBehavior;
use backend\components\search\SearchEvent;
use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Notice;

/**
 * NoticeSearch represents the model behind the search form about `backend\models\Notice`.
 */
class NoticeSearch extends Notice
{

    public $keyword;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'user_type', 'expire_at', 'set_top', 'is_deleted', 'deleted_at',  'publish_by', 'updated_at', 'created_at'], 'safe'],
            [['content', 'publish_name'], 'safe'],
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
    public function search($params, $user_id = null)
    {
        $query = Notice::find();

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
            'is_deleted' => $this->is_deleted?1:0,
            'user_type' => $this->user_type,
        ]);
        if ($user_id) {
            $query->andWhere(['>', 'expire_at', time()]);
            $query->andWhere(['user_type' => [self::OBJ_ADMIN, self::OBJ_ALL]]);
        }

        $query->andFilterWhere(['or', ['like', 'title', $this->keyword], ['like', 'content', $this->keyword]]);
        $this->trigger(SearchEvent::BEFORE_SEARCH, new SearchEvent(['query' => $query]));

        return $dataProvider;
    }
}
