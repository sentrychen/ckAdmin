<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/8/29
 * Time: 9:37
 */

namespace agent\tests\acceptance;

use backend\fixtures\UserFixture;
use backend\tests\AcceptanceTester;
use yii\helpers\Url;

class CategoryCest
{
    public $cookies = [];

    public function _fixtures()
    {
        return [
            'user' => [
                'class' => UserFixture::class,
                'dataFile' => codecept_data_dir() . 'login_data.php'
            ]
        ];
    }

    public function _before(AcceptanceTester $I)
    {
        $I->amOnPage(Url::toRoute('/site/login'));
        $I->see('登陆');
        $I->submitForm("button[name=login-button]", [
            'LoginForm[username]' => "admin",
            'LoginForm[password]' => 'password_0',
            'LoginForm[captcha]' => 'testme',
        ]);
        $I->seeCookie('_csrf_backend');
        $this->cookies = [
            '_' => $I->grabCookie("_csrf_backend"),
            'PHPSESSID' => $I->grabCookie("PHPSESSID")
        ];
    }

    public function checkIndex(AcceptanceTester $I)
    {
        $this->setCookie($I);
        $I->amOnPage(Url::toRoute('/category/index'));
        $I->see('分类');
        $I->see("别名");
        $I->click("a[title=编辑]");
        $I->see("编辑分类");
        $I->fillField("Category[name]", '123');
        $I->submitForm("button[type=submit]", []);
        $I->seeInField("Category[name]", "123");
    }

    private function setCookie(AcceptanceTester $I)
    {
        foreach ($this->cookies as $k => $v) {
            $I->setHeader($k, $v);
        }
    }

}