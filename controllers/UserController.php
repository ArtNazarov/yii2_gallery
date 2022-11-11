<?php

namespace app\controllers;

 use yii;
 use yii\web\Response;
use yii\web\Controller;
 
class UserController extends Controller {
    
    public $layout = 'user';
   
    
    public function actionJoin(){
        yii::trace("Сообщение для отладчика", "book");
        return $this->render('join');
    }
    
    public function actionLogin(){
        return $this->render('login');
    }
    
    
    
}