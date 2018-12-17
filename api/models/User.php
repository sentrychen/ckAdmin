<?php
/**
 * Author: lf
 * Blog: https://blog.feehi.com
 * Email: job@feehi.com
 * Created at: 2017-08-30 19:04
 */

namespace api\models;


use common\libs\Constants;
use Yii;
use yii\web\IdentityInterface;
use yii\web\UnauthorizedHttpException;

class User extends \common\models\User implements IdentityInterface
{
    public function fields()
    {
        $fields = parent::fields();
        unset($fields['auth_key'], $fields['password_hash'], $fields['password_reset_token'],$fields['api_token'],$fields['password_pay']);
        $fields['account'] = 'account';
        $fields['user_stat'] = 'userStat';
        return $fields;
    }

    /**
     * 生成 api_token
     */
    public function generateApiToken()
    {
        $this->api_token = Yii::$app->security->generateRandomString() . '_' . time();
    }

    /**
     * 校验api_token是否有效
     */
    public static function apiTokenIsValid($token)
    {
        if (empty($token)) {
            return false;
        }

        $timestamp = (int) substr($token, strrpos($token, '_') + 1);
        $expire = Yii::$app->params['user.apiTokenExpire'];
        return $timestamp + $expire >= time();
    }

    /**
     * @param $token
     * @param null $type
     * @return null|static
     * @throws UnauthorizedHttpException
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        // 如果token无效的话，
        if(!static::apiTokenIsValid($token)) {
            throw new UnauthorizedHttpException("token is invalid.");
        }

        return static::findOne(['api_token' => $token, 'status' => self::STATUS_NORMAL]);
        // throw new NotSupportedException('"findIdentityByAccessToken" is not implemented.');
    }


    /**
     * @inheritdoc
     */
    public static function findIdentity($id)
    {
        return static::findOne(['id' => $id, 'status' => self::STATUS_NORMAL]);
    }


    /**
     * @inheritdoc
     */
    public function getId()
    {
        return $this->getPrimaryKey();
    }

    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }

    /**
     * @inheritdoc
     */
    public function getAuthKey()
    {
        return $this->auth_key;
    }

    public function beforeSave($insert)
    {
        if ($insert) {
            $option = yii::$app->option;
            $attrs = ['min_limit', 'max_limit', 'dogfall_min_limit', 'dogfall_max_limit', 'pair_min_limit', 'pair_max_limit'];
            foreach ($attrs as $attr) {
                if ($this->{$attr} === null && isset($option->{'game_' . $attr})) {
                    $this->{$attr} = $option->{'game_' . $attr};
                }
            }

            $this->xima_status = Constants::YesNo_No;
            $this->xima_type = Constants::XIMA_ONE_SIDED;
            $this->xima_rate = 0;

        }
        return parent::beforeSave($insert);
    }

}