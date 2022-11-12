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
class MyJoinForm extends Model
{
    public $username;
    public $password;
    public $password2;
    public $email;
    
     
    private $_user = false;


    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // username and password are both required
            [['username', 'password', 'password2', 'email'], 'required', 'message'=> 'Поля не должны быть пусты'],
            ['username', 'string', 'min'=>3, 'max'=>10, 'message'=>"Имя должно быть от 3 до 10 символов"],
            ['email', 'email', 'message'=>'Адрес электропочты не верен'],
            ['password', 'string', 'min'=>4, 'message'=>'Пароль должен быть от 4 знаков'],
            ['password2', 'compare', 'compareAttribute'=>'password', 'message'=>'Не совпадают пароли'],
            // rememberMe must be a boolean value
           
            // password is validated by validatePassword()
            ['password', 'validatePassword'],
        ];
    }

    /**
     * Validates the password.
     * This method serves as the inline validation for password.
     *
     * @param string $attribute the attribute currently being validated
     * @param array $params the additional name-value pairs given in the rule
     */
    public function validatePassword($attribute, $params)
    {
        if (!$this->hasErrors()) {
            $user = $this->getUser();

            if (!$user || !$user->validatePassword($this->password)) {
                $this->addError($attribute, 'Incorrect username or password.');
            }
        }
    }

    /**
     * Logs in a user using the provided username and password.
     * @return bool whether the user is logged in successfully
     */
    public function login()
    {
        if ($this->validate()) {
            return Yii::$app->user->login($this->getUser(), $this->rememberMe ? 3600*24*30 : 0);
        }
        return false;
    }

    /**
     * Finds user by [[username]]
     *
     * @return User|null
     */
    public function getUser()
    {
        if ($this->_user === false) {
            $this->_user = User::findByUsername($this->username);
        }

        return $this->_user;
    }
}
