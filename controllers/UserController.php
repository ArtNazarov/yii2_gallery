<?php

namespace app\controllers;



use yii;
use yii\web\Response;
use yii\web\Controller;
use app\models\UserRecord;

use \app\models\MyLoginForm;
use app\models\MyJoinForm;


class UserController extends Controller {
    
    public $layout = 'user';
   
    
    public function actionJoin(){
        $userRecord = new UserRecord();
        $userRecord->setTestUser();
        $userRecord->save();
        
        
        yii::trace("Сообщение для отладчика", "book");
        
        
        $mv = new MyJoinForm();
        return $this->render('join',
                ['model'=>$mv]);
    }
    
    public function actionLogin(){
        
        
        $mv = new MyLoginForm();
        
        return $this->render('login',
                ['model'=> $mv]);
        
        
    }
    
    
    
}