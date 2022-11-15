<?php 
use \Step\Acceptance\TestUserJoin;

function tstNoUser(TestUserJoin $I){
$user = $I->imagineUser(); // придумали пользователя    
$I->amOnPage('/user/join');
$I->loginUser($user); // пытаемся залогиниться, пользователь новый 
$I->see(UI_NO_USER_IN_BASE);
}

function tstBeforeLogin(TestUserJoin $I){
$user = $I->imagineUser(); // придумали пользователя    
$I->amOnPage('/user/join');
$I->fillField('username', $user->username);
$I->fillField('email', $user->email);
$I->fillField('password', $user->password);
$I->fillField('password2', $user->password);
$I->click('#join');
$I->wait(100);
}


function tstCheckLogin(TestUserJoin $I){
$I->amOnPage('/user/lk');
$I->see($username);
}

function tstUserLogout(TestUserJoin $I){
  $I->amOnPage('/user/lk');
  $I->click('/user/forget');
  
  $I->see(UI_FORGET_FORM);
  
  $I->checkOption([ 'confirmdelete'=>true]);
  $I->click('#deleteuser');
  $I->wait(100);
  $I->amOnPage('/');
  $I->cantSee(UI_MENU_EXIT);
}

$I = new TestUserJoin($scenario);
$I->wantTo('New users join and login');

tstNoUser($I); // новый пользователя пытается зайти
tstUserJoin($I); // новый пользователь регистрируется и
tstUserBeforeLogin($I); // логинится
tstUserCheckLogin($I); // заходит в свой кабинет
tstUserLogout($I); // выходит с сайта

