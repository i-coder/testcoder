<?php

use yii\db\Migration;
use yii\db\Schema;

class m171023_042229_ingredient_add_tables_rows extends Migration
{
    public function safeUp()
    {

    }

    public function safeDown()
    {
        echo "m171023_042229_ingredient_add_tables_rows cannot be reverted.\n";

        return false;
    }


    public function up()
    {
        $this->createTable('ingredient', [
            'id'     => 'pk',
            'name'  => Schema::TYPE_STRING . ' NOT NULL',
            'status'  => Schema::TYPE_INTEGER . ' DEFAULT 0',
        ]);
    }

    public function down()
    {
        $this->dropTable('{{%ingredient}}');
    }

}
