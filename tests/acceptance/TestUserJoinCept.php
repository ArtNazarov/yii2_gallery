<?php 
use \Step\Acceptance\TestUserJoin;
$I = new TestUserJoin($scenario);
$I->wantTo('New users join and login');


$user = $I->imagineUser(); // придумали пользователя
$otherUser = $I->imagineUser(); // придумали второго

/*

$I->loginUser($user); // пытаемся залогиниться, пользователь новый 
$I->see("This e-mail does not registered");


$I->joinUser($user); // регистрируем

$I->amOnPage('user/join');
$I->joinUser($user); // проверяем повторную
$I->see("This e-mail already exists"); // получает сообщение

$I->loginUser($user);

$I->isUserLogged($user);
$I->noUserLogged($otherUser); // не другой пользователь
$I->logoutUser(); // делаем выход

$user['passhword'] = 'wrong';
$I->loginUser($user);
$I->see("Wrong password"); // не верный пароль

*/