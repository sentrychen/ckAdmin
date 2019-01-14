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
use backend\models\UserDeposit;
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
            'winLost' => BaseJson::encode($platform['wl']),

        ]);
    }

    public function actionLoadSumData()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        $field = Yii::$app->request->get('field');
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

        switch ($field) {
            case 'user':
                $data[] = $statics['dnu'];
                $data[] = UserStat::find()->where(['>=', 'last_login_at', strtotime($strDate)])->count();
                break;
            case 'firstpay':
                $data[] = $statics['ndu'];
                $data[] = $statics['nda'];
                break;
            case 'deposit':
                $data[] = UserDeposit::find()->select('user_id')->where(['status' => UserDeposit::STATUS_CHECKED])->andWhere(['>=', 'created_at', strtotime($strDate)])->distinct()->count();
                $data[] = $statics['dda'];
                break;
            case 'withdraw':
                $data[] = UserWithdraw::find()->select('user_id')->where(['status' => UserWithdraw::STATUS_CHECKED])->andWhere(['>=', 'created_at', strtotime($strDate)])->distinct()->count();
                $data[] = $statics['dwa'];
                break;
            case 'profit':
                $data[] = $statics['dbo'];
                $data[] = $statics['dla'] - $statics['dpa'];
                break;
            case 'bet':
                $data[] = BetList::find()->select('user_id')->where(['>=', 'bet_at', strtotime($strDate)])->distinct()->count();
                $data[] = $statics['dba'];
                break;
        }
        if (!empty($data)) {
            $data[0] = number_format($data[0]);
            $data[1] = number_format($data[1], $field == 'user' ? 0 : 2);
        }

        return $data;
    }

    public function actionLoadChartData()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        $type = Yii::$app->request->get('type');
        $chart = Yii::$app->request->get('chart');
        if ($chart == 'user' || $chart == 'dw') {
            $data = $this->getDailySum($type);
        } else {
            $data = $this->getPlatFDailySum($type);
        }

        return $data[$chart] ?? [];

    }


    /**
     * @param $type
     * @return array
     */
    private function _getDateRange($type)
    {
        $date_arr = [];
        if ($type == 'month') {
            $t = strtotime(date('Y-m-01'));
            for ($i = 0; $i < 12; $i++) {
                $date_arr[$t] = date('n', $t) == 1 ? date('y年n月', $t) : date('n月', $t);
                $t = strtotime('-1 month', $t);
            }

        } else {
            $t = time();
            for ($i = 0; $i < 30; $i++) {
                $date_arr[$t] = date('n/j', $t);
                $t -= 24 * 3600;
            }
        }
        return array_reverse($date_arr, true);
    }

    /**
     * 后台首页用户统计图数据
     * @param string $type
     * @return array
     */
    public function getDailySum($type = 'day')
    {

        $dateRanges = $this->_getDateRange($type);
        $data['user'] = ['0' => ['用户', '新增用户', '活跃用户', '首存用户']];
        $data['dw'] = ['0' => ['存取款', '存款', '取款']];

        foreach ($dateRanges as $k => $v) {
            if ($type == 'day') {
                $startDate = $endDate = date('Y-m-d', $k);
            } else {
                $startDate = date('Y-m-01', $k);
                $endDate = date('Y-m', $k) . '-' . date('t', $k);
            }

            $result = Daily::getSumData($startDate, $endDate);
            $dnu = $result['dnu'] ? $result['dnu'] : 0;
            $dau = $result['dau'] ? $result['dau'] : 0;
            if ($type == 'month') {
                $dau = UserStat::find()->where(['between', 'last_login_at', strtotime($startDate), strtotime($endDate) + 86399])->count();
            }
            $ndu = $result['ndu'] ? $result['ndu'] : 0;
            $dda = $result['dda'] ? $result['dda'] : 0;
            $dwa = $result['dwa'] ? $result['dwa'] : 0;
            $data['user'][] = [$v, $dnu, $dau, $ndu];
            $data['dw'][] = [$v, $dda, $dwa];
        }
        return $data;
    }

    /**
     * 后台首页投注统计图数据
     * @param string $type
     * @return array
     */
    public function getPlatFDailySum($type = 'day')
    {

        $dateRanges = $this->_getDateRange($type);

        $platForm = Platform::getPlatfromName();
        $data['bet'] = [0 => ['平台游戏']];
        $data['wl'] = [0 => ['平台游戏', '损益']];
        foreach ($platForm as $k => $pf) {
            $name = $pf->name;
            $data['bet'][0][] = $data['wl'][0][] = $name;
        }
        $i = 1;
        foreach ($dateRanges as $k => $v) {
            if ($type == 'day') {
                $startDate = $endDate = date('Ymd', $k);
            } else {
                $startDate = date('Ym', $k) . '01';
                $endDate = date('Ym', $k) . '31';
            }
            $data['bet'][$i][0] = $data['wl'][$i][0] = $v;
            $data['wl'][$i][1] = 0;
            $profit = 0;
            foreach ($platForm as $p) {
                $daily = PlatformDaily::getBetData($p->id, $startDate, $endDate);
                $dbo = $daily['dbo'] ? $daily['dbo'] : 0;
                $dpa = $daily['dpa'] ? $daily['dpa'] : 0;
                $dla = $daily['dla'] ? $daily['dla'] : 0;
                $data['bet'][$i][] = $dbo;
                $data['wl'][$i][] = $dla - $dpa;
                $profit += $dla - $dpa;
            }
            $data['wl'][$i][1] = $profit;
            $i++;
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
