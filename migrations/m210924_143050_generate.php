<?php

use Faker\Factory;
use yii\db\Migration;
use app\models\Book;
use app\models\Author;
use app\models\Svyaz;

/**
 * Class m210924_143050_generate
 */
class m210924_143050_generate extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $faker = Factory::create();


        for ($i=0; $i<100; $i++) {
            $book = new Author();
            $book->Last_name = $faker->lastName();
            $book->First_name = $faker->firstName();
            $book->save(false);
        }
        $fakerr = Factory::create();
        for ($i=0; $i<100; $i++) {
            $book = new Book();
            $book->Title = $fakerr->text(50);
            $book->save(false);
        }
        for ($i=0; $i<100; $i++){
            $svyaz = new Svyaz();
            $svyaz->Author_id = rand(1 , 100);
            $svyaz->Book_id = rand(1, 100);
            $svyaz->save(false);
        }
    }


    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m210924_143050_generate cannot be reverted.\n";
        Author::deleteAll()->save();
        Book::deleteAll()->save();
        Svyaz::deleteAll()->save();
        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210924_143050_generate cannot be reverted.\n";

        return false;
    }
    */
}
