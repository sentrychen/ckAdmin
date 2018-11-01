<?php
/**
 * Author: lf
 * Blog: https://blog.feehi.com
 * Email: job@feehi.com
 * Created at: 2016-03-31 14:17
 */

use common\widgets\JsBlock;
use yii\helpers\Url;

/**
 * @var $statics array
 */

?>
<div class="row">
    <div class="col-sm-3">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>代理总数</h5>
            </div>
            <div class="ibox-content openContab" href="<?= Url::to(['article/index']) ?>"
                 title="<?= yii::t('app', 'Articles') ?>" style="cursor: pointer">
                <h1 class="no-margins">20</h1>
                <div class="stat-percent font-bold text-success">1% <i
                            class="fa fa-bolt"></i></div>
                <small><?= yii::t('app', 'Total') ?></small>
            </div>
        </div>
    </div>
    <div class="col-sm-3">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>今日新增代理</h5>
            </div>
            <div class="ibox-content openContab" href="<?= Url::to(['comment/index']) ?>"
                 title="<?= yii::t('app', 'Comments') ?>" style="cursor: pointer">
                <h1 class="no-margins">10</h1>
                <div class="stat-percent font-bold text-info">0% <i
                            class="fa fa-level-up"></i></div>
                <small><?= yii::t('app', 'Total') ?></small>
            </div>
        </div>
    </div>
    <div class="col-sm-3">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>会员总数</h5>
            </div>
            <div class="ibox-content openContab" href="<?= Url::to(['user/index']) ?>"
                 title="<?= yii::t('app', 'Users') ?>" style="cursor: pointer">
                <h1 class="no-margins">85</h1>
                <div class="stat-percent font-bold text-navy">5% <i class="fa fa-level-up"></i>
                </div>
                <small><?= yii::t('app', 'Total') ?></small>
            </div>
        </div>
    </div>
    <div class="col-sm-3">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>今日新增会员</h5>
            </div>
            <div class="ibox-content openContab" href="<?= Url::to(['friendly-link/index']) ?>"
                 title="<?= yii::t('app', 'Friendly Links') ?>" style="cursor: pointer">
                <h1 class="no-margins">5</h1>
                <div class="stat-percent font-bold text-info">10.3% <i
                            class="fa fa-level-up"></i></div>
                <small><?= yii::t('app', 'Total') ?></small>
            </div>
        </div>
    </div>
</div>

