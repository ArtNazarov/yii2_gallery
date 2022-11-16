<?php

namespace app\controllers;

 use yii;
 use yii\web\Response;
use yii\web\Controller;
use app\models\MaterialRecord;
use app\models\UserRecord;
use app\models\MyMaterialForm;
use  \app\models\MySearchForm;
 
class MaterialController extends Controller {
    
    public $layout = 'material';
    
    
    public function actionExposition(){
        
        
         
       // $materials_collection = MaterialRecord::find()->all();
       $data = MaterialRecord::fetchAll(); 
       return $this->render('exposition', $data);
    }
    
    
     public function actionGallery(){

         // получим имя пользователя
        $username = Yii::$app->request->get('username','');
        if ($username === "") 
            return $this->render('nousername'); // если пустое досрочный выход
        
       
        $data = MaterialRecord::getAllByUsername($username);
        
        
        return $this->render('gallery',
                        [ 
                          'username' => $username,  
                          'arts' => $data['arts'],
                          'pages'=> $data['pages']
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
    
    public function actionView(){
         // получим номер картинки
        $picture_id = Yii::$app->request->get('picture_id',0);
        if ($picture_id === 0) 
            return $this->render('nopicture'); // если не передан номер
        $picture = MaterialRecord::getPictureById($picture_id);
        
       return $this->render('view', ['picture'=>$picture]);
    }
    
    
    public function actionSearch(){
        $searchtext = Yii::$app->request->get('searchtext',"");
        if ($searchtext === "") 
            return $this->render('nosearchtext'); // если не передана поисковая фраза
        
        $data = MaterialRecord::searchByText($searchtext);
        
         
        return $this->render('searchmaterial',
                            [
                                'arts' => $data['arts'],
                                'pages'=> $data['pages']
                            ]);
    }
    
    public function actionDelete(){
        
        $picture_id = Yii::$app->request->get('picture_id',0);
        if ($picture_id === 0) 
            return $this->render('nopicture'); // если не передан номер
        
        $userRecord = new UserRecord();
        $userRecord =  UserRecord::findOne( ['id' => \Yii::$app->user->identity->id ]);
        
        MaterialRecord::deletePictureById($userRecord->id, $picture_id);
        
        $this->redirect('/material/gallery?username=' . $userRecord->username);
    }
    
    
    
    
}