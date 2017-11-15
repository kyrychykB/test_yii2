<?php

use yii\db\Migration;

/**
 * Handles the creation of table `menu`.
 */
class m171115_112146_create_menu_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('menu', [
            'id' => $this->primaryKey(),
            'parent_id' => $this->integer()->notNull()->defaultValue(0),
            'title' => $this->string()->notNull(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('menu');
    }
}
