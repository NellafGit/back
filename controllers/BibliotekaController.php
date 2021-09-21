<?php

namespace app\controllers;

use app\models\Author;
use app\models\Book;
use Yii;
use yii\filters\AccessControl;

class BibliotekaController extends \yii\web\Controller
{
   public function behaviors()
   {
       return [
           'access' => [
               'class' => AccessControl::className(),
               'denyCallback' => function ($rule, $action) {
                   throw new \Exception('У вас нет доступа к этой странице');
               },
               'rules' => [
                   [
                       'actions' => ['index-book', 'index-author', 'create-author', 'create-book', 'update-book', 'update-author', 'delete-author', 'delete-book'],
                       'allow' => true,
                       'roles' => ['admin'],
                   ],
               ],
           ],
       ];
}

    public function actionCreateAuthor()
    {
        $model = new Author();
        if ($model->load(Yii::$app->request->post()) && $model->save()){
            Yii::$app->session->setFlash('success', 'Author added');
            return $this->redirect(['biblioteka/index-author']);
        }
        return $this->render('create-author', [
            'model'=> $model,
        ]);
    }

    public function actionIndexAuthor()
    {
        $authorlist = Author::find()->all();
        return $this->render('index-author', ['authorList' => $authorlist]);
    }

    public function actionIndexBook()
    {
       $booklist = Book::find()->all();
       return $this->render('index-book', ['bookList' => $booklist]);
    }

    public function actionCreateBook()
    {
        $model = new Book();
        if ($model->load(Yii::$app->request->post()) && $model->save()){
            Yii::$app->session->setFlash('success', 'Book added');
            return $this->redirect(['biblioteka/index-book']);
        }
        return $this->render('create-book',[
            'model' => $model,
        ]);
    }

    public function actionDeleteAuthor($id)
    {
        $model = Author::findOne($id);
        $model->delete();
        Yii::$app->session->setFlash('success', 'Author deleted');
        return $this->redirect(['biblioteka/index-author']);
    }

    public function actionDeleteBook($id)
    {
        $model = Book::findOne($id);
        $model->delete();
        Yii::$app->session->setFlash('success', 'Book deleted');
        return $this->redirect(['biblioteka/index-book']);
    }

    public function actionUpdateAuthor($id)
    {
        $model = Author::findOne($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()){
            Yii::$app->session->setFlash('success', 'Author updated');
            return $this->redirect(['biblioteka/index-author']);
        }
        return $this->render('update-author' , [
            'model' => $model,
        ]);
    }

    public function actionUpdateBook($id)
    {
        $model = Book::findOne($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()){
            Yii::$app->session->setFlash('success', 'Book updated');
            return $this->redirect(['biblioteka/index-book']);
        }
        return $this->render('update-book' , [
            'model' => $model,
        ]);
    }


}
