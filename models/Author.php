<?php

namespace app\models;
use yii\db\ActiveRecord;
class Author extends ActiveRecord

{
    public static function tableName()
    {
        return 'Author';
    }
    public function  getBooks()
    {
        return $this->hasMany(Book::class, ['id'=> 'Book_id'])
            ->viaTable('Svyaz', ['Author_id' => 'id']);

    }
    public function rules()
    {
        return [
            [['Last_name', 'First_name'], 'required']

        ];

    }


}