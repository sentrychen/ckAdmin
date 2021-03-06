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
use backend\models\UserAccountRecord;
use yii\base\Model;
use yii\data\ActiveDataProvider;

class UserAccountRecordSearch extends UserAccountRecord
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
            [['user_id', 'trade_type_id', 'switch', 'username', 'remark', 'created_at'], 'safe'],
        ];
    }

    public function scenarios()
    {
        return Model::scenarios();
    }

    /**
     * @param $params
     * @param $userid
     * @return ActiveDataProvider
     */
    public function search($params, $userid = null)
    {
        $query = self::find();
        if (empty($userid)) {
            $query->joinWith('user');
        }

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => [
                'defaultOrder' => [
                    'created_at' => SORT_DESC,
                ],
            ]
        ]);
        if (empty($userid)) {
            $sort = $dataProvider->getSort();

            $sort->attributes += [
                'user.username' => [
                    'asc' => ['username' => SORT_ASC],
                    'desc' => ['username' => SORT_DESC],
                ],
            ];
        }



        $this->load($params);
        if ($userid)
            $this->user_id = $userid;
        if (!$this->validate()) {
            return $dataProvider;
        }
        $query->andFilterWhere(['user_id' => $this->user_id])
            ->andFilterWhere(['trade_type_id' => $this->trade_type_id])
            ->andFilterWhere(['like', 'remark', $this->remark])
            ->andFilterWhere(['switch' => $this->switch]);
        if (empty($userid))
            $query->andFilterWhere(['like', 'username', $this->username]);

        $this->trigger(SearchEvent::BEFORE_SEARCH, new SearchEvent(['query' => $query]));
        return $dataProvider;
    }

}