<?php

namespace app\controllers;

 use yii;
 use yii\web\Response;
use yii\web\Controller;
use app\models\MaterialRecord;
use app\models\UserRecord;
 
class MaterialController extends Controller {
    
    public $layout = 'material';
    
    public function actionExposition(){
        
        
         
        $materials_collection = MaterialRecord::find()->all();
       
        $materials = [];
        
        foreach ($materials_collection as $material){
            $materials[] =  [
                'title' => $material->title,
                'message' => $material->message,
                'img_src' => $material->img_src
                            ];
        }
        
        
        
               return $this->render('exposition',
                        [ 
                          'arts' => $materials 
                         ]
                            );
                       
        
    }
    
    
     public function actionGallery(){

         // получим имя пользователя
        $username = Yii::$app->request->get('username','');
        if ($username === "") 
            
            
            return $this->render('nousername'); // если пустое досрочный выход
        
        $user = new UserRecord(); // новая модель данных
        // загрузим данные модели
        $user = UserRecord::findOne(['username'=>$username]);
        
        
       
        $user_id = $user->id;
           
        // получим все материалы этого пользователя
        $materials_collection = MaterialRecord::findAll(['user_id'=>$user_id]);
         
        $materials = [];
        
        foreach ($materials_collection as $material){
            $materials[] =  [
                'title' => $material->title,
                'message' => $material->message,
                'img_src' => $material->img_src
                            ];
        }
        
        
        
               return $this->render('gallery',
                        [ 
                          'username' => $username,  
                          'arts' => $materials 
                         ]
                            );
                       
        
    }
    
    
    
    
}