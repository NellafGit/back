<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%Author}}`.
 */
class m210924_135841_create_Author_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%Author}}', [
            'id' => $this->primaryKey(),
            'Last_name' => $this->string(),
            'First_name' => $this->string()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%Author}}');
    }
}
