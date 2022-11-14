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
class MyForgetForm extends Model
{
    
    public   $confirmdelete;
     
 

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
             ['confirmdelete', 'required']             
        ];
    }
 
    
}