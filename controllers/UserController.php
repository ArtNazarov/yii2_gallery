<?php

namespace app\controllers;



use yii;
use yii\web\Response;
use yii\web\Controller;
use app\models\UserRecord;

use \app\models\MyLoginForm;
use app\models\MyJoinForm;
use app\models\UserIdentity;


class UserController extends Controller {
    
    public $layout = 'user';
   
    
    public function actionJoin(){
        /*
        $userRecord = new UserRecord();
        $userRecord->setTestUser();
        $userRecord->save();
        */
        
        yii::trace("Сообщение для отладчика", "book");
        
        
        $mv = new MyJoinForm();
        $mv->email = '@mail.ru';
        return $this->render('join',
                ['model'=>$mv]);
    }
    
    public function actionLogin(){
        
        
        $mv = new MyLoginForm();
        
       
        // кого логиним
        $identity = UserIdentity::findOne(['username' => 'tester']); 
        // передаем модель данных
        Yii::$app->user->login($identity);
        
        return $this->render('login',
                ['model'=> $mv]);
        
        
    }
    
    public function actionLogout(){
        Yii::$app->user->logout();
        // после выхода переадресация на главную
        return $this->redirect('/'); 
    }
    
    
    
}