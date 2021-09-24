<?php

namespace app\controllers;

use app\models\Author;
use app\models\Book;
use Faker\Factory;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use yii\data\ActiveDataProvider;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
//        $booklist = Book::find()->innerJoin('Author', 'Author.id = Book.Author')->all();
//        $authorlist = Author::find()->all();
//        return $this->render('index', ['bookList' => $booklist, 'authorList' => $authorlist]);
//        $booklist = Book::find()->where(['Status' => 1])->all();
        $dataProvider = new ActiveDataProvider([
            'query' => Book::find()->where(['Status' => 1]),
            'pagination' => [
                'pageSize' => 50,
            ],
        ]);



        return $this->render('index', [ 'dataProvider' => $dataProvider]);

    }


    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

   public function actionAdmin(){
       $userRole = Yii::$app->authManager->getRole('admin');
       Yii::$app->authManager->assign($userRole, Yii::$app->user->getId());
       return $this->render('index');
   }
    /*public function actionGener(){
        $faker = Factory::create();

        for ($i=0; $i<100; $i++){
            $book = new Author();
            $book->Last_name = $faker->lastName();
            $book->First_name = $faker->firstName();
            $book->Number_of_books = rand(1,15);
            $book->save(false);
        }
        return 123;
    }*/

}
