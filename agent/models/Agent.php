<?php

namespace agent\models;

use Yii;
use yii\base\NotSupportedException;
use yii\web\IdentityInterface;


class Agent extends \common\models\Agent implements IdentityInterface
{

    /**
     * @inheritdoc
     */
    public static function findIdentity($id)
    {
        return static::findOne(['id' => $id, 'status' => [self::STATUS_NORMAL, self::STATUS_FROZEN]]);
    }

    /**
     * @inheritdoc
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        throw new NotSupportedException('"findIdentityByAccessToken" is not implemented.');
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        return static::findOne(['username' => $username, 'status' => [self::STATUS_NORMAL, self::STATUS_FROZEN]]);
    }

    /**
     * Finds user by password reset token
     *
     * @param string $token password reset token
     * @return static|null
     */
    public static function findByPasswordResetToken($token)
    {
        if (!static::isPasswordResetTokenValid($token)) {
            return null;
        }

        return static::findOne([
            'password_reset_token' => $token,
            'status' => [self::STATUS_NORMAL, self::STATUS_FROZEN],
        ]);
    }

    /**
     * Finds out if password reset token is valid
     *
     * @param string $token password reset token
     * @return boolean
     */
    public static function isPasswordResetTokenValid($token)
    {
        if (empty($token)) {
            return false;
        }

        $timestamp = (int)substr($token, strrpos($token, '_') + 1);
        $expire = Yii::$app->params['user.passwordResetTokenExpire'];
        return $timestamp + $expire >= time();
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAgentUsers()
    {
        return $this->hasMany(AgentUser::class, ['agent_id' => 'id']);
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



    /**
     * @inheritdoc
     */
    public function selfUpdate()
    {
        //Util::handleModelSingleFileUpload($this, 'avatar', '@webroot/uploads/avatar/');
        if ($this->password != '') {
            if ($this->old_password == '') {
                $this->addError('old_password', yii::t('yii', '{attribute} cannot be blank.', ['attribute' => yii::t('app', 'Old Password')]));
                return false;
            }
            if (!$this->validatePassword($this->old_password)) {
                $this->addError('old_password', yii::t('app', '{attribute} is incorrect.', ['attribute' => yii::t('app', 'Old Password')]));
                return false;
            }
            if ($this->repassword != $this->password) {
                $this->addError('repassword', yii::t('app', '{attribute} is incorrect.', ['attribute' => yii::t('app', 'Repeat Password')]));
                return false;
            }
        }
        return $this->save();
    }


    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return boolean if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return Yii::$app->security->validatePassword($password, $this->password_hash);
    }

    /**
     * @inheritdoc
     */
    public function beforeSave($insert)
    {

        if ($insert) {
            $this->parent_id = yii::$app->getUser()->getId();
        }
        return parent::beforeSave($insert);
    }
}
