<?php

namespace app\models;
use yii\db\ActiveRecord;
class Author extends ActiveRecord

{
    public static function tableName()
    {
        return 'Author';
    }
    public function  getBook()
    {
        return $this->hasOne(Book::class, ['Author'=> 'id']);
    }
    public function rules()
    {
        return [
            [['Last_name', 'First_name', 'Number_of_books'], 'required']

        ];

    }
}