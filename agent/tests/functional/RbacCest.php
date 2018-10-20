<?php

namespace agent\tests\functional;

use backend\models\AgentUser;
use backend\tests\FunctionalTester;
use backend\fixtures\UserFixture;
use yii\helpers\Url;

/**
 * Class RbacTest
 */
class RbacCest
{

    public function _fixtures()
    {
        return [
            'user' => [
                'class' => UserFixture::class,
                'dataFile' => codecept_data_dir() . 'login_data.php'
            ]
        ];
    }

    public function _before(FunctionalTester $I)
    {
        $I->amLoggedInAs(AgentUser::findIdentity(1));
    }

    public function checkPermissions(FunctionalTester $I)
    {
        $I->amOnPage(Url::toRoute('/rbac/permissions'));
        $I->see('路由');
        $I->see("描述");
    }

    public function checkRoles(FunctionalTester $I)
    {
        $I->amOnPage(Url::toRoute('/rbac/roles'));
        $I->see('角色');
        $I->see("描述");
    }
}
