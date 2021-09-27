<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%Book}}`.
 */
class m210924_135840_create_Book_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%Book}}', [
            'id' => $this->primaryKey(),
            'Title' => $this->string(),
            'Status' => $this->integer()->defaultValue(1)
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%Book}}');
    }
}
