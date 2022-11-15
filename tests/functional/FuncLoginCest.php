<?php

 

class FuncLoginCest 
{
    public function _before(\FunctionalTester $I)
    {
        $I->amOnRoute('/en/user/login');
    }

    public function openLoginPage(\FunctionalTester $I)
    {
        $I->see(EN_TRANSLATION[UI_LOGIN_FORM]);        
    }

    public function submitEmptyForm(\FunctionalTester $I)
    {
        $I->submitForm('#mylogin-form', []);
        $I->expectTo('see validations errors');
        $I->see(EN_TRANSLATION[UI_LOGIN_FORM]);
        $I->see(EN_TRANSLATION[UI_FIELDS_MUST_NOT_NULL]);
        
    }

    public function submitFormWithIncorrectEmail(\FunctionalTester $I)
    {
        $I->submitForm('#mylogin-form', [
            'MyLoginForm[username]' => 'tester',
            'MyLoginForm[email]' => 'tester.email',
            'MyLoginForm[password]' => 'pass',
            'MyLoginForm[password2]' => 'pass'
            
        ]);
        $I->expectTo('see that email address is wrong');
        $I->see(EN_TRANSLATION[UI_EMAIL_MUST_CORRECT]);
                
    }

    public function submitFormSuccessfully(\FunctionalTester $I)
    {
        
        
        $I->submitForm('#mylogin-form', [
            'MyLoginForm[username]' => 'tester',
            'MyLoginForm[password]' => 'password',
            'MyLoginForm[password2]' => 'password',
        ]);
        
        $I->see(EN_TRANSLATION[UI_MENU_LOGOUT_LINK]);
        $I->amOnPage('/en/user/lk');
        $I->see('tester');
        $I->click('#logout-link');
        $I->dontSee('tester');
    }
}
