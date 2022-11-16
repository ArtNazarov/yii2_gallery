<?php
require_once $_SERVER['DOCUMENT_ROOT'] .'/lang/ui.php';
use app\assets\AppAsset;
use app\widgets\Alert;
use yii\bootstrap5\Breadcrumbs;
use yii\bootstrap5\Html;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;
use app\components\SearchWidget;

$basic_links = [
 
    ['label' => Yii::t('app',UI_MENU_MAIN_LINK), 'url' => ['/material/exposition']]
    ];


if (Yii::$app->user->isGuest) { 
$custom_links = [
              [
                  'label' => Yii::t('app', UI_MENU_LOGIN_LINK), 
                  'url' => ['/user/login']
              ],
             [
                 'label' =>  Yii::t('app',UI_MENU_JOIN_LINK), 
                 'url' => ['/user/join']
             ]
    ];
                
 }  else
 {
$custom_links =    [
                    [
                        'label' => Yii::t('app',UI_MENU_LOGOUT_LINK),
                        'url' => ['/user/logout'],
                      
                       
                   ],
    
                    [
                        'label' => Yii::t('app', UI_MENU_LK_LINK) . '(' . Yii::$app->user->identity->username . ')',
                        'url' => ['/user/lk'],
                       
                   ],

                 
    
    
                   ];
 }
 
 
  
  
 
 $full_menu = [];
 for ($i=0;$i<count($basic_links);$i++){
     
    
      array_push($full_menu, $basic_links[$i]);
 };
 
 
  for ($i=0;$i<count($custom_links);$i++){
            array_push($full_menu, $custom_links[$i]);
 };
 
    NavBar::begin(['brandLabel' => Yii::t('app', UI_SITENAME)]);
echo Nav::widget([
     'items' => $full_menu, 
    'options' => ['class' => 'navbar-nav'],
]);
NavBar::end();
?>

<form name='search' method='get' action='/material/search'>
    <label for='searchtext'>Поиск по сайту</label>
    <input type='text' name='searchtext' id='searchtext' placeholder='Поиск'>
    <input type='submit' value='Поиск'>
</form>