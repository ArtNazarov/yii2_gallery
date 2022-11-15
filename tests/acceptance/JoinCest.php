<?php
class JoinCest
{
    public function ensureThatJoinWorks_en(AcceptanceTester $I)
    {
        $I->wantTo('Тест на отображение формы регистрации на английском');
                
        $I->amOnPage('/en/user/join');
        
        
        $I->fillField('#myjoinform-username', 'tester');
        $I->fillField('#myjoinform-email', 'test@test.ru');
        $I->fillField('#myjoinform-password', 'password');
        $I->fillField('#myjoinform-password2', 'password');
        
       
        $I->seeInSource('Register'); // на странице входа должно быть название формы
        
         
         
    }
    
     public function ensureThatJoinWorks_ru(AcceptanceTester $I)
    {
        $I->wantTo('Тест на отображение формы регистрации на русском');

        $I->amOnPage('/ru/user/login');
        
        $I->fillField('#myjoinform-username', 'tester');
        $I->fillField('#myjoinform-email', 'test@test.ru');
        $I->fillField('#myjoinform-password', 'password');
        $I->fillField('#myjoinform-password2', 'password');
         
        $I->see("Форма для регистрации");
        $I->see("Зарегистрироваться");
    }
    
    
   
}