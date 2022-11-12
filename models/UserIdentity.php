<?php

namespace app\models;
 
use yii\web\IdentityInterface;
use app\models\UserRecord;


class UserIdentity extends UserRecord implements IdentityInterface {
    
    public $auth_key;
    
    public function getAuthKey() {
               return $this->auth_key; 
    }

    public function getId() {
        return $this->id;
    }

    public function validateAuthKey($authKey) {
        
                 return $this->getAuthKey() === $authKey;
    }

    public static function findIdentity($id) {
        return static::findOne($id);
    }

    public static function findIdentityByAccessToken($token, $type = null) {
                        return static::findOne(['access_token' => $token]);
    }

}