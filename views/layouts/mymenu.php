<?php

use app\assets\AppAsset;
use app\widgets\Alert;
use yii\bootstrap5\Breadcrumbs;
use yii\bootstrap5\Html;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;

$basic_links = [
    ['label' => 'Главная', 'url' => ['/site/index']],
    ['label' => 'Картины', 'url' => ['/book/greeter']]
    ];


if (Yii::$app->user->isGuest) { 
$custom_links = [
              [
                  'label' => 'Вход', 
                  'url' => ['/user/login']
              ],
             [
                 'label' => 'Регистрация', 
                 'url' => ['/user/join']
             ]
    ];
                
 }  else
 {
$custom_links =    [
                    [
                        'label' => 'Выход (' . Yii::$app->user->identity->username . ')',
                        'url' => ['/user/logout'],
                       
                   ]
                   ];
 }
 
 $full_menu = [];
 for ($i=0;$i<count($basic_links);$i++){
     
    
      array_push($full_menu, $basic_links[$i]);
 };
 
 
  for ($i=0;$i<count($custom_links);$i++){
            array_push($full_menu, $custom_links[$i]);
 };
 
    NavBar::begin(['brandLabel' => 'Галерея']);
echo Nav::widget([
     'items' => $full_menu, 
    'options' => ['class' => 'navbar-nav'],
]);
NavBar::end();
?>