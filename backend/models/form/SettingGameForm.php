<?php
/**
 * Author: lf
 * Blog: https://blog.feehi.com
 * Email: job@feehi.com
 * Created at: 2016-03-23 12:54
 */

namespace backend\models\form;

use common\models\Options;

class SettingGameForm extends Options
{

    public $game_min_limit;        //最小限红

    public $game_max_limit;        //最大限红

    public $game_dogfall_min_limit;  //最小和限红

    public $game_dogfall_max_limit;  //最大和限红

    public $game_pair_min_limit;   //最小对限红

    public $game_pair_max_limit;   //最大对限红


    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'game_min_limit' => '最小限红',
            'game_max_limit' => '最大限红',
            'game_dogfall_min_limit' => '最小和限红',
            'game_dogfall_max_limit' => '最大和限红',
            'game_pair_min_limit' => '最小对限红',
            'game_pair_max_limit' => '最大对限红',
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['game_min_limit', 'game_max_limit', 'game_dogfall_min_limit', 'game_dogfall_max_limit', 'game_pair_min_limit', 'game_pair_max_limit'], 'integer'],
            ['game_max_limit', 'compare', 'compareAttribute' => 'game_min_limit', 'operator' => '>='],
            ['game_dogfall_max_limit', 'compare', 'compareAttribute' => 'game_dogfall_min_limit', 'operator' => '>='],
            ['game_pair_max_limit', 'compare', 'compareAttribute' => 'game_pair_min_limit', 'operator' => '>='],
        ];
    }

    /**
     * 填充代理配置
     *
     */
    public function getGameSetting()
    {
        $names = $this->getNames();
        foreach ($names as $name) {
            $model = self::findOne(['name' => $name]);
            if ($model != null) {
                $this->$name = $model->value;
            } else {
                $this->name = '';
            }
        }
    }


    /**
     * 写入代理配置到数据库
     *
     * @return bool
     */
    public function setGameConfig()
    {
        $names = $this->getNames();
        foreach ($names as $name) {
            $model = self::findOne(['name' => $name]);
            if ($model != null) {
                $value = $this->$name;
                $value === null && $value = '';
                $model->value = $value;
                $result = $model->save();
            } else {
                $model = new Options();
                $model->name = $name;
                $model->value = '';
                $result = $model->save();
            }
            if ($result == false) {
                return $result;
            }
        }
        return true;
    }

}