<?php
/**
 * Author: lf
 * Blog: https://blog.feehi.com
 * Email: job@feehi.com
 * Created at: 2017-03-15 21:16
 */

namespace agent\assets;

use yii;

class IndexAsset extends \yii\web\AssetBundle
{
    public $sourcePath = '@agent/web/static/';

    public $css = [
        'css/bootstrap.min.css',
        'css/font-awesome.min93e3.css?v=4.4.0',
        'css/style.min862f.css?v=4.1.0',
        'css/agent.css',
    ];

    public $js = [
        "js/jquery.min.js?v=2.1.4",
        "js/bootstrap.min.js?v=3.3.6",
        "js/plugins/metisMenu/jquery.metisMenu.js",
        "js/plugins/slimscroll/jquery.slimscroll.min.js",
        "js/plugins/layer/layer.min.js",
        "js/hplus.min.js?v=4.1.0",
        "js/contabs.min.js",
        "js/plugins/pace/pace.min.js",
    ];

    public $depends = [
        'yii\web\YiiAsset',
    ];
}
