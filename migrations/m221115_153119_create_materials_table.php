<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%materials}}`.
 */
class m221115_153119_create_materials_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('material', [
            'id' => $this->primaryKey(),
            'title' => $this->string(),
            'message' => $this->text(),
            'img_src' => $this->string(),
            'user_id' => $this->string()            
        ]);
        
        $this->createTable('user', [
            'id' => $this->primaryKey(),
            'username' => $this->string(),
            'email' => $this->text(),
            'passhash' => $this->string()            
        ]);
        
        
        $this->insert('user', [
            'id' => 1,
            'username' => 'tester',
            'passhash' => sha1('password'),
            'email' => 'test@test.ru'  
        ]);
       

        $this->insert('material', [
            'title' => 'Image 1 of user tester',
            'message' => 'This is picture 1',
            'img_src' => 'https://upload.wikimedia.org/wikipedia/commons/3/38/Adorable-animal-cat-20787.jpg',
            'user_id' => 1
        ]);
        
        $this->insert('material', [
            'title' => 'Image 2 of user tester',
            'message' => 'This is picture 2',
            'img_src' => 'https://upload.wikimedia.org/wikipedia/commons/a/a3/June_odd-eyed-cat.jpg',
            'user_id' => 1
        ]);
        
        
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('user');
        $this->dropTable('material');
                
    }
}
