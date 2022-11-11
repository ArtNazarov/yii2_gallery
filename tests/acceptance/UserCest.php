<?php

use yii\helpers\Url;

class UserTest
{
    public function ensureThatLoginWorks(AcceptanceTester $I)
    {
        $I->amOnPage(Url::toRoute('/user/login'));
        $I->see('Форма для входа', 'h1');
    }
    
     public function ensureThatJoinWorks(AcceptanceTester $I)
    {
        $I->amOnPage(Url::toRoute('/user/join'));
        $I->see('Форма для регистрации', 'h1');
    }
}