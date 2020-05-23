<?php

namespace app\controllers;

use app\models\Comment;
use Yii;
use yii\data\ActiveDataProvider;
use yii\filters\AccessControl;
use yii\web\Controller;
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
        $this->layout = 'main_noFot.php';


        /* As default in view we have index, as custom view we will use home page */
        return $this->render('home');

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

    public function actionPost($post_id = 1){
//        $commentSearchModel = new CommentSearch();
//        $commentDataProvider = $commentSearchModel->search(Yii::$app->request->queryParams);
        $model = new Comment();
        if(Yii::$app->request->isPost){
            var_dump(Yii::$app->request->post());
            if (!$model->load(Yii::$app->request->post()))
                return false;
            $model->post_id = $post_id;
            $model->user_id = Yii::$app->user->id;
            if ($model->save())
                return $this->redirect(['post', 'id' => $post_id]);
        }

        $commentDataProvider = new ActiveDataProvider([
            'query' => Comment::find()->where(['post_id' => $post_id]),
            'sort' => [
                'defaultOrder' => [
                    'created_at' => SORT_DESC,
                ]
            ]
        ]);

        return $this->render('post', [
            'commentDataProvider' => $commentDataProvider,
            'model' => $model
        ]);
    }

}
