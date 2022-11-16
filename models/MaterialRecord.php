<?php

namespace app\models;

use yii\db\ActiveRecord;
use app\models\MyJoinForm;
use yii\data\Pagination;

define('MATERIAL_PAGE_SIZE', 3);
 
class MaterialRecord extends ActiveRecord{

    
    
    // таблица, в которой хранятся данные сущности
    public static function tableName(): string {
        //return parent::tableName();
        return "material";
    }
    
    
    
    public function getFromForm(MyMaterialForm $mv, $user_id){
        
       $this->title = $mv->title;
       $this->message = $mv->message;
       $this->img_src = $mv->img_src;
       $this->user_id = $user_id;
       
        
    }
    
    
    
    function add_material($title, $message, $img_src, $user_id){

            $this->title = $title;
            $this->message = $message;
            $this->img_src = $img_src;
            $this->user_id = $user_id;
            $this->save();

}

function remove_by_user_id($user_id){
$this->load(  static::find(['user_id'=>$user_id]) );
$this->deleteAll(); 
}

function remove_by_username($username){
$user = new UserRecord();
$user->load( UserRecord::findOne(['username'=>$username]) );
$user_id = $user->id;
$this->load (  static::findOne(['user_id'=>$user_id]) );
$this->delete();
}

function update_by_material_id($title, $message, $img_src, $material_id){
    
$this->load(   static::findOne(['id'=>$material_id]) );
$this->title = $title;
$this->message = $message;
$this->img_src = $img_src;
$this->save(); 
}


function get_by_material_id($material_id){
    
$this->load(   static::findOne(['id'=>$material_id]) );

}

function get_by_user_id($user_id){
    
return  static::findOne(['user_id'=>$user_id]) ;

}


function get_by_username($username){
    
$userRecord = new UserRecord();
$userRecord->load( UserRecord::findOne(['username'=>$username]) );
$user_id = $userRecord->id;    
return  static::findAll(['user_id'=>$user_id]);

}

public static function fetchAll(){
    $query = MaterialRecord::find();
    $countQuery = clone $query;
    $pages = new Pagination(['totalCount' => $countQuery->count(), 'pageSize'=>MATERIAL_PAGE_SIZE]);
    $models = $query->offset($pages->offset)
        ->limit($pages->limit)
        ->all();
    
    

    
        
        
        $materials = [];
        
        foreach ($models as $material){
            $materials[] =  [
                'picture_id' => $material->id,
                'title' => $material->title,
                'message' => $material->message,
                'img_src' => $material->img_src
                            ];
        }
        return [
            
            'arts' => $materials,
            'pages'=> $pages
            
        ];
}
 
 public static function getAllByUsername($username){
 
       $user = new UserRecord(); // новая модель данных
        // загрузим данные модели
        $user = UserRecord::findOne(['username'=>$username]);
        
        
       
        $user_id = $user->id;
      
    // получим все материалы этого пользователя
             
    $query = MaterialRecord::find()->where(['user_id'=>$user_id]);
    $countQuery = clone $query;
    $pages = new Pagination(['totalCount' => $countQuery->count(), 'pageSize'=>MATERIAL_PAGE_SIZE]);
    $models = $query->offset($pages->offset)
        ->limit($pages->limit)
        ->all();
    
     
    
           
        
         
        $materials = [];
        
        foreach ($models as $material){
            $materials[] =  [
                'picture_id' => $material->id,
                'title' => $material->title,
                'message' => $material->message,
                'img_src' => $material->img_src
                            ];
        } 
        
        return [
                    'arts' => $materials,
                    'pages' => $pages
        ];
  
 } 
 
  
 
 
 public static function getPictureById($picture_id){
         $data = MaterialRecord::findOne($picture_id);
         $userinfo = UserRecord::findOne($data->user_id);
         $result = [
           'picture_id' => $data['id'],
           'title' => $data['title'],
           'message' => $data['message'],
           'img_src' => $data['img_src'],
           'username' => $userinfo['username'],
           'user_id' => $userinfo['id']
         ];
         return $result;
         
         

 }
 
 
 
 public static function deletePictureById($user_id, $picture_id){
     $data = MaterialRecord::findOne($picture_id);
     if ($data->user_id == $user_id) { $data->delete(); };
 }
    
 public static function searchByText($searchtext){
      
             
    $query = MaterialRecord::find()->where(['like', 'title', $searchtext])->orWhere(['like', 'message', $searchtext]);
    $countQuery = clone $query;
    $pages = new Pagination(['totalCount' => $countQuery->count(), 'pageSize'=>MATERIAL_PAGE_SIZE]);
    $models = $query->offset($pages->offset)
        ->limit($pages->limit)
        ->all();
    
     
    
           
        
         
        $materials = [];
        
        foreach ($models as $material){
            $materials[] =  [
                'picture_id' => $material->id,
                'title' => $material->title,
                'message' => $material->message,
                'img_src' => $material->img_src
                            ];
        } 
        
        return [
                    'arts' => $materials,
                    'pages' => $pages
        ];

 }   
    
    

     

}
