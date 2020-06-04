<?php

namespace app\controllers;

use app\models\Comment;
use app\models\Feedback;
use app\models\Post;
use Yii;
use yii\data\ActiveDataProvider;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\ForbiddenHttpException;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

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
                    'delete-comment' => ['post']
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
        $this->layout = ('main_noFot');

        if (Yii::$app->request->isAjax) {
            Yii::$app->request->post();
            return 'test';
        }

        /* Initializing form for comments: */
        $model = new Feedback();

        $dataProvider = new ActiveDataProvider([
            'query' => Feedback::find(),
            'pagination' => [
                'pageSize' => 10,
            ],
        ]);

//        $dataProvider = $model->search(Yii::$app->request->queryParams);


        $result = Feedback::getAllComments();
//        $time_funcTest = Feedback::diff_time();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('contactFormSubmitted');

//            return $this->refresh();

            return $this->render('home', [
                'model' => $model,
                'result' => $result,
                'dataProvider' => $dataProvider,
            ]);
        }


        return $this->render('home', [
            'model' => $model,
            'dataProvider' => $dataProvider,
            'result' => $result,
        ]);
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

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout(){
        return $this->render('about');
    }

    public function actionPosts(){
        return $this->render('posts');
    }

    public function actionNews(){
        $this->layout = ('main_noFot');

        return $this->render('news');
    }

    /* Creating function to get data from db: */
//    public function search($params){
//        $query =
//    }

    public function actionHome(){
        $this->layout = 'main_noFot.php';

        // make query to get data for comments:
//        $comments_data = ...

        //

        return $this->render('home');
    }

}
