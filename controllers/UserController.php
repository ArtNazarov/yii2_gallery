<?php

namespace app\controllers;



use yii;
use yii\web\Response;
use yii\web\Controller;
use app\models\UserRecord;



class UserController extends Controller {
    
    public $layout = 'user';
   
    
    public function actionJoin(){
        $userRecord = new UserRecord();
        $userRecord->setTestUser();
        $userRecord->save();
        
        
        yii::trace("Сообщение для отладчика", "book");
        return $this->render('join');
    }
    
    public function actionLogin(){
        return $this->render('login');
    }
    
    
    
}