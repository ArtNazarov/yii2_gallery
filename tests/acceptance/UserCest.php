<?php

use yii\helpers\Url;

class UserCest
{
    public function ensureThatLoginWorks(AcceptanceTester $I)
    {
        $I->amOnPage(Url::toRoute('/user/login'));
        $I->see('Login', 'h1');
    }
    
     public function ensureThatJoinWorks(AcceptanceTester $I)
    {
        $I->amOnPage(Url::toRoute('/user/join'));
        $I->see('Форма для регистрации', 'h1');
    }
}