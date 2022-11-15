<?php

use yii;
use yii\helpers\Url;
use app\models\UserRecord;
use app\models\User;



class UserCest
{
    public function ensureThatLoginWorks_en(AcceptanceTester $I)
    {
        $I->wantTo('Тестирование, что можно зайти на сайт под известным юзером');
        $I->amOnPage('/en/user/login');
        $I->wait(5);
        $I->fillField("MyLoginForm[username]", 'tester');
         $I->wait(5);
        $I->fillField("MyLoginForm[password]", 'password');
        $I->wait(5);
        $I->see('Login');
        $I->wait(5);  
        $I->click('Login now');
        $I->wait(5);
        $I->amOnPage('/en/user/lk');
        $I->see('tester');
        $I->click('Logout');
        $I->wait(10);
        $I->dontSee('tester');
    }
    
     public function ensureThatJoinWorks_en(AcceptanceTester $I)
    {
        $I->wantTo('Тест, что можно зарегиться под неизвестным юзером');

        $I->amOnPage('/en/user/join');
        $I->wait(5);
        $I->fillField("MyJoinForm[username]", 'testerX');
        $I->wait(5);
        $I->fillField("MyJoinForm[email]", 'testx@test.ru');
        $I->wait(5);
        $I->fillField("MyJoinForm[password]", 'password');
        $I->wait(5);
        $I->fillField("MyJoinForm[password2]", 'password');
        $I->wait(5);
        $I->see('Join');
        $I->wait(5);  
        $I->click('Register now');
        $I->wait(5);
        $I->amOnPage('/en/user/login');
        $I->see('Login');
        $I->fillField("MyLoginForm[username]", 'testerX');
        $I->wait(5);
        $I->fillField("MyLoginForm[password]", 'password');
        $I->click('Login');
        $I->wait(5);
        $I->amOnPage('/en/user/lk');
        $I->see('Logout');
        $I->click('Logout');
        $I->wait(5);
        $I->amOnPage('/');
        $I->wait(5);   
        $I->dontSee('testerX');
        // clean base
        $user = new UserRecord();
        $user = UserRecord::findOne(['username'=>'testerX']);
        $user->delete();
       
    }
 
      
}