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
         static::findOne()->where(['email'=>$email]);
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
    
  
    
    
    
    
    

     

}
