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
class MyMaterialForm extends Model
{
    public   $username;
    public   $title;
    public   $message;
    public   $img_src;
     
    


    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // username and password are both required
            [['username', 'title','message','img_src' ], 'required'],
            
        ];
    }

     
   
}
