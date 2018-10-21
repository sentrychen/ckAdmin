<?php
/**
 * Author: lf
 * Blog: https://blog.feehi.com
 * Email: job@feehi.com
 * Created at: 2017-03-15 21:16
 */

namespace agent\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;


/**
 * AdminUser model
 *
 * @property int $id 自增用户id
 * @property string $username 用户名
 * @property string $nickname 昵称
 * @property string $auth_key cookie验证auth_key
 * @property string $password_hash 加密后密码
 * @property string $password_pay 支付密码
 * @property string $password_reset_token 找回密码token
 * @property string $email 用户邮箱
 * @property string $avatar 用户头像url
 * @property int $status 会员状态             1、正常             2、冻结             3、锁定             4、注销
 * @property string $xima_rate 洗码率
 * @property int $xima_type 洗码类别 1 单边 2 双边
 * @property int $xima_status 查看洗码 0 否 1是
 * @property int $min_limit 最小限红
 * @property int $max_limit 最大限红
 * @property int $dogfall_min_limit 最小和限红
 * @property int $dogfall_max_limit 最大和限红
 * @property int $pair_min_limit 最小对限红
 * @property int $pair_max_limit 最大和限红
 * @property int $invite_agent_id 邀请代理ID
 * @property string $invite_user_id 邀请用户ID
 * @property int $created_at 创建时间
 * @property int $updated_at 最后修改时间
 */
class User extends ActiveRecord
{
    const STATUS_NORMAL = 1;
    const STATUS_FROZEN = 2;
    const STATUS_LOCKED = 3;
    const STATUS_DISABLED = 4;

    public $password;

    public $repassword;

    public $old_password;


    /**
     * 返回数据表名
     *
     * @return string
     */
    public static function tableName()
    {
        return '{{%user}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'password', 'repassword'], 'required', 'on' => ['create']],
            [['username'], 'required', 'on' => ['update', 'self-update']],
            [['username'], 'unique', 'on' => 'create'],
            [['repassword'], 'compare', 'compareAttribute' => 'password'],
            [['status', 'xima_type', 'xima_status', 'min_limit', 'max_limit', 'dogfall_min_limit', 'dogfall_max_limit', 'pair_min_limit', 'pair_min_limit', 'invite_agent_id', 'invite_user_id', 'created_at', 'updated_at'], 'integer'],
            [['xima_rate'], 'number'],
            [['username', 'password_hash', 'password_pay', 'password_reset_token', 'email', 'avatar'], 'string', 'max' => 255],
            [['auth_key'], 'string', 'max' => 32],
            [['max_limit'], 'compare', 'compareAttribute' => 'min_limit', 'operator' => '>='],
            [['dogfall_max_limit'], 'compare', 'compareAttribute' => 'dogfall_min_limit', 'operator' => '>='],
            [['pair_max_limit'], 'compare', 'compareAttribute' => 'pair_min_limit', 'operator' => '>='],
            [['min_limit'], 'compare', 'compareValue' => yii::$app->feehi->game_min_limit, 'operator' => '>='],
            [['max_limit'], 'compare', 'compareValue' => yii::$app->feehi->game_max_limit, 'operator' => '<='],
            [['dogfall_min_limit'], 'compare', 'compareValue' => yii::$app->feehi->game_dogfall_min_limit, 'operator' => '>='],
            [['dogfall_max_limit'], 'compare', 'compareValue' => yii::$app->feehi->game_dogfall_max_limit, 'operator' => '<='],
            [['pair_min_limit'], 'compare', 'compareValue' => yii::$app->feehi->game_pair_min_limit, 'operator' => '>='],
            [['pair_max_limit'], 'compare', 'compareValue' => yii::$app->feehi->game_pair_max_limit, 'operator' => '<='],
            [['xima_rate'], 'compare', 'compareValue' => yii::$app->feehi->game_pair_max_limit, 'operator' => '<='],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        return [
            'default' => ['username'],
            'update' => ['password', 'repassword', 'status', 'min_limit', 'max_limit', 'dogfall_min_limit', 'dogfall_max_limit', 'pair_min_limit', 'pair_max_limit', 'xima_status', 'xima_type', 'xima_rate'],
            'create' => ['username', 'password', 'repassword', 'status', 'min_limit', 'max_limit', 'dogfall_min_limit', 'dogfall_max_limit', 'pair_min_limit', 'pair_max_limit', 'xima_status', 'xima_type', 'xima_rate'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => '会员ID',
            'username' => '会员账号',
            'nickname' => '会员昵称',
            'auth_key' => 'cookie验证auth_key',
            'password_hash' => '加密后密码',
            'password_pay' => '支付密码',
            'password_reset_token' => '找回密码token',
            'email' => '用户邮箱',
            'avatar' => '用户头像url',
            'status' => '会员状态',
            'xima_rate' => '洗码率',
            'xima_type' => '洗码类别',
            'xima_status' => '查看洗码',
            'min_limit' => '最小限红',
            'max_limit' => '最大限红',
            'dogfall_min_limit' => '最小和限红',
            'dogfall_max_limit' => '最大和限红',
            'pair_min_limit' => '最小对限红',
            'pair_max_limit' => '最大和限红',
            'invite_agent_id' => '邀请代理ID',
            'invite_user_id' => '邀请用户ID',
            'created_at' => '注册日期',
            'updated_at' => '最后修改时间',
            'password' => '密码',
            'repassword' => '确认密码'
        ];
    }

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            TimestampBehavior::class,
        ];
    }

    public function getStatuesLabel()
    {
        $status = self::getStatuses();
        return isset($status[$this->status]) ? $status[$this->status] : '';
    }

    public static function getStatuses()
    {
        return [
            self::STATUS_NORMAL => '正常',
            self::STATUS_FROZEN => '冻结',
            self::STATUS_LOCKED => '锁定',
            self::STATUS_DISABLED => '注销'
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserStat()
    {
        return $this->hasOne(UserStat::class, ['user_id' => 'id']);
    }

    /**
     * @param bool $skipIfSet
     */
    public function loadDefaultValues($skipIfSet = true)
    {

        $attrs = ['min_limit', 'max_limit', 'dogfall_min_limit', 'dogfall_max_limit', 'pair_min_limit', 'pair_max_limit'];
        foreach ($attrs as $attr) {
            if ($this->{$attr} === null && isset(yii::$app->feehi->{'game_' . $attr})) {
                $this->{$attr} = yii::$app->feehi->{'game_' . $attr};
            }
        }

        $identity = yii::$app->getUser()->getIdentity();
        $this->xima_status = $identity->xima_status;
        $this->xima_type = $identity->xima_type;
        $this->xima_rate = $identity->xima_rate;
        parent::loadDefaultValues();
    }

    public function beforeSave($insert)
    {
        if ($this->xima_rate)
            $this->xima_rate /= 100;
        if ($insert) {
            $this->invite_agent_id = yii::$app->getUser()->getId();
            $this->generateAuthKey();
            $this->setPassword($this->password);
        } else {
            if (isset($this->password) && $this->password != '') {
                $this->setPassword($this->password);
            }
        }
        return parent::beforeSave($insert);
    }

    /**
     * Generates "remember me" authentication key
     */
    public function generateAuthKey()
    {
        $this->auth_key = Yii::$app->security->generateRandomString();
    }

    /**
     * Generates password hash from password and sets it to the model
     *
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password_hash = Yii::$app->security->generatePasswordHash($password);
    }
}

