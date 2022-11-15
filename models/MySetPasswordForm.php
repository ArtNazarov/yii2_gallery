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
class MySetPasswordForm extends Model
{
    
    public $password;
    public $password2;
     
 

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
             ['password', 'required'],
             ['password2', 'required'],
             ['password2', 'compare', 'compareAttribute'=>'password', 'message'=>UI_PASSWORDS_MUST_EQV]
            
        ];
    }
 
    
}
