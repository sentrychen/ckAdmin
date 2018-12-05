<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/12/5
 * Time: 10:36
 */

namespace backend\controllers;
use common\components\Upload;
use yii\helpers\Json;

class FileController extends \yii\web\Controller
{
    public function actionUpload()
    {
        try {
            $model = new Upload();
            $info = $model->upImage();


            $info && is_array($info) ?
                exit(Json::htmlEncode($info)) :
                exit(Json::htmlEncode([
                    'code' => 1,
                    'msg' => 'error'
                ]));


        } catch (\Exception $e) {
            exit(Json::htmlEncode([
                'code' => 1,
                'msg' => $e->getMessage()
            ]));
        }
    }
}