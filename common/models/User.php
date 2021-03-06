<?php
/**
 * Author: lf
 * Blog: https://blog.option.com
 * Email: job@option.com
 * Created at: 2017-03-15 21:16
 */

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;


/**
 * AdminUser model
 *
 * @property int $id 自增用户id
 * @property string $username 用户名
 * @property string $nickname 昵称
 * @property string $realname 真实姓名
 * @property string $id_card 身份证号
 * @property int $id_card_status 0：未实名，1：已实名
 * @property string $mobile 手机号
 * @property string $wechat 微信
 * @property string $qq QQ号\
 * @property string $deviceid 设备ID\
 * @property string $ip 注册时IP地址\
 * @property string $origin 注册来源\
 * @property string $api_token 接口令牌
 * @property string $auth_key cookie验证auth_key
 * @property string $password_hash 加密后密码
 * @property string $password_pay 支付密码
 * @property string $password_reset_token 找回密码token
 * @property string $email 用户邮箱
 * @property string $avatar 用户头像url
 * @property int $status 会员状态             1、正常             2、冻结             3、锁定             4、注销
 * @property string $xima_plan_id 洗码方案
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
    const STATUS_IDCARD_ON = 1;
    const STATUS_IDCARD_OFF = 0;

    const STATUS_OFFLINE = 0;
    const STATUS_ONLINE = 1;

    public $password;

    public $new_password;

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
            [['username', 'password', 'invite_agent_id'], 'required', 'on' => ['create']],
            [['username'], 'required', 'on' => ['update', 'self-update']],
            [['username'], 'unique', 'on' => 'create'],
            ['username', 'string', 'min' => 4, 'max' => 16],
            ['password', 'string', 'min' => 6],
            [['repassword'], 'compare', 'compareAttribute' => 'password'],
            [['status', 'xima_plan_id', 'invite_agent_id', 'invite_user_id', 'created_at', 'updated_at'], 'integer'],
            [['username', 'password_hash', 'password_pay', 'api_token', 'password_reset_token', 'email', 'avatar', 'deviceid'], 'string', 'max' => 255],
            [['ip', 'origin'], 'string', 'max' => 64],
            [['auth_key'], 'string', 'max' => 32],


        ];
    }


    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        return [
            'default' => ['username', 'nickname', 'email'],
            'update' => ['nickname', 'password', 'repassword', 'status', 'xima_plan_id'],
            'create' => ['username', 'password', 'repassword', 'invite_agent_id', 'status', 'xima_plan_id', 'deviceid', 'ip'],
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
            'realname' => '真实姓名',
            'id_card' => '身份证号',
            'id_card_status' => '是否实名',
            'mobile' => '手机号',
            'wechat' => '微信号',
            'qq' => 'QQ号',
            'api_token' => '接口令牌',
            'auth_key' => 'cookie验证auth_key',
            'password_hash' => '加密后密码',
            'password_pay' => '支付密码',
            'password_reset_token' => '找回密码token',
            'email' => '用户邮箱',
            'avatar' => '用户头像url',
            'ip' => '注册时IP',
            'origin' => '来源',
            'deviceid' => '设备ID',
            'status' => '会员状态',
            'online_status' => '在线状态',
            'xima_plan_id' => '洗码方案',
            'invite_agent_id' => '所属代理',
            'invite_user_id' => '邀请用户ID',
            'created_at' => '注册日期',
            'updated_at' => '最后修改时间',
            'password' => '密码',
            'new_password' => '新密码',
            'repassword' => '确认密码',
            'old_password' => '旧密码'
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

    public static function getStatuses($key = null)
    {
        $status = [
            self::STATUS_NORMAL => '正常',
            self::STATUS_FROZEN => '冻结',
            self::STATUS_LOCKED => '锁定',
            self::STATUS_DISABLED => '注销'
        ];
        return $status[$key] ?? $status;
    }

    public static function getOnlineStatuses($key = null)
    {
        $status = [
            self::STATUS_OFFLINE => '离线',
            self::STATUS_ONLINE => '在线',
        ];
        return $status[$key] ?? $status;
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        return static::findOne(['username' => $username, 'status' => self::STATUS_NORMAL]);
    }

    /**
     * @return UserStat|\yii\db\ActiveQuery
     */
    public function getUserStat()
    {
        return $this->hasOne(UserStat::class, ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getXimaPlan()
    {
        return $this->hasOne(XimaPlan::class, ['id' => 'xima_plan_id']);
    }

    /**
     * @return Agent|\yii\db\ActiveQuery
     */
    public function getInviteAgent()
    {
        return $this->hasOne(Agent::class, ['id' => 'invite_agent_id']);
    }

    /**
     * @return User|\yii\db\ActiveQuery
     */
    public function getInviteUser()
    {
        return $this->hasOne(User::class, ['id' => 'invite_user_id']);
    }

    /**
     * @return UserAccount|\yii\db\ActiveQuery
     */
    public function getAccount()
    {
        return $this->hasOne(UserAccount::class, ['user_id' => 'id']);
    }


    public function getPlatforms()
    {
        return $this->hasMany(PlatformUser::class, ['user_id' => 'id']);
    }

    /**
     * @param bool $insert
     * @return bool
     * @internal param bool $skipIfSet
     */
    public function beforeSave($insert)
    {
        if ($insert) {
            $this->generateAuthKey();
            $this->setPassword($this->password);
            //如果用户没有设置洗码方案，则选择所属代理所设定的默认洗码方案
            if (!$this->xima_plan_id && $this->invite_agent_id) {
                $ximaModel = XimaPlan::getDefaultPlan($this->invite_agent_id, XimaPlan::TYPE_USER);
                if ($ximaModel) {
                    $this->xima_plan_id = $ximaModel->id;
                }
            }

        } else {
            if (isset($this->password) && $this->password != '') {
                $this->setPassword($this->password);
            }
        }
        return parent::beforeSave($insert);
    }

    public function afterSave($insert, $changedAttributes)
    {
        parent::afterSave($insert, $changedAttributes);
        if ($insert) {
            $account = new UserAccount();
            $account->user_id = $this->id;
            $account->save(false);
            $stat = new UserStat();
            $stat->user_id = $this->id;
            $stat->save(false);
            //日新增用户
            Daily::addCounter(['dnu' => 1]);
            //某代理下日新增用户
            AgentDaily::addCounter(['agent_id' => $this->invite_agent_id, 'dnu' => 1]);
        }
    }

    /**
     * 处理用户登出
     */
    public function logout($removeToken = false)
    {
        if ($removeToken) {
            if ($this->api_token) {
                yii::$app->redis->del('uid:notices:' . $this->id);
                yii::$app->redis->del('token:' . $this->api_token);
            }
            $this->api_token = null;
        }

        $this->online_status = self::STATUS_OFFLINE;
        if ($this->userStat) {
            $this->userStat->last_logout_at = time();
            if ($this->userStat->last_login_at > 0)
                $this->userStat->online_duration += time() - $this->userStat->last_login_at;
            $this->userStat->save(false);
        }
        $this->save(false);
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

}

