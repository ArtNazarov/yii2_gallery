<?php

namespace tests\unit\models;

use app\models\User;

class UserTest extends \Codeception\Test\Unit
{
    

  
    public function testFindUserByUsername()
    {
        verify($user = User::findByUsername('tester'))->notEmpty();
         
    }

    

}
