<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/12/21
 * Time: 14:53
 */
namespace backend\models;

class UserBank extends \common\models\UserBank
{
    /*
     * 查询会员绑定的银行卡
     * @param int $user_id 会员id
     * @return array
     *
     */
    public static function getUserBank($user_id){
        $query = UserBank::find()->where(['user_id'=>$user_id,'status'=>1])->asArray()->all();
        return $query;
    }

}