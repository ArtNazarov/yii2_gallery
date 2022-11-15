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
            [['username', 'password', 'password2', 'email'], 'required', 'message'=> UI_FIELDS_MUST_NOT_NULL],
            ['username', 'string', 'min'=>3, 'max'=>10, 'message'=>UI_USERNAME_MUST_LONG],
            ['email', 'email', 'message'=>UI_EMAIL_MUST_CORRECT],
            ['password', 'string', 'min'=>4, 'message'=> UI_PASSWORD_MUST_LONG],
            ['password2', 'compare', 'compareAttribute'=>'password', 'message'=>UI_PASSWORDS_MUST_EQV],
            // rememberMe must be a boolean value
           
            // password is validated by validatePassword()
            
            ['username', 'errorIfMagic', 
                'message'=>'magic'],
            ['email', 'errorIfEmailUsed', 'message'=>UI_EMAIL_ALREADY_EXISTS]
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
    
    public function setUserRecord($userRecord) {
        $this->username = $userRecord->username;
        $this->email = $userRecord->email;
        $this->password = 'password';
        $this->password2 = 'password';
    }
    
    public function errorIfEmailUsed(){
        
        
        
        if (UserRecord::isExistsEmail($this->email))
        {
        $this->addError('email', UI_EMAIL_ALREADY_EXISTS);
        };
        
        }
        
    public function errorIfMagic(){
       
        
        if ($this->username === 'magic'){
            $this->addError('username', UI_MAGIC_ERROR);
        }
        
        }
}
