<?php

namespace app\models;

use yii\db\ActiveRecord;
use app\models\MyJoinForm;
 
class UserRecord extends ActiveRecord{

    
    
    // таблица, в которой хранятся данные сущности
    public static function tableName(): string {
        //return parent::tableName();
        return "user";
    }
    
    // назначает поля для тестирования
    public function setTestUser(){
        // Подставные данные, липа
        $faker = \Faker\Factory::create(); 
        
        $this->username = $faker->name;
        $this->email = $faker->email;
        $this->status = $faker->randomDigit();
        $this->passhash = sha1($faker->password);
        
    }
    
    public static function isExistsEmail($email){
        return (static::find()->where(['email'=>$email])->count()>0);
    }
    
    public function getFromForm(MyJoinForm $mv){
        
       $this->username = $mv->username;
       $this->email = $mv->email;
       $this->passhash = sha1($mv->password);
       
        
    }
    
    public static function isExistsUsername($username){
        return (static::find()->where(['username'=>$username])->count()>0);
 
    }
    
     
     public static function findUserByEmail($email){
         return static::findOne()->where(['email'=>$email]);
    }
    
    
    public function changeEmail(string $email){
       
        $this->email = $email; // заменяем e-mail
        $this->save();
        
    }
    
    public function changePassword(string $password){
        $this->passhash = sha1($password); // назначаем хеш по паролю
        $this->save();
    }
    
    public function forgetUser(){
        $this->delete(); // удаляем текущего
    }
    
    
    function add_user($username, $password, $email){

            $this->username = $username;
            $this->passhash = sha1($password);
            $this->email = $email;
            $this->save();

}

function remove_by_email($email){
$this->load(  static::findOne(['email'=>$email]) );
$this->delete(); 
}

function remove_by_username($username){
$this->load (  static::findOne(['username'=>$username]) );
$this->delete();
}

function update_pass_by_username($username, $new_password){
$this->load(   static::findOne(['username'=>$username]) );
$this->passhash = sha1($new_password); 
$this->save(); 
}


function update_pass_by_email($emaul, $new_password){
$this->load( static::findOne(['email'=>$email] ));
$this->passhash = sha1($new_password); 
$this->save(); 
}

    
  
    
    
    
    
    

     

}
