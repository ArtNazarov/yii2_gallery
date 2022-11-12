<?php

namespace app\models;
use yii\db\ActiveRecord;

class UserRecord extends ActiveRecord{
    
    public static function tableName(): string {
        //return parent::tableName();
        return "user";
    }
    
    public function setTestUser(){
        // Подставные данные, липа
        $faker = \Faker\Factory::create(); 
        
        $this->name = $faker->name;
        $this->email = $faker->email;
        $this->status = $faker->randomDigit();
        $this->passhash = sha1($faker->password);
        
    }
    
}
