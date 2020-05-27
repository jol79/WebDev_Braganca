<?php

namespace app\controllers;

use app\models\Category;
use app\models\Comment;
use Yii;
use app\models\Post;
use app\models\Search\PostSearch;
use yii\data\ActiveDataProvider;
use yii\data\Pagination;
use yii\web\Controller;
use yii\web\ForbiddenHttpException;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PostController implements the CRUD actions for Post model.
 */
class PostController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                    'deleteComment' => ['POST']
                ],
            ],
        ];
    }

    /**
     * Lists all Post models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PostSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Post model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionInspect($id)
    {
        return $this->render('inspect', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Post model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Post();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->post_id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Post model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->post_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Post model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Post model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Post the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Post::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionPosts($lang = null){
        $icons = Category::getIcons();
        if ($lang != null){
            $postDataProvider = new ActiveDataProvider([
                'query' => Post::getPostsbyCategory($lang),
                'pagination' => ['pageSize' => 5,]
            ]);
            return $this->render('posts', ['dataProvider'  => $postDataProvider, 'icons' => $icons]);
        }
        return $this->render('posts', ['dataProvider' => $lang]);
    }

    public function actionCreation(){
        $model = Post::createPost();
        if ($model->load(Yii::$app->request->post()) && $model->validate()){
            $action = Yii::$app->request->post('action');
            if ($action == 'Preview'){
                return $this->render('preview', ['model' => $model]);
            }
            else{
                if ($model->save()){
                    return $this->redirect(['site/post']);
                }
                else{
                    Yii::$app->session->addFlash("danger", 'Could not enroll student');
                }
            }
        }
        $dropDown_items = Category::getAllAsArray();
        return $this->render('creation',
            ['model' => $model, 'dropDown_items' => $dropDown_items,]);
    }

    public function actionView($id = 1){
        $commentModel = new Comment();
        if(Yii::$app->request->isPost){
            if ($commentModel->load(Yii::$app->request->post())){
                $commentModel->post_id = $id;
                $commentModel->user_id = Yii::$app->user->id;
                if ($commentModel->save())
                    return $this->redirect(['view', 'id' => $id]);
            }
        }

        $commentDataProvider = new ActiveDataProvider([
            'query' => Comment::find()->where(['post_id' => $id]),
            'sort' => [
                'defaultOrder' => [
                    'created_at' => SORT_ASC,
                ]
            ]
        ]);

        return $this->render('view', [
            'commentDataProvider' => $commentDataProvider,
            'commentModel' => $commentModel,
            'model' => $this->findModel($id),
        ]);
    }

    public function actionDeleteComment($comment_id)
    {
        $comment = Comment::findOne($comment_id);
        if (!$comment) throw new ForbiddenHttpException("No such comment");
        if ($comment->user_id == Yii::$app->user->id) {
            $comment->delete();
            return $this->redirect(['post', 'id' => $comment->post_id]);
        } else {
            throw new ForbiddenHttpException("Cannot delete comment of another user");
        }

    }
}
