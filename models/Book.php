<?php

namespace app\models;
use yii\db\ActiveRecord;
class Book extends ActiveRecord

{
    public static function tableName()
    {
        return 'Book';
    }
    public function  getAuthors()
    {
        return $this->hasMany(Author::class, ['id'=> 'Author_id'])
            ->viaTable('Svyaz', ['Book_id' => 'id']);

    }
    public function rules()
    {
        return [
            [['Title'], 'required']

        ];

    }


}