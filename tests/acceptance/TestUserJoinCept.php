<?php 
use \Step\Acceptance\TestUserJoin;

/*

function tstNoUser(TestUserJoin $I){
$user = $I->imagineUser(); // придумали пользователя    
$I->amOnPage('/en/user/join');
$I->loginUser($user); // пытаемся залогиниться, пользователь новый 
$I->see(EN_TRANSLATION[UI_NO_USER_IN_BASE]);
}

function tstBeforeLogin(TestUserJoin $I){
$user = $I->imagineUser(); // придумали пользователя    
$I->amOnPage('/en/user/join');
$I->fillField('myloginform-username', $user->username);
$I->fillField('myloginform-email', $user->email);
$I->fillField('myloginform-password', $user->password);
$I->fillField('myloginform-password2', $user->password);
$I->click('#btn-myloginform-submit');
$I->wait(100);
}


function tstCheckLogin(TestUserJoin $I){
$I->amOnPage('/en/user/lk');
$I->see(EN_TRANSLATION[UI_LK]);
}

function tstUserLogout(TestUserJoin $I){
  $I->amOnPage('/en/user/lk');
  $I->click('#forget-link');
  
  $I->see(EN_TRANSLATION[UI_FORGET_FORM]);
 
  $I->checkOption([ 'confirmdelete'=>true]);
  $I->click('#btn-forget-submit');
  $I->wait(100);
  $I->amOnPage('/');
  $I->cantSee(EN_TRANSLATION[UI_MENU_EXIT]);
}

$I = new TestUserJoin($scenario);
$I->wantTo('New users join and login');

tstNoUser($I); // новый пользователя пытается зайти
tstUserJoin($I); // новый пользователь регистрируется и
tstUserBeforeLogin($I); // логинится
tstUserCheckLogin($I); // заходит в свой кабинет
tstUserLogout($I); // выходит с сайта
 
 */

