<?php

namespace app\controllers;



use yii;
use yii\web\Response;
use yii\web\Controller;


use \app\models\UserRecord;

use \app\models\MyLoginForm;
use \app\models\MyJoinForm;
use \app\models\User;

use \app\models\MySetPasswordForm;
use \app\models\MySetEmailForm;
use \app\models\MyForgetForm;


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
      //  $userRecord->setTestUser();
        
        
        
        
        
        $mv = new MyJoinForm();
        
        //$mv->setUserRecord($userRecord);
        
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
         $this->redirect('/'); // перенаправили на главную страницу
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
            if (User::isExistsUsername($mv->username)){
            
                              
                      
        
           
                                 $identity = User::findOne(['username' => $mv->username]); 
       
                                    Yii::$app->user->login($identity);
                                 return $this->redirect('/');
                                
         
         }
        }
         
         
          
        return $this->render('login',
                ['model'=> $mv]);      
          
          
         
        
         
        
    }
    
    public function actionLogout(){
        $this->redirectToRestriced();
        
        
        
        Yii::$app->user->logout();
        // после выхода переадресация на главную
        return $this->redirect('/'); 
    }
    
    public function redirectToRestriced(){
        // гостям это запрещено
        if (Yii::$app->user->isGuest) {
            $this->redirect('/user/restricted');
        }
        
    }
    
    
    public function actionSetpassword(){
        
        $this->redirectToRestriced();
        
       if (yii::$app->request->isPost)
            return $this->actionSetpasswordPost();
        
        $mv = new MySetPasswordForm();
        
        return $this->render('/user/setpassword', ['model'=>$mv]);
    }
    
    public function actionSetpasswordPost(){
        
        $this->redirectToRestriced();
        
        
        $mv = new MySetPasswordForm();
        $mv->load(yii::$app->request->post());
        
        $user =  Yii::$app->user->identity;
        
        $user->changePassword($mv->password);
        
        return $this->redirect('/user/lk');
    }
    
    
    
    
    public function actionSetemail(){
       $this->redirectToRestriced();
        if (yii::$app->request->isPost)
            return $this->actionSetemailPost();
       $mv = new  MySetEmailForm(); 
       return $this->render('/user/setemail', ['model'=> $mv]);
    }
    
    public function actionSetemailPost(){
       $this->redirectToRestriced();
       $mv = new  MySetEmailForm(); 
       $mv->load(yii::$app->request->post());
       Yii::$app->user->identity->changeEmail($mv->email);

       return $this->redirect('/user/lk');
    
    }
    
    
    public function actionForget(){
        $this->redirectToRestriced();
         if (yii::$app->request->isPost)
            return $this->actionForgetPost();
        $mv = new MyForgetForm();
        return $this->render('forget', ['model'=>$mv]);
    }
    
    public function actionForgetPost(){
        $this->redirectToRestriced();
        $mv = new MyForgetForm();
        $mv->load(yii::$app->request->post());
        if ($mv->confirmdelete)
        {
            
                   Yii::$app->user->identity->forgetUser(); 
                   Yii::$app->user->logout();

        }
        
        return $this->redirect('/');
    }
    
    
    
    
      public function actionLk(){
        $this->redirectToRestriced();
        $lk = ['username'=>'test'];
        $lk['username'] =  Yii::$app->user->identity->username;
        return $this->render('/user/lk', ['lk'=>$lk]);
    }
    
      public function actionRestricted(){
         
        
       return $this->render('/user/restricted');
    }
    
    
    
    
}