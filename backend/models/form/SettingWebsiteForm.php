<?php
/**
 * Author: lf
 * Blog: https://blog.feehi.com
 * Email: job@feehi.com
 * Created at: 2016-03-23 12:54
 */

namespace backend\models\form;

use common\helpers\Util;
use common\models\Options;
use yii;
use yii\web\UploadedFile;

class SettingWebsiteForm extends \common\models\Options
{
    public $website_title;

    public $website_logo;

    public $website_email;


    public $website_icp;

    public $website_statics_script;

    public $website_status;

    public $website_timezone;

    public $website_comment;

    public $website_comment_need_verify;

    public $website_url;

    public $seo_keywords;

    public $seo_description;


    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'website_title' => '平台名称',
            'website_logo' => '平台图标',
            'website_email' => yii::t('app', 'Website Email'),
            'website_icp' => yii::t('app', 'Icp Sn'),
            'website_statics_script' => yii::t('app', 'Statics Script'),
            'website_status' => yii::t('app', 'Website Status'),
            'website_timezone' => yii::t('app', 'Website Timezone'),
            'website_comment' => yii::t('app', 'Open Comment'),
            'website_comment_need_verify' => yii::t('app', 'Open Comment Verify'),
            'website_url' => yii::t('app', 'Website Url'),
            'seo_keywords' => yii::t('app', 'Seo Keywords'),
            'seo_description' => yii::t('app', 'Seo Description'),
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [
                [
                    'website_title',
                    'website_logo',
                    'website_email',
                    'website_icp',
                    'website_statics_script',
                    'website_timezone',
                    'website_url',
                    'seo_keywords',
                    'seo_description'
                ],
                'string'
            ],
            [['website_logo'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg, jpeg, gif, webp'],
            [['website_status', 'website_comment', 'website_comment_need_verify'], 'integer'],
        ];
    }

    /**
     * 填充网站配置
     *
     */
    public function getWebsiteSetting()
    {
        $names = $this->getNames();
        foreach ($names as $name) {
            $model = self::findOne(['name' => $name]);
            if ($model != null) {
                $this->$name = $model->value;
            } else {
                $this->name = '';
            }
        }
    }


    /**
     * 写入网站配置到数据库
     *
     * @return bool
     */
    public function setWebsiteConfig()
    {
        $names = $this->getNames();
        foreach ($names as $name) {
            $model = self::findOne(['name' => $name]);
            if ($model != null) {
                $value = $this->$name;
                $value === null && $value = '';
                $model->value = $value;
                $result = $model->save();
            } else {
                $model = new Options();
                $model->name = $name;
                $model->value = '';
                $result = $model->save();
            }
            if ($result == false) {
                return $result;
            }
        }
        return true;
    }
}