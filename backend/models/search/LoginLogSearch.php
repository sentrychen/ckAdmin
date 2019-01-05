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
use backend\models\UserLoginLog;
use yii\base\Model;
use yii\data\ActiveDataProvider;

class LoginLogSearch extends UserLoginLog
{


    public function init()
    {
        parent::init();
    }

    public function behaviors()
    {
        return [
            TimeSearchBehavior::class,
            ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['client_type', 'device_type', 'login_ip', 'deviceid', 'created_at'], 'safe'],
        ];
    }

    public function scenarios()
    {
        return Model::scenarios();
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
                    'created_at' => SORT_DESC,
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
            ->andFilterWhere(['client_type' => $this->client_type])
            ->andFilterWhere(['device_type' => $this->device_type])
            ->andFilterWhere(['login_ip' => sprintf("%u", ip2long($this->login_ip))])
            ->andFilterWhere(['deviceid' => $this->deviceid]);

        $this->trigger(SearchEvent::BEFORE_SEARCH, new SearchEvent(['query' => $query]));
        return $dataProvider;
    }
}