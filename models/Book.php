<?php

namespace app\models;
use yii\db\ActiveRecord;
class Book extends ActiveRecord

{   public $Author_id;
    public $Book_id;
    public static function tableName()
    {
        return 'Book';
    }
    public function  getAuthors()
    {
        return $this->hasMany(Author::class, ['id'=> 'Author_id'])
            ->viaTable('Svyaz', ['Book_id' => 'id']);

    }

    public function getArraySelectedAuthors(){
        $result = [];
        foreach ($this->authors as $author){
            $result[$author->id] = ['selected' => true];
        }
        return $result;
    }
    public function rules()
    {
        return [
            [['Title'], 'required']

        ];

    }

    public function fields()
    {
        return ['authors', 'Title'];
    }
//    protected function afterSave(){
//        parent::afterSave();
//        if($this->isNewRecord){
//            $book = new Svyaz();
//            $book->Author_id = $this->Author_id;
//            $book->Book_id = $this->id;
//            $book->save();
//        } else {
//            Svyaz::model()->updateAll(array('Book_id' => $this->id,
//                'Author_id' => $this->Author_id), 'Book_id=:Book_id', array(':Book_id'=>$this->id));
//        }
//    }


}