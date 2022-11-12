<?php

namespace app\models;
use yii\db\ActiveRecord;

class UserRecord extends ActiveRecord{
    
    public static function tableName(): string {
        //return parent::tableName();
        return "user";
    }
    
    public function setTestUser(){
        
        $this->name = "John";
        $this->email = "test@test.ru";
        $this->status = 2;
        $this->passhash = sha1("test");
        
    }
    
}
