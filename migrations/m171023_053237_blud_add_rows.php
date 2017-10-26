<?php

use yii\db\Migration;
use yii\db\Schema;

class m171023_053237_blud_add_rows extends Migration
{
    public function safeUp()
    {

    }

    public function safeDown()
    {
        echo "m171023_053237_blud_add_rows cannot be reverted.\n";

        return false;
    }

    public function up()
    {
        $this->createTable('blud', [
            'id'     => 'pk',
            'text'  => Schema::TYPE_STRING . ' NOT NULL',
            'ing'  => Schema::TYPE_INTEGER . ' NOT NULL',
        ]);
    }

    public function down()
    {
        echo "m171023_053237_blud_add_rows cannot be reverted.\n";

        return false;
    }
}

