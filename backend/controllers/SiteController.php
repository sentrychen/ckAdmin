<?php
/**
 * Author: lf
 * Blog: https://blog.feehi.com
 * Email: job@feehi.com
 * Created at: 2017-03-15 21:16
 */

namespace backend\controllers;

use backend\models\PlatformAccount;
use backend\models\User;
use common\libs\Constants;
use backend\models\Daily;
use backend\models\platformDaily;
use backend\models\Platform;
use backend\models\Message;
use common\models\Notice;
use common\models\UserDeposit;
use common\models\UserWithdraw;
use yii;
use Exception;

use backend\models\form\LoginForm;
use yii\base\UserException;
use yii\db\Query;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\HttpException;
use yii\captcha\CaptchaAction;

/**
 * Site controller
 */
class SiteController extends Controller
{

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'except' =>['login', 'captcha', 'language'],
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    public function actions()
    {
        $captcha = [
            'class' => CaptchaAction::className(),
            'backColor' => 0x66b3ff,//背景颜色
            'maxLength' => 4,//最大显示个数
            'minLength' => 4,//最少显示个数
            'padding' => 6,//验证码字体大小，数值越小字体越大
            'height' => 34,//高度
            'width' => 100,//宽度
            'foreColor' => 0xffffff,//字体颜色
            'offset' => 13,//设置字符偏移量
        ];
        if( YII_ENV_TEST ) $captcha = array_merge($captcha, ['fixedVerifyCode'=>'testme']);
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
            'AMOUNT' => PlatformAccount::getToalAvailableAmount(),
            'DESPOSIT' => UserDeposit::getUncheckedCount(),
            'WITHDRAW' => UserWithdraw::getUncheckedCount(),
            'MESSAGE' => Message::getUnreads(10),
            'NOTICE' => Notice::getRecentNoticeS(6, Notice::OBJ_ADMIN)
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

        // $comments = BackendComment::getRecentComments(6);
        $statics = Daily::getSumData('-30 day');
        $userSum = $this->getDailySum();
        $platform = $this->getPlatFDailySum();
        return $this->render('main', [
            'statics' => $statics,
            'userSum' => json_encode($userSum['user']),
            'userDw' => json_encode($userSum['dw']),
            'bet' => json_encode($platform['bet']),
            'winLost' => json_encode($platform['winLost']),

        ]);
    }

    /*
     * 后台首页统计图数据
     * @return array
     */
    public function getDailySum()
    {
        $month_arr = ['01','02','03','04','05','06','07','08','09','10','11','12'];
        $data['user'] = ['0' => ['用户', '新增用户', '活跃用户', '首存用户']];
        $data['dw'] = ['0' => ['存取款', '存款', '取款']];

        $year = date('Y');
        foreach($month_arr as $m){
            $year = date('Y',time());
            $count = date("t",strtotime("{$year}-{$m}"));
            $dayCount = $count - 1;
            $startDate = $year.$m.'01';
            $month = (int)$m;
            $endDate = date('Ymd',strtotime("{$startDate}+{$dayCount} day"));
            $data = Daily::getDaliyData($startDate,$endDate,$month,$data);
        }
        return $data;
    }

    /*
     * 后台首页统计图数据
     * @return array
     */
    public function getPlatFDailySum()
    {
        $month_arr = ['01','02','03','04','05','06','07','08','09','10','11','12'];

        $year = date('Y');
        $platForm = Platform::getPlatfromName();
        $data['bet'] = ['0' => ['平台游戏']];
        $data['winLost'] = ['0' => ['平台游戏','输赢']];
        foreach($platForm as $k => $pf) {
            $name = $pf->name;
            $data['bet'][0][] = $data['winLost'][0][] = $name;
        }
        foreach($month_arr as $n => $m){
            $year = date('Y',time());
            $count = date("t",strtotime("{$year}-{$m}"));
            $dayCount = $count - 1;
            $startDate = $year.$m.'01';
            $month = (int)$m;
            $endDate = date('Ymd',strtotime("{$startDate}+{$dayCount} day"));
            $data['bet'][$month][] = $data['winLost'][$month][] = $month.'月';
            $all_winL = 0;
            $one_winL = 0;
            foreach($platForm as $k => $pf) {
                $platform_id = $pf->id;
                $model = platformDaily::getBetData($platform_id,$startDate,$endDate,$month);
                $dbo = $model['dbo']?$model['dbo']:0;
                $dpa = $model['dpa']?$model['dpa']:0;
                $dla = $model['dla']?$model['dla']:0;
                $one_winL = $dpa-$dla;
                $all_winL += $one_winL;
                $data['bet'][$month][] = $dbo;
                $data['winLost'][$month][] = $one_winL;
            }
            $data['winLost'][$month][] = $all_winL;
        }


        return $data;
    }

    /**
     * 管理员登陆
     *
     * @return string|\yii\web\Response
     */
    public function actionLogin()
    {
        if (! Yii::$app->getUser()->getIsGuest()) {
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
