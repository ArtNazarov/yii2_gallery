<?php

namespace app\controllers;

 use yii;
 use yii\web\Response;
use yii\web\Controller;
use app\models\MaterialRecord;
use app\models\UserRecord;
use app\models\MyMaterialForm;
use yii\data\Pagination;
 
class MaterialController extends Controller {
    
    public $layout = 'material';
    
    public function actionExposition(){
        
        
         
       // $materials_collection = MaterialRecord::find()->all();
       
    $query = MaterialRecord::find();
    $countQuery = clone $query;
    $pages = new Pagination(['totalCount' => $countQuery->count(), 'pageSize'=>2]);
    $models = $query->offset($pages->offset)
        ->limit($pages->limit)
        ->all();
    
    

    
        
        
        $materials = [];
        
        foreach ($models as $material){
            $materials[] =  [
                'title' => $material->title,
                'message' => $material->message,
                'img_src' => $material->img_src
                            ];
        }
        
        
        
               return $this->render('exposition',
                        [ 
                          'arts' => $materials,
                          'pages' => $pages
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
    
    
    public function actionAdditem(){
        if (\Yii::$app->user->isGuest) { exit(0); };
        /*
        $userRecord = new UserRecord();
        $userRecord->setTestUser();
        $userRecord->save();
        */
        
        if (yii::$app->request->isPost)
            return $this->actionAdditemPost();
        
       
         
        $userRecord = new UserRecord();
        $userRecord =  UserRecord::findOne( ['id' => \Yii::$app->user->identity->id ]);
       
        
        
        
        
        $mv = new MyMaterialForm();
        
        $mv->username = $userRecord->username;
         
        return $this->render('newmaterial',
                ['model'=>$mv]);
    }
    
    // если данные пришли, обработка
    public function actionAdditemPost(){
        
      $mv = new MyMaterialForm(); 
      $mv->load(yii::$app->request->post());
      
      if ($mv->validate()) {
         
         $materialRecord = new MaterialRecord();
         $materialRecord->getFromForm($mv, \Yii::$app->user->identity->id);
         $materialRecord->save();
         $this->redirect('/'); // перенаправили на главную страницу
      }
      
       return $this->render('newmaterial',
                ['model'=>$mv]);
        
    }
    
    
    
    
}