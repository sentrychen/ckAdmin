<?php
/**
 * Author: lf
 * Blog: https://blog.feehi.com
 * Email: job@feehi.com
 * Created at: 2017-03-15 21:16
 */

/* @var $this \yii\web\View */

/* @var $content string */

use backend\assets\IndexAsset;
use backend\models\Menu;
use common\helpers\{
    FileDependencyHelper, StringHelper
};
use common\widgets\JsBlock;
use yii\caching\FileDependency;
use yii\helpers\Html;
use yii\helpers\Url;

IndexAsset::register($this);

$this->title = yii::t('app', 'Backend Manage System');

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="renderer" content="webkit">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    <link rel="icon" href="<?= yii::$app->getRequest()->getBaseUrl() ?>/favicon.ico" type="image/x-icon"/>
</head>
<body class="fixed-sidebar full-height-layout gray-bg" style="overflow:hidden">
<?php $this->beginBody() ?>
<div id="wrapper">
    <!--左侧导航开始-->
    <nav class="navbar-default navbar-static-side" role="navigation">
        <div class="nav-close"><i class="fa fa-times-circle"></i>
        </div>
        <div class="sidebar-collapse">
            <ul class="nav" id="side-menu">
                <li class="nav-header">
                    <div class="profile-element">
                        <span>
                            <img alt="image" height="49px" width="170px"
                                 src="<?= yii::$app->getRequest()->getBaseUrl() . '/static/img/logo-admin.png' ?>"/>
                        </span>
                        <p>系统管理平台</p>
                    </div>
                    <div class="logo-element" title="万通国际系统管理平台"><img alt="image" height="25px" width="25px"
                                                                      src="<?= yii::$app->getRequest()->getBaseUrl() . '/static/img/white-logo.png' ?>"/>
                    </div>
                </li>
                <?php
                $cacheDependencyObject = yii::createObject([
                    'class' => FileDependencyHelper::className(),
                    'fileName' => 'backend_menu.txt',
                ]);
                $dependency = [
                    'class' => FileDependency::className(),
                    'fileName' => $cacheDependencyObject->createFile(),
                ];
                if ($this->beginCache('backend_menu', [
                    'variations' => [
                        Yii::$app->language,
                        yii::$app->getUser()->getId()
                    ],
                    'dependency' => $dependency
                ])
                ) {
                    ?>
                    <?= Menu::getBackendMenu(); ?>
                    <?php $this->endCache();
                } ?>
            </ul>
        </div>
    </nav>
    <!--左侧导航结束-->
    <!--右侧部分开始-->
    <div id="page-wrapper" class="gray-bg dashbard-1">
        <div class="row border-bottom">
            <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
                <div class="navbar-header" style="width: 100px">
                    <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i
                                class="fa fa-outdent"></i><i class="fa fa-indent"></i> </a>
                </div>

                <ul class="nav navbar-top-links navbar-right">

                    <li>
                        <a href="javascript:void(0)" onclick="reloadIframe()" title="刷新当前页面"><i
                                    class="fa fa-refresh"></i> <?= yii::t('app', 'Refresh') ?></a>
                    </li>

                    <li class="hidden-xs">
                        <a class="J_menuItem" href="<?= Url::to(['platform/amount']) ?>" title="当前平台可用游戏额度"><i
                                    class="fa fa-credit-card"></i> 额度 <span
                                    class="label label-warning"><?= yii::$app->formatter->asCurrency($counts['AMOUNT']) ?></span></a>
                    </li>
                    <li class="hidden-xs">
                        <a class="J_menuItem count-info" href="<?= Url::to(['deposit/index']) ?>" title="待审核取款申请"><i
                                    class="fa fa-sign-in"></i> 存款<span
                                    class="label label-danger"><?= $counts['DESPOSIT'] ? $counts['DESPOSIT'] : '' ?></span></a>
                    </li>
                    <li class="hidden-xs">
                        <a class="J_menuItem count-info" href="<?= Url::to(['withdraw/index']) ?>" title="未审核取款申请"><i
                                    class="fa fa-sign-out"></i> 取款<span
                                    class="label label-danger"><?= $counts['WITHDRAW'] ? $counts['WITHDRAW'] : '' ?></span></a>
                    </li>


                    <li class="dropdown hidden-xs">
                        <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#" title="未读消息">
                            <i class="fa fa-envelope"></i> <span
                                    class="label label-danger"
                                    id="message-count"><?= $counts['MESSAGE']['count'] ? $counts['MESSAGE']['count'] : '' ?></span>
                            消息
                        </a>
                        <ul class="dropdown-menu dropdown-messages">
                            <?php
                            $levelIcons = [1 => 'fa-info-circle', 2 => 'fa-exclamation-circle', 3 => 'fa-warning'];
                            $levelTexts = [1 => 'text-muted', 2 => 'text-warning', 3 => 'text-danger'];
                            foreach ($counts['MESSAGE']['data'] as $message) {

                                ?>
                                <li class="m-t-xs message-title msg-item" data-id="<?= $message->id ?>"
                                    style="cursor:pointer">
                                    <div class="dropdown-messages-box">
                                        <div class="media-body" style="padding:0 10px;">
                                            <small class="pull-right"
                                                   style="color:#bbb;"><?= yii::$app->getFormatter()->asRelativeTime($message->created_at) ?></small>
                                            <div style="padding-bottom: 3px;">
                                                <i class="fa <?= $levelIcons[$message->level] ?> <?= $levelTexts[$message->level] ?>"> </i>
                                                <strong title="<?= Html::encode($message->title) ?>">
                                                    <?= StringHelper::truncate(strip_tags($message->title), 16, '...', 'UTF-8') ?>
                                                </strong></div>
                                            <small style="padding-left:16px;color:#bbb;"><?= StringHelper::truncate(strip_tags($message->content), 16, '...', 'UTF-8') ?></small>
                                        </div>
                                    </div>
                                </li>
                                <li class="divider msg-item"></li>
                                <?php
                            }
                            ?>
                            <li>
                                <div class="text-center link-block">
                                    <a class="J_menuItem" title="消息列表" href="<?= Url::toRoute(['message/index']) ?>">
                                        <i class="fa fa-envelope"></i> <strong> 查看所有消息</strong>
                                    </a>
                                    <?php
                                    if ($counts['MESSAGE']['count'] > 0) {
                                        ?>
                                        <a class="msg-item" title="标记所有消息为已读" href="javascript:readAllMessage()">
                                            <i class="fa fa-check-square-o"></i> <strong> 标记所有为已读</strong>
                                        </a>
                                        <?php
                                    }
                                    ?>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown hidden-xs">
                        <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#" title="系统公告">
                            <i class="fa fa-bell"></i> <span
                                    class="label label-danger"><?= $counts['NOTICE']['count'] ? $counts['NOTICE']['count'] : '' ?></span>
                            公告
                        </a>
                        <ul class="dropdown-menu dropdown-alerts">
                            <?php
                            $topClass = ['text-muted', 'text-warning'];
                            foreach ($counts['NOTICE']['data'] as $notice) {
                                ?>
                                <li class="m-t-xs">
                                    <div class="dropdown-messages-box">
                                        <div class="media-body" style="padding:0 10px;">
                                            <div style="padding-bottom:3px">
                                                <small style="color:#bbb;"><?= yii::$app->getFormatter()->asRelativeTime($notice->created_at) ?></small>
                                            </div>
                                            <div class="<?= $topClass[$notice->set_top] ?>"><?= StringHelper::truncate($notice->content, 60, '...', 'UTF-8', true) ?></div>
                                        </div>
                                    </div>
                                </li>
                                <li class="divider"></li>
                                <?php
                            }
                            ?>
                            <li>
                                <div class="text-center link-block">
                                    <a class="J_menuItem" href="<?= Url::toRoute(['notice/index']) ?>">
                                        <i class="fa fa-bell"></i> <strong>查看所有公告 </strong>
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <li class="hidden-xs">
                        <a href="<?= yii::$app->params['site']['url'] ?>" target='_blank' title="进入代理后台"><i
                                    class="fa fa-ship"></i> 代理</a>
                    </li>
                    <li>
                        <a class="J_menuItem" href="<?= Url::to(['admin-user/update-self']) ?>" title="修改个人资料"><i
                                    class="fa fa-user"> <?= Html::encode(yii::$app->getUser()->getIdentity()->username) ?></i></a>
                    </li>

                </ul>
            </nav>
        </div>
        <div class="row content-tabs">
            <button class="roll-nav roll-left J_tabLeft"><i class="fa fa-backward"></i>
            </button>
            <nav class="page-tabs J_menuTabs">
                <div class="page-tabs-content">
                    <a href="javascript:;" class="active J_menuTab"
                       data-id="<?= Url::to(['site/main']) ?>"><?= yii::t('app', 'Home') ?></a>
                </div>
            </nav>
            <button class="roll-nav roll-right J_tabRight"><i class="fa fa-forward"></i></button>
            <div class="btn-group roll-nav roll-right">
                <button class="dropdown J_tabClose" data-toggle="dropdown"><?= yii::t('app', 'Close') ?><span
                            class="caret"></span></button>
                <ul role="menu" class="dropdown-menu dropdown-menu-right">
                    <li class="J_tabShowActive"><a><?= yii::t('app', 'Locate Current Tab') ?></a></li>
                    <li class="divider"></li>
                    <li class="J_tabCloseAll"><a><?= yii::t('app', 'Close All Tab') ?></a></li>
                    <li class="J_tabCloseOther"><a><?= yii::t('app', 'Close Other Tab') ?></a></li>
                </ul>
            </div>
            <?= Html::a('<i class="fa fa fa-sign-out"></i>' . yii::t('app', 'Logout'), Url::toRoute('site/logout'), ['data-method' => 'post', 'class' => 'roll-nav roll-right J_tabExit']) ?>
        </div>
        <div class="row J_mainContent" id="content-main">
            <iframe class="J_iframe" name="iframe0" width="100%" height="100%" src="<?= Url::to(['site/main']) ?>"
                    frameborder="0" data-id="<?= Url::to(['site/main']) ?>" seamless></iframe>
        </div>
        <div class="footer">
            <div class="pull-right">&copy; 2015-<?= date('Y') ?> <a href="http://www.abc.com/" target="_blank">abc</a>
            </div>

        </div>
    </div>
    <audio src='<?= yii::$app->getRequest()->getBaseUrl() . '/static/wav/msg.wav' ?>' style='display:none'
           id='audio'></audio>
    <!--右侧部分结束-->
    <!--右侧边栏开始-->
    <?php $this->endBody() ?>
</body>
<?php JsBlock::begin() ?>
<script type="text/javascript">
    $(function () {
        $('.message-title').click(function () {
            var $this = $(this);
            let id = $(this).attr('data-id');
            $.get('<?=Url::to(['site/read-message'])?>?ids=' + id, function (data) {
                if (data && data.code === 0) {
                    layer.alert(data.data.content, {
                        skin: 'layui-layer-lan',
                        title: data.data.title,
                        shadeClose: true,
                        btn: null
                    });
                    $this.next().remove();
                    $this.remove();
                    let cnt = $('#message-count').text();
                    cnt--;
                    if (cnt > 0) {
                        $('#message-count').text(cnt);
                    } else {
                        $('#message-count').html('');
                        $('.msg-item').remove();
                    }
                }
            });
        });
    });

    function reloadIframe() {
        let current_iframe = $("iframe:visible");
        current_iframe[0].contentWindow.location.reload();
        return false;
    }

    if (window.top !== window.self) {
        window.top.location = window.location;
    }

    function readAllMessage() {
        $.get('<?=Url::to(['site/read-message'])?>', function (data) {
            if (data && data.code === 0) {
                $('#message-count').text('');
                $('.msg-item').remove();
            }
        });
    }

    function getNotice() {
        $.getJSON('<?=Url::to(['site/notice'])?>', function (res) {
            let content = '';
            $.each(res, function (i, v) {
                content += "<br>" + v.message;
            });
            if (content !== '') {
                $('#audio')[0].play();
                layer.msg(content, {
                    title: '消息通知',
                    offset: '30px',
                    time: 3000
                });
            }
        });
    }

    setInterval(getNotice, 10000);
</script>
<?php JsBlock::end() ?>
</html>
<?php $this->endPage() ?>
