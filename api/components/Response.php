<?php
/**
 * Description:
 * Created By: ONETOP
 * Created At: 2018/10/25 18:50
 */

namespace api\components;


class Response extends \yii\web\Response
{

    public function init(){
        parent::init();
        $this->on(static::EVENT_BEFORE_SEND,[$this,'beforeSend']);
    }

    public function beforeSend($event){
        $response = $event->sender;
        if ($response->data !== null) {
            $response->data = [
                'success' => $response->isSuccessful,
                'data' => $response->data,
            ];
            $response->statusCode = 200;
        }
    }
}