<?php
/**
 * Description:
 * Created By: ONETOP
 * Created At: 2018/10/25 18:50
 */

namespace api\components;


use Yii;

class Response extends \yii\web\Response
{

    public function init(){
        parent::init();
        $this->on(static::EVENT_BEFORE_SEND,[$this,'beforeSend']);
    }

    public function beforeSend($event){
        $response = $event->sender;
        if ($response->data !== null) {
            $data = $response->data;
            if ($response->isSuccessful) {
                $response->data = [
                    'code' => 0,
                    'data' => $data,
                ];
            } else {

                $response->data = [
                    'code' => empty($data['code']) ? $response->statusCode : $data['code'],
                    'data' => $response->statusCode == 500 ? '服务器繁忙，请稍后再试！' : $data['message'],
                ];
                if (YII_DEBUG) {
                    $response->data['debug'] = $data;
                }
                yii::error($data, 'api');

            }
            $response->statusCode = 200;
        }
    }
}