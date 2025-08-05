<?php

use yii\db\Migration;

class m241210_074641_create_user_table extends Migration
{
    public function up()
    {
        $this->createTable('user', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull()->comment('Имя пользователя'),
            'email' => $this->string()->notNull()->unique()->comment('E-mail'),
            'pass_hash' => $this->string()->notNull()->comment('Пароль'),
            'active' => $this->smallInteger(1)->notNull()->defaultValue(1)->comment('Статус'),
        ]);

        $this->insert('user', [
            'name' => 'admin',
            'email' => 'admin@mail.net',
            'pass_hash' => Yii::$app->getSecurity()->generatePasswordHash('admin'),
        ]);
    }

    public function down()
    {
        $this->dropTable('user');
    }
}
