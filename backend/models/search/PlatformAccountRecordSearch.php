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
use backend\models\Platform;
use backend\models\PlatformAccountRecord;
use yii\base\Model;
use yii\data\ActiveDataProvider;

class PlatformAccountRecordSearch extends PlatformAccountRecord
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
        return [
            [['platform_id', 'name', 'switch', 'remark', 'created_at'], 'safe'],
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
    public function search($params)
    {
        $query = self::find()->joinWith('platform');
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => [
                'defaultOrder' => [
                    'created_at' => SORT_DESC,
                ],
            ]
        ]);
        $sort = $dataProvider->getSort();
        $sort->attributes += [
            'platform.name' => [
                'asc' => [Platform::tableName() . '.name' => SORT_ASC],
                'desc' => [Platform::tableName() . '.name' => SORT_DESC],
            ],
        ];

        $this->load($params);
        if (!$this->validate()) {
            return $dataProvider;
        }
        $query->andFilterWhere(['platform_id' => $this->platform_id])
            ->andFilterWhere(['like', self::tableName() . '.name', $this->name])
            ->andFilterWhere(['like', 'remark', $this->remark])
            ->andFilterWhere(['switch' => $this->switch]);

        $this->trigger(SearchEvent::BEFORE_SEARCH, new SearchEvent(['query' => $query]));
        return $dataProvider;
    }

}