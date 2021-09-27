<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%Svyaz}}`.
 */
class m210924_135842_create_Svyaz_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%Svyaz}}', [
            'id' => $this->primaryKey(),
            'Author_id' => $this->integer(),
            'Book_id' => $this->integer(),
        ]);

        $this->addForeignKey(
          'fk-Svyaz-Author-id', 'Svyaz', 'Author_id' , 'Author' , 'id', 'CASCADE'
        );

        $this->addForeignKey(
            'fk-Svyaz-Book-id', 'Svyaz', 'book_id', 'Book', 'id', 'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%Svyaz}}');
        $this->dropForeignKey(
            'fk-Svyaz-Author-id',
            'Svyaz'
        );
        $this->dropForeignKey(
            'fk-Svyaz-Book-id',
            'Svyaz'
        );

    }
}
