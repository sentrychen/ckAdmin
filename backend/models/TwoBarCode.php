<?php

namespace backend\models;

use yii\data\ActiveDataProvider;
/**
 * This is the model class for table "{{%two_bar_code}}".
 *
 */
class TwoBarCode extends \common\models\TwoBarCode
{

    public function rules()
    {
        return [

            [['url_code'], 'string'],
            [['deposit_min', 'deposit_max', 'withdraw_min', 'withdraw_max', 'sort'], 'number'],
            [['status', 'code_type','created_at', 'updated_at'], 'integer'],
            [['name', 'url', 'icon'], 'string', 'max' => 255],
        ];
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
        $query = TwoBarCode::find()->where(['<>','status',TwoBarCode::STATUS_DELETE]);

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
            'name' => $this->name,
            'url' => $this->url,
            'icon' => $this->icon,
            'url_code' => $this->url_code,
            'deposit_min' => $this->deposit_min,
            'deposit_max' => $this->deposit_max,
            'withdraw_min' => $this->withdraw_min,
            'withdraw_max' => $this->withdraw_max,
            'sort' => $this->sort,
            'status' => $this->status,
            'code_type' => $this->code_type,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'status', $this->status]);

        return $dataProvider;
    }
}
