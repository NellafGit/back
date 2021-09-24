<?php

namespace app\controllers\api\v1;

use app\models\Author;
use app\models\Book;
use app\models\Svyaz;
use yii\rest\ActiveController;
use yii;
use yii\web\Response;



class BooksController extends ActiveController
{
    public function behaviors()
    {
        return [
            'contentNegotiator' => [
                'class' => yii\filters\ContentNegotiator::class,
                'formatParam' =>  'format',
                'formats' => [
                    'application/json' => \yii\web\Response::FORMAT_JSON
                ],
            ],
        ];
    }

    public function  actions()
    {
        $action = parent::actions();
        unset($action['index']);
        unset($action['update']);
        return $action;
    }

    public $modelClass = Book::class;



    public function actionBy($id)
    {
        $model = Book::find()->where(['Book.id' => $id, 'Status'=> 1 ])->joinWith('authors')->one();
        return $model;
    }

    public function actionUpdate($id)
    {
        $model = Book::findOne($id);
        if ($model->load(Yii::$app->request->post()) && $model->save())
        {
            $post = Yii::$app->request->post('Book');
            if(isset($post['authors'])){
            Svyaz::deleteAll(['Book_id' => $model->id]);
            foreach ($post['authors'] as $author) {
                $svyaz = new Svyaz();
                $svyaz->Book_id = $model->id;
                $svyaz->Author_id = $author;
                $svyaz->save();
            }
            }
            return 'Выполнено';
        }
    }

    public function actionList()
    {
        $model = Book::find()->where(['Status' => 1])->joinWith( 'authors'  )->all();
        return $model;
    }

    public function actionId($id)
    {
        $model = Book::findOne($id);
        $model->Status = 0;
        $model->save();
        return 'Запись удалена';
    }

}


