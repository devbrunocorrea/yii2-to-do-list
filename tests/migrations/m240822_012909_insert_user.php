<?php

use yii\db\Migration;

/**
 * Class m240822_012909_insert_user
 */
class m240822_012909_insert_user extends Migration
{

    public function safeUp()
    {
        $this->insert('user', [
            'username' => 'admin',
            'auth_key' => 'admin-auth',
            'password' => Yii::$app->security->generatePasswordHash('admin'),
            'access_token' => 'admin@example.com',
        ]);

        $this->insert('user', [
            'username' => 'user',
            'auth_key' => 'user-auth',
            'password' => Yii::$app->security->generatePasswordHash('user123'),
            'access_token' => 'user@example.com',
        ]);
    }

    public function safeDown()
    {
        $this->delete('user', ['username' => 'admin']);
        $this->delete('user', ['username' => 'user']);
    }

}
