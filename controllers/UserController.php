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
        
        if (yii::$app->request->isPost)
            return $this->actionJoinPost();
        
       
       // yii::trace("Сообщение для отладчика", "book");
        
        $userRecord = new UserRecord();
        $userRecord->setTestUser();
        
        
        
        
        
        $mv = new MyJoinForm();
        
        $mv->setUserRecord($userRecord);
        
        return $this->render('join',
                ['model'=>$mv]);
    }
    
    // если данные пришли, обработка
    public function actionJoinPost(){
        
      $mv = new MyJoinForm(); 
      $mv->load(yii::$app->request->post());
      
      if ($mv->validate()) {
         yii::trace("Сохраняем в базе валидную форму", "user");
         $userRecord = new UserRecord();
         $userRecord->getFromForm($mv);
         $userRecord->save();
         $this->redirect('/user/join'); // перенаправили на форму входа
      }
      
       return $this->render('join',
                ['model'=>$mv]);
        
    }
    
    public function actionLogin(){
        
        if (yii::$app->request->isPost)
            return $this->actionLoginPost();
        
        $mv = new MyLoginForm();
        
         
        return $this->render('login',
                ['model'=> $mv]);
        
      
        
    }
    
    public function actionLoginPost() {
        
        $mv = new MyLoginForm();
        $mv->load(yii::$app->request->post());
      
        if ($mv->validate()) {
          // кого логиним
        $identity = UserIdentity::findOne(['username' => $mv->username]); 
        // передаем модель данных
        Yii::$app->user->login($identity);
        
        
         };
         
         return $this->redirect('/');
        
    }
    
    public function actionLogout(){
        Yii::$app->user->logout();
        // после выхода переадресация на главную
        return $this->redirect('/'); 
    }
    
    
    
}