<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * LoginForm is the model behind the login form.
 *
 * @property-read User|null $user
 *
 */
class MySetEmailForm extends Model
{
    
    public   $email;
     
 

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
             ['email', 'required'],
            ['email', 'email', 
               'message'=> UI_EMAIL_MUST_CORRECT]
            
             
        ];
    }
 
    
}
