<?php
use yii;
use yii\helpers\Url;

class LoginCest
{
    public function ensureThatLoginWorks_en(AcceptanceTester $I)
    {
        $I->wantTo('Тест на отображение формы входа на английском');
        $I->amOnPage('/en/user/login');
       
        $I->seeInSource('Login'); // на странице входа должно быть название формы
        
        $I->fillField('#myloginform-username', 'tester');
        $I->fillField('#myloginform-password', 'password');

         
    }
    
     public function ensureThatLoginWorks_ru(AcceptanceTester $I)
     {
        $I->wantTo('Тест на отображение формы входа на русском');

        $I->amOnPage('/ru/user/login');
         
        $I->seeInSource('Войти'); // на странице входа должно быть название формы
        
        $I->fillField('#myloginform-username', 'tester');
        $I->fillField('#myloginform-password', 'password');
        
    }
    
    
   
}
