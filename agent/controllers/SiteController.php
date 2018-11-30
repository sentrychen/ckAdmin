<?php
/**
 * Author: lf
 * Blog: https://blog.feehi.com
 * Email: job@feehi.com
 * Created at: 2017-03-15 21:16
 */

namespace agent\controllers;

use agent\models\Agent;
use agent\models\Message;
use agent\models\Notice;
use common\helpers\Util;
use dosamigos\qrcode\QrCode;
use yii;
use Exception;

use agent\models\form\LoginForm;
use agent\models\User;
use yii\base\UserException;
use yii\db\Query;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\helpers\Url;
use yii\web\HttpException;
use yii\captcha\CaptchaAction;

/**
 * Site controller
 */
class SiteController extends \yii\web\Controller
{

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'except' => ['login', 'captcha', 'language', 'download'],
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    public function actions()
    {
        $captcha = [
            'class' => CaptchaAction::class,
            'backColor' => 0x66b3ff,//背景颜色
            'maxLength' => 4,//最大显示个数
            'minLength' => 4,//最少显示个数
            'padding' => 6,//验证码字体大小，数值越小字体越大
            'height' => 34,//高度
            'width' => 100,//宽度
            'foreColor' => 0xffffff,//字体颜色
            'offset' => 13,//设置字符偏移量
        ];
        if (YII_ENV_TEST) $captcha = array_merge($captcha, ['fixedVerifyCode' => 'testme']);
        return [
            'captcha' => $captcha,
        ];
    }

    /**
     * 后台首页
     *
     * @return string
     */
    public function actionIndex()
    {
        $counts = [
            'MESSAGE' => Message::getUnreads(10),
            'NOTICE' => Notice::getRecentNoticeS(6, Notice::OBJ_AGENT)
        ];

        return $this->renderPartial('index', ['counts' => $counts]);
    }

    /**
     * 主页
     *
     * @return string
     */
    public function actionMain()
    {

        $agents = Agent::getAgentTree(null, yii::$app->getUser()->getId());
        //下级代理总数
        $statics['agentTotal'] = count($agents);
        //今日新增代理数
        $agentToday = 0;
        $today = strtotime(date('Y-m-d'));
        $ids = [];
        foreach ($agents as $row) {
            $ids[] = $row['id'];
            if ($row['created_at'] >= $today) $agentToday++;
        }

        $statics['agentToday'] = $agentToday;
        //获得总用户数

        $query = User::find()->where(['invite_agent_id' => $ids]);
        $statics['userTotal'] = $query->count();

        //今日注册用户
        $statics['userToday'] = $query->andWhere(['>=', 'created_at', $today])->count();


        return $this->render('main', ['statics' => $statics]);
    }

    /**
     * 管理员登陆
     *
     * @return string|\yii\web\Response
     */
    public function actionLogin()
    {
        if (!Yii::$app->getUser()->getIsGuest()) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->getRequest()->post()) && $model->login()) {
            return $this->goBack();
        } else {
            return $this->renderPartial('login', [
                'model' => $model,
            ]);
        }
    }

    public function actionDownload()
    {
        $code = yii::$app->getRequest()->get('code', yii::$app->option->agent_default_code);

        $client = Util::getClientType();
        if ($client == 'IOS') {
            return $this->redirect(yii::$app->option->agent_ios_url);
        } else {
            return $this->redirect(yii::$app->option->agent_apk_url);
        }

    }

    public function actionCode()
    {
        return QrCode::png(Url::to(['download', 'code' => yii::$app->getUser()->getIdentity()->promo_code], true));
    }

    /**
     * 管理员退出登陆
     *
     * @return \yii\web\Response
     */
    public function actionLogout()
    {
        Yii::$app->getUser()->logout(false);

        return $this->goHome();
    }

    /**
     * 切换语言
     *
     */
    public function actionLanguage()
    {
        $language = Yii::$app->getRequest()->get('lang');
        if (isset($language)) {
            $session = Yii::$app->getSession();
            $session->set("language", $language);
        }
        $this->goBack(Yii::$app->getRequest()->headers['referer']);
    }

    /**
     * http异常捕捉后处理
     *
     * @return string
     */
    public function actionError()
    {
        if (($exception = Yii::$app->getErrorHandler()->exception) === null) {
            // action has been invoked not from error handler, but by direct route, so we display '404 Not Found'
            $exception = new HttpException(404, Yii::t('yii', 'Page not found.'));
        }

        if ($exception instanceof HttpException) {
            $code = $exception->statusCode;
        } else {
            $code = $exception->getCode();
        }
        if ($exception instanceof Exception) {
            $name = $exception->getName();
        } else {
            $name = $this->defaultName ?: Yii::t('yii', 'Error');
        }
        if ($code) {
            $name .= " (#$code)";
        }

        if ($exception instanceof UserException) {
            $message = $exception->getMessage();
        } else {
            $message = $this->defaultMessage ?: Yii::t('yii', 'An internal server error occurred.');
        }
        $statusCode = $exception->statusCode ? $exception->statusCode : 500;
        if (Yii::$app->getRequest()->getIsAjax()) {
            return "$name: $message";
        } else {
            return $this->render('error', [
                'code' => $statusCode,
                'name' => $name,
                'message' => $message,
                'exception' => $exception,
            ]);
        }
    }

}
