<?php

namespace app\models;

use yii\db\ActiveRecord;
use app\models\MyJoinForm;
 
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
 
 
    
  
    
    
    
    
    

     

}
