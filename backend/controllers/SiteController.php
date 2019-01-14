<?php
/**
 * Author: lf
 * Blog: https://blog.feehi.com
 * Email: job@feehi.com
 * Created at: 2017-03-15 21:16
 */

namespace backend\controllers;

use api\components\RestHttpException;
use backend\models\BetList;
use backend\models\Daily;
use backend\models\form\LoginForm;
use backend\models\Message;
use backend\models\Platform;
use backend\models\PlatformDaily;
use backend\models\search\MessageSearch;
use backend\models\search\NoticeSearch;
use backend\models\User;
use backend\models\UserDeposit;
use backend\models\UserLoginLog;
use backend\models\UserStat;
use backend\models\UserWithdraw;
use common\helpers\Util;
use common\models\Notice;
use Exception;
use yii;
use yii\base\UserException;
use yii\captcha\CaptchaAction;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\helpers\BaseJson;
use yii\web\BadRequestHttpException;
use yii\web\HttpException;
use yii\web\Response;

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
                'except' => ['login', 'captcha', 'language'],
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
            'AMOUNT' => Platform::getToalAvailableAmount(),
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
        $statics = Daily::getSumData('today');
        $userSum = $this->getDailySum();
        $platform = $this->getPlatFDailySum();
        return $this->render('main', [
            'statics' => $statics,
            'userSum' => BaseJson::encode($userSum['user']),
            'userDw' => BaseJson::encode($userSum['dw']),
            'bet' => BaseJson::encode($platform['bet']),
            'winLost' => BaseJson::encode($platform['winLost']),

        ]);
    }

    public function actionLoadSumData()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        $type = Yii::$app->request->get('type');
        $tab = Yii::$app->request->get('tab');
        if ($tab == '1') {
            $strDate = date('Y-m-d', strtotime('this week'));
        } elseif ($tab == '2') {
            $strDate = date('Y-m-01');;
        } else {
            $strDate = date('Y-m-d');
        }
        $data = [];
        $statics = Daily::getSumData($strDate);

        switch ($type) {
            case 'user':
                $data[] = (int)$statics['dnu'];
                $data[] = (int)UserStat::find()->where(['>=', 'last_login_at', strtotime($strDate)])->count();
                break;
            case 'firstpay':
                $data[] = (int)$statics['ndu'];
                $data[] = number_format($statics['nda'], 2);
                break;
            case 'deposit':
                $data[] = (int)UserDeposit::find()->select('user_id')->where(['status' => UserDeposit::STATUS_CHECKED])->andWhere(['>=', 'created_at', strtotime($strDate)])->distinct()->count();
                $data[] = number_format($statics['dda'], 2);
                break;
            case 'withdraw':
                $data[] = (int)UserWithdraw::find()->select('user_id')->where(['status' => UserWithdraw::STATUS_CHECKED])->andWhere(['>=', 'created_at', strtotime($strDate)])->distinct()->count();
                $data[] = number_format($statics['dwa'], 2);
                break;
            case 'profit':
                $data[] = (int)$statics['dbo'];
                $data[] = number_format($statics['dla'] - $statics['dpa'], 2);
                break;
            case 'bet':
                $data[] = (int)BetList::find()->select('user_id')->where(['>=', 'bet_at', strtotime($strDate)])->distinct()->count();
                $data[] = number_format($statics['dba'], 2);
                break;
        }

        return $data;
    }

    public function actionListNotice()
    {
        $searchModel = new NoticeSearch();
        $dataProvider = $searchModel->search(yii::$app->getRequest()->getQueryParams(), Yii::$app->getUser()->getId());

        return $this->render('notice', ['dataProvider' => $dataProvider, 'searchModel' => $searchModel]);
    }

    public function actionListMessage()
    {
        $searchModel = new MessageSearch();
        $dataProvider = $searchModel->searchByUser(yii::$app->getRequest()->getQueryParams(), Yii::$app->getUser()->getId());
        return $this->render('message', ['dataProvider' => $dataProvider, 'searchModel' => $searchModel]);
    }

    public function actionMessageInfo($id)
    {

        $model = Message::readMessage(Message::OBJ_ADMIN, Yii::$app->getUser()->getId(), $id);
        if (!$model) {
            throw new BadRequestHttpException('消息不存在');
        }
        return $this->render('message-info', ['model' => current($model)]);
    }

    /**
     * 阅读消息,$ids 为空阅读全部消息
     * @param null $ids
     * @return mixed|string
     * @throws RestHttpException
     */
    public function actionReadMessage($ids = null)
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        if (null !== $ids) $ids = explode(',', $ids);
        $models = Message::readMessage(Message::OBJ_ADMIN, Yii::$app->getUser()->getId(), $ids);
        if (!$models) {
            return ['code' => 1, 'message' => '消息不存在'];
        }

        return ['code' => 0];
    }

    /**
     * 阅读消息,$ids 为空删除全部消息
     * @return mixed|string
     * @throws RestHttpException
     */
    public function actionDeleteMessage()
    {
        $ids = yii::$app->getRequest()->get('ids', null);
        $param = yii::$app->getRequest()->post('id', null);
        if ($param !== null) {
            $ids = $param;
        }
        Yii::$app->response->format = Response::FORMAT_JSON;
        if (null !== $ids) $ids = explode(',', $ids);
        $models = Message::deleteMessage(Message::OBJ_ADMIN, Yii::$app->getUser()->getId(), $ids);
        if (!$models) {
            return ['code' => 1, 'message' => '消息不存在'];
        }

        return ['code' => 0];

    }

    /*
     * 后台首页用户统计图数据
     * @return array
     */
    public function getDailySum()
    {
        $month_arr = Util::getMonth();
        $data['user'] = ['0' => ['用户', '新增用户', '活跃用户', '首存用户']];
        $data['dw'] = ['0' => ['存取款', '存款', '取款']];

        foreach ($month_arr as $m) {
            $year = date('Y', time());
            $count = date("t", strtotime("{$year}-{$m}"));
            $dayCount = $count - 1;
            $startDate = $year . $m . '01';
            $month = (int)$m;
            $endDate = date('Ymd', strtotime("{$startDate}+{$dayCount} day"));
            $result = Daily::getSumData($startDate, $endDate);
            $dnu = $result['dnu'] ? $result['dnu'] : 0;
            $dau = $result['dau'] ? $result['dau'] : 0;
            $ndu = $result['ndu'] ? $result['ndu'] : 0;
            $dda = $result['dda'] ? $result['dda'] : 0;
            $dwa = $result['dwa'] ? $result['dwa'] : 0;
            $data['user'][] = ["{$month}月", $dnu, $dau, $ndu];
            $data['dw'][] = ["{$month}月", $dda, $dwa];
        }
        return $data;
    }

    /*
     * 后台首页投注统计图数据
     * @return array
     */
    public function getPlatFDailySum()
    {
        $month_arr = Util::getMonth();
        $year = date('Y', time());
        $platForm = Platform::getPlatfromName();
        $data['bet'] = ['0' => ['平台游戏']];
        $data['winLost'] = ['0' => ['平台游戏', '输赢']];
        foreach ($platForm as $k => $pf) {
            $name = $pf->name;
            $data['bet'][0][] = $data['winLost'][0][] = $name;
        }
        foreach ($month_arr as $n => $m) {
            $count = date("t", strtotime("{$year}-{$m}"));
            $dayCount = $count - 1;
            $startDate = $year . $m . '01';
            $month = (int)$m;
            $endDate = date('Ymd', strtotime("{$startDate}+{$dayCount} day"));
            $data['bet'][$month][] = $data['winLost'][$month][] = $month . '月';
            $all_winL = 0;
            $data['winLost'][$month][1] = 0;
            foreach ($platForm as $k => $pf) {
                $platform_id = $pf->id;
                $model = PlatformDaily::getBetData($platform_id, $startDate, $endDate);
                $dbo = $model['dbo'] ? $model['dbo'] : 0;
                $dpa = $model['dpa'] ? $model['dpa'] : 0;
                $dla = $model['dla'] ? $model['dla'] : 0;
                $one_winL = $dla - $dpa;
                $all_winL += $one_winL;
                $data['bet'][$month][] = $dbo;
                $data['winLost'][$month][] = $one_winL;
            }
            $data['winLost'][$month][1] = $all_winL;
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
     *  获得消息通知
     */
    public function actionNotice()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        $uid = Yii::$app->getUser()->getId();
        $notices = Yii::$app->redis->get('admin:notices:' . $uid);
        if ($notices)
            $notices = json_decode($notices);
        else {
            $notices = [];
        }
        Yii::$app->redis->del('admin:notices:' . $uid);
        return $notices;
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
