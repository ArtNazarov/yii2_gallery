<?php
namespace Step\Acceptance;

class TestUserJoin extends \AcceptanceTester
{

    public function imagineUser()
    {
        
        $faker = \Faker\Factory::create();
        
        $I = $this;
        $user = [
            
            'name' => $faker->name,
            'email' => $faker->email,
            'password' => $faker->password
            ];
            
        // print_r($user);    
        
        return $user;
    }

    public function joinUser($user)
    {
        $I = $this;
        $I->amOnPage('user/join');
        $I->see('Форма для регистрации');
        $I->fillField("UserJoinForm[name]", $user['name']);
        $I->fillField("UserJoinForm[email]", $user['email']);
        $I->fillField("UserJoinForm[password]", $user['password']);
        $I->fillField("UserJoinForm[password2]", $user['password']);
        $I->click('Зарегистрироваться');
    }

    public function loginUser($user)
    {
        $I = $this;
        $I->amOnPage('user/login');
        $I->see('Форма для входа');
        $I->fillField("UserJoinForm[email]", $user['email']);
        $I->fillField("UserJoinForm[password]", $user['password']);
        $I->click('Войти');
    }

    public function logoutUser()
    {
        $I = $this;
    }

    public function isUserLogged($user)
    {
        $I = $this;
    }

    public function noUserLogged($user)
    {
        $I = $this;
    }

}