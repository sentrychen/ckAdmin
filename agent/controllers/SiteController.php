<?php
/**
 * Author: lf
 * Blog: https://blog.feehi.com
 * Email: job@feehi.com
 * Created at: 2017-03-15 21:16
 */

namespace agent\controllers;

use agent\models\Agent;
use agent\models\AgentAccountRecord;
use agent\models\BetList;
use agent\models\Message;
use agent\models\Notice;
use agent\models\Platform;
use agent\models\search\MessageSearch;
use agent\models\search\NoticeSearch;
use common\helpers\Util;
use dosamigos\qrcode\QrCode;
use yii;
use Exception;

use agent\models\form\LoginForm;
use agent\models\User;
use yii\base\UserException;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\helpers\Url;
use yii\web\BadRequestHttpException;
use yii\web\HttpException;
use yii\captcha\CaptchaAction;
use yii\helpers\BaseJson;
use yii\web\Response;

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
        $agent_id = yii::$app->getUser()->getId();

        $agents = Agent::getAgentTree(null, $agent_id);
        //下级代理总数
        $statics['agentTotal'] = count($agents);
        //今日新增代理数
        $agentToday = 0;
        $today = strtotime(date('Y-m-d'));
        $ids = [$agent_id];
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

        //今日收入
        $statics['amountToday'] = AgentAccountRecord::find()->where(['agent_id' => $agent_id, 'switch' => AgentAccountRecord::SWITCH_IN])
            ->andWhere(['>=', 'created_at', $today])->sum('amount');
        //投注输赢
        $winLost = $this->getPlatFDailySum();


        return $this->render('main', [
            'statics' => $statics,
            'agent' => yii::$app->getUser()->getIdentity(),
            'winLost' => BaseJson::encode($winLost)
        ]);
    }

    /*
     * 后台首页统计图数据
     * @return array
     */
    public function getPlatFDailySum()
    {
        $month_arr = Util::getMonth();
        $agent_id = yii::$app->getUser()->getIdentity()->getId();
        $year = date('Y');
        $platForm = Platform::getPlatfromName();
        $data = ['0' => ['平台游戏','输赢']];
        foreach($platForm as $k => $pf) {
            $name = $pf->name;
            $data[0][] = $name;
        }

        foreach($month_arr as $n => $m){
            $year = date('Y',time());
            $count = date("t",strtotime("{$year}-{$m}"));
            $dayCount = $count - 1;
            $startDate = $year.$m.'01';
            $month = (int)$m;
            $endDate = date('Ymd',strtotime("{$startDate}+{$dayCount} day"));
            $data[$month][] = $month.'月';
            $all_winL = 0;
            $data[$month][1] = 0;
            foreach($platForm as $k => $pf) {
                $platForm_id = $pf->id;
                $model = BetList::getBetListData($agent_id,$platForm_id,$startDate,$endDate,$month);
                $profit = isset($model->profit)?$model->profit:0;
                $one_winL = $profit;
                $all_winL += $profit;
                $data[$month][] = $one_winL;

            }
            $data[$month][1] = $all_winL;
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
     * 登陆的管理员修改自身
     *
     * @return string
     */
    public function actionUpdateSelf()
    {
        $model = Agent::findOne(['id' => yii::$app->getUser()->getIdentity()->getId()]);
        $model->setScenario('self-update');
        if (yii::$app->getRequest()->getIsPost()) {
            if ($model->load(yii::$app->getRequest()->post()) && $model->selfUpdate()) {
                Yii::$app->getSession()->setFlash('success', yii::t('app', 'Success'));
            } else {
                $errors = $model->getErrors();
                $err = '';
                foreach ($errors as $v) {
                    $err .= $v[0] . '<br>';
                }
                Yii::$app->getSession()->setFlash('error', $err);
            }
            $model = Agent::findOne(['id' => yii::$app->getUser()->getIdentity()->getId()]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }


    public function actionDownload()
    {
        $code = yii::$app->getRequest()->get('code', yii::$app->option->agent_default_code);

        $client = Util::getDeviceType();
        if ($client == 'iOS') {
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

        $model = Message::readMessage(Message::OBJ_AGENT, Yii::$app->getUser()->getId(), $id);
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
        $models = Message::readMessage(Message::OBJ_AGENT, Yii::$app->getUser()->getId(), $ids);
        if (!$models) {
            return ['code' => 1, 'message' => '消息不存在'];
        }

        return ['code' => 0];
    }

    /**
     * 阅读消息,$ids 为空删除全部消息
     * @return mixed|string
     * @throws []
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

}
