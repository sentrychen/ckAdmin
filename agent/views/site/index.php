<?php
/**
 * Author: lf
 * Blog: https://blog.feehi.com
 * Email: job@feehi.com
 * Created at: 2017-03-15 21:16
 */

/* @var $this \yii\web\View */

/* @var $content string */

use common\helpers\FileDependencyHelper;
use common\helpers\StringHelper;
use yii\caching\FileDependency;
use yii\helpers\Html;
use agent\models\Menu;
use yii\helpers\Url;
use backend\assets\IndexAsset;

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
    <link rel="icon" href="<?= yii::$app->getRequest()->getHostInfo() ?>/favicon.ico" type="image/x-icon"/>
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
                        <p>代理后台</p>
                    </div>
                    <div class="logo-element" title="万通国际系统管理平台"><img alt="image" height="25px" width="25px"
                                                                      src="<?= yii::$app->getRequest()->getBaseUrl() . '/static/img/white-logo.png' ?>"/>
                    </div>
                </li>
                <?php
                $cacheDependencyObject = yii::createObject([
                    'class' => FileDependencyHelper::class,
                    'fileName' => 'backend_menu.txt',
                ]);
                $dependency = [
                    'class' => FileDependency::class,
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
                <div class="navbar-header" style="width: 50%;">
                    <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i>
                    </a>
                </div>
                <ul class="nav navbar-top-links navbar-right">

                    <li class="hidden-xs">
                        <a href="javascript:void(0)" onclick="reloadIframe()"><i
                                    class="fa fa-refresh"></i> <?= yii::t('app', 'Refresh') ?></a>
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
                                    <a class="J_menuItem" title="消息列表"
                                       onclick="$(this).closest('li.dropdown').removeClass('open');"
                                       href="<?= Url::toRoute(['site/list-message']) ?>">
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
                                    <a class="J_menuItem" onclick="$(this).closest('li.dropdown').removeClass('open');"
                                       href="<?= Url::toRoute(['site/list-notice']) ?>">
                                        <i class="fa fa-bell"></i> <strong>查看所有公告 </strong>
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown hidden-xs">

                        <a class="dropdown-toggle cert" data-toggle="dropdown" href="#" title="登录用户">
                            <i
                                    class="fa fa-user"> <?= Html::encode(yii::$app->getUser()->getIdentity()->username) ?></i><span
                                    class="caret"></span></a>
                        <ul class="dropdown-menu animated fadeInRight m-t-xs">
                            <li><a class="J_menuItem"
                                   href="<?= Url::to(['agent/view', 'id' => yii::$app->getUser()->getId()]) ?>">个人资料</a>
                            </li>
                            <li><a class="J_menuItem" href="<?= Url::to(['site/update-self']) ?>">修改密码</a></li>
                            <li class="divider"></li>
                            <li><a data-method="post" href="<?= Url::toRoute('site/logout') ?>">登出系统</a></li>
                        </ul>
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
            <div class="pull-right">&copy; 2015-<?= date('Y') ?> <a href="http://www.onetop.pw/"
                                                                    target="_blank">onetop</a></div>
        </div>
    </div>
    <!--右侧部分结束-->
    <!--右侧边栏开始-->
    <div id="right-sidebar">
        <div class="sidebar-container">
            <ul class="nav nav-tabs navs-3">
                <li class="active">
                    <a data-toggle="tab" href="#tab-1">
                        <i class="fa fa-gear"></i> <?= yii::t('app', 'Theme') ?>
                    </a>
                </li><!--
                <li class=""><a data-toggle="tab" href="#tab-2">
                        通知
                    </a>
                </li>
                <li><a data-toggle="tab" href="#tab-3">
                        项目进度
                    </a>
                </li>-->
            </ul>

            <div class="tab-content">
                <div id="tab-1" class="tab-pane active">
                    <div class="sidebar-title">
                        <h3><i class="fa fa-comments-o"></i> 主题设置</h3>
                        <small><i class="fa fa-tim"></i> 你可以从这里选择和预览主题的布局和样式，这些设置会被保存在本地，下次打开的时候会直接应用这些设置。</small>
                    </div>
                    <div class="skin-setttings">
                        <div class="title">主题设置</div>
                        <div class="setings-item">
                            <span>收起左侧菜单</span>
                            <div class="switch">
                                <div class="onoffswitch">
                                    <input type="checkbox" name="collapsemenu" class="onoffswitch-checkbox"
                                           id="collapsemenu">
                                    <label class="onoffswitch-label" for="collapsemenu">
                                        <span class="onoffswitch-inner"></span>
                                        <span class="onoffswitch-switch"></span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="setings-item">
                            <span>固定顶部</span>

                            <div class="switch">
                                <div class="onoffswitch">
                                    <input type="checkbox" name="fixednavbar" class="onoffswitch-checkbox"
                                           id="fixednavbar">
                                    <label class="onoffswitch-label" for="fixednavbar">
                                        <span class="onoffswitch-inner"></span>
                                        <span class="onoffswitch-switch"></span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="setings-item">
                                <span>
                        固定宽度
                    </span>

                            <div class="switch">
                                <div class="onoffswitch">
                                    <input type="checkbox" name="boxedlayout" class="onoffswitch-checkbox"
                                           id="boxedlayout">
                                    <label class="onoffswitch-label" for="boxedlayout">
                                        <span class="onoffswitch-inner"></span>
                                        <span class="onoffswitch-switch"></span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="title">皮肤选择</div>
                        <div class="setings-item default-skin nb">
                                <span class="skin-name ">
                         <a href="#" class="s-skin-0">
                             默认皮肤
                         </a>
                    </span>
                        </div>
                        <div class="setings-item blue-skin nb">
                                <span class="skin-name ">
                        <a href="#" class="s-skin-1">
                            蓝色主题
                        </a>
                    </span>
                        </div>
                        <div class="setings-item yellow-skin nb">
                                <span class="skin-name ">
                        <a href="#" class="s-skin-3">
                            黄色/紫色主题
                        </a>
                    </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php $this->endBody() ?>
</body>
<script>
    $(function () {
        $('.message-title').click(function () {
            let $this = $(this);
            let id = $(this).attr('data-id');
            layer.open({
                type: 2,
                title: '<i class="fa fa-envelope"> </i> 站内消息',
                shadeClose: true,
                shade: 0.8,
                area: ['400px', '300px'],
                content: "<?=Url::to(['message-info'])?>?id=" + id
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

        });
    });

    function readAllMessage() {
        $.get('<?=Url::to(['site/read-message'])?>', function (data) {
            if (data && data.code === 0) {
                $('#message-count').text('');
                $('.msg-item').remove();
            }
        });
    }
    function reloadIframe() {
        var current_iframe = $("iframe:visible");
        current_iframe[0].contentWindow.location.reload();
        return false;
    }

    if (window.top !== window.self) {
        window.top.location = window.location;
    }
</script>
</html>
<?php $this->endPage() ?>
