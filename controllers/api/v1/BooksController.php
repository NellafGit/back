<?php

namespace app\controllers\api\v1;

use app\models\Author;
use app\models\Book;
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
        unset($action['ById']);
        return $action;
    }

    public $modelClass = Book::class;



    public function actionBy($id)
    {
        $model = Book::find()->where(['id' => $id, ])->joinWith('authors')->one();
        return $model;
    }

    public function actionUpdate($id)
    {
        $model = Book::findOne($id)->where(['Status' => 1])->joinWith('authors');
        $model->load(Yii::$app->request->post()) && $model->save();
        return $model;
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
        return $model;
    }

}


