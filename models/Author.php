<?php

namespace app\models;
use yii\db\ActiveRecord;
use yii\helpers\ArrayHelper;

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

    static public function getArray(){
        $author=ArrayHelper::map(self::find()->asArray()->all(), 'id', 'Last_name');
        return $author;
    }

    public function rules()
    {
        return [
            [['Last_name', 'First_name'], 'required']

        ];

    }


}