<?php

use yii\db\Migration;
use yii\db\Schema;

class m171023_072142_blud_ing_hasMany extends Migration
{
    public function safeUp()
    {

    }

    public function safeDown()
    {
        echo "m171023_072142_blud_ing_hasMany cannot be reverted.\n";

        return false;
    }


    // Use up()/down() to run migration code without a transaction.
    public function up()
    {
        $this->createTable('blud_ing', [
            'id'     => 'pk',
            'id_blud'  => Schema::TYPE_INTEGER . ' NOT NULL',
            'id_ing'  => Schema::TYPE_INTEGER . ' NOT NULL',
        ]);
    }

    public function down()
    {
        echo "m171023_072142_blud_ing_hasMany cannot be reverted.\n";

        return false;
    }

}
