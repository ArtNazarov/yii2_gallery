<?php
use yii\Faker;
class FuncJoinFormCest
{
    public function _before(\FunctionalTester $I)
    {
        $I->amOnRoute('/en/user/join');
    }

    public function openJoinPage(\FunctionalTester $I)
    {
        $I->see(EN_TRANSLATION[UI_JOIN_FORM]);

    }
   

    public function joinWithEmptyCredentials(\FunctionalTester $I)
    {
        $I->submitForm('#myjoin-form', []);
        $I->expectTo('see validations errors');
        $I->see(EN_TRANSLATION[UI_FIELDS_MUST_NOT_NULL]);
    }

    public function doJoin(\FunctionalTester $I)
    {
        
        $faker = Faker\Factory::create();
        $I->submitForm('#my-join-form', [
            'MyJoinForm[username]' => $faker->username,
            'MyJoinForm[password]' => $faker->password,
            'MyJoinForm[password2]' => $faker->password,
            
        ]);
        $I->amOnPage('/en/user/login');
        $I->submitForm('#my-login-form', [
            'MyLoginForm[username]' => $faker->username,
            'MyLoginForm[password]' => $faker->password,
            
        ]);
        $I->amOnPage('/en/user/lk');
        $I->see($faker->username);
        $I->click('#logout-link');
        $I->dontSee($faker->username);
    }

  
}