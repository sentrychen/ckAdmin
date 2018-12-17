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
use backend\models\BetList;
use backend\models\UserAccountRecord;
use yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use yii\db\ActiveRecord;
use yii\db\BaseActiveRecord;

class BetListSearch extends BetList
{

    public $winloss;

    public function init()
    {
        parent::init();
    }

    public function behaviors()
    {
        return [
            [
                'class'=>TimeSearchBehavior::class,
                'timeAttributes'=>['bet_at'=>'bet_at']
            ]
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id','platform_id','game_type','username','winloss','bet_at'], 'safe'],
        ];
    }

    public function scenarios()
    {
        return Model::scenarios();
    }

    public static function getWinLossList()
    {
        return [
            '>' => '赢',
            '<' => '输',
        ];
    }
    /**
     * @param $params
     * @param int $userid
     * @return ActiveDataProvider
     */
    public function search($params,$userid = null)
    {
        $query = self::find();
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => [
                'defaultOrder' => [
                    'bet_at' => SORT_DESC,
                ],
            ]
        ]);
        $sort = $dataProvider->getSort();


        $this->load($params);
        $this->user_id = $userid;
        if (!$this->validate()) {
            return $dataProvider;
        }
        $query->andFilterWhere(['user_id' => $this->user_id])
            ->andFilterWhere(['like','username', $this->username])
            ->andFilterWhere(['game_type' => $this->game_type])
            ->andFilterWhere(['platform_id' => $this->platform_id]);
        if (!empty($this->winloss))
            $query->andFilterWhere([$this->winloss,'profit', 0]);

        $this->trigger(SearchEvent::BEFORE_SEARCH, new SearchEvent(['query' => $query]));

        return $dataProvider;
    }
}