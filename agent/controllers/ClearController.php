<?php
/**
 * Author: lf
 * Blog: https://blog.feehi.com
 * Email: job@feehi.com
 * Created at: 2016-04-13 12:49
 */

namespace agent\controllers;

use yii;
use yii\helpers\FileHelper;


class ClearController extends \yii\web\Controller
{

    /**
     * 清除管理后台缓存
     *
     * @return string
     */
    public function actionBackend()
    {
        FileHelper::removeDirectory(yii::getAlias('@runtime/cache'));
        $paths = [yii::getAlias('@admin/assets'), yii::getAlias('@backend/web/assets')];
        foreach ($paths as $path) {
            $fp = opendir($path);
            while (false !== ($file = readdir($fp))) {
                if (!in_array($file, ['.', '..', '.gitignore'])) {
                    FileHelper::removeDirectory($path . DIRECTORY_SEPARATOR . $file);
                }
            }
        }
        Yii::$app->getSession()->setFlash('success', yii::t('app', 'Success'));
        return $this->render('clear');
    }

    /**
     * 清除代理后台缓存
     *
     * @return string
     */
    public function actionFrontend()
    {
        FileHelper::removeDirectory(yii::getAlias('@agent/runtime/cache'));
        $paths = [yii::getAlias('@agent/web/assets')];
        foreach ($paths as $path) {
            $fp = opendir($path);
            while (false !== ($file = readdir($fp))) {
                if (!in_array($file, ['.', '..', '.gitignore'])) {
                    FileHelper::removeDirectory($path . DIRECTORY_SEPARATOR . $file);
                }
            }
        }
        Yii::$app->getSession()->setFlash('success', yii::t('app', 'Success'));
        return $this->render('clear');
    }


}