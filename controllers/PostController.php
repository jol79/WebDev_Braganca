<?php

namespace app\controllers;

use app\models\Category;
use app\models\Comment;
use app\models\CommentVote;
use app\models\Search\PostSearch;
use Yii;
use app\models\Post;
use yii\data\ActiveDataProvider;
use yii\data\ArrayDataProvider;
use yii\filters\AccessControl;

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
            'access' => [
                'class' => AccessControl::class,
                'only' => ['update', 'create', 'view', 'posts', 'index', 'delete'],
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['update', 'create', 'view', 'posts', 'delete', 'feed'],
                        'roles' => ['@']
                    ],
                    [
                        'allow' => true,
                        'actions' => ['index', 'delete', 'create', 'view', 'posts', 'feed'],
                        'roles' => ['admin'],
                    ],
                ]
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                    'deleteComment' => ['POST'],
                    'upvote' => ['POST'],
                    'downvote' => ['POST']
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
        $model = Post::createPost();
        if ($model->load(Yii::$app->request->post()) && $model->validate()){
            if ($model->save()){
                return $this->redirect(['post/view', 'id' => $model->post_id]);
            }
            else{
                Yii::$app->session->addFlash("danger", 'Could not enroll student');
            }
        }

        $dropDown_items = Category::getAllAsArray();
        return $this->render('create',
            ['model' => $model, 'dropDown_items' => $dropDown_items,]);
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
        $dropDown_items = Category::getAllAsArray();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->post_id]);
        }

        return $this->render('update', [
            'model' => $model,
            'dropDown_items' => $dropDown_items
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

        return $this->redirect(['profile/view']);
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
        $postDataProvider = null;
        $searchModel = new PostSearch();

        Post::_addBookmarkDelete();

        if(Yii::$app->request->isPost){
            if($searchModel->load(Yii::$app->request->post())){
                $postDataProvider = $searchModel->search(Yii::$app->request->queryParams);
//                $postDataProvider->pagination->setPageSize(5);
                $lang = null;
            }
        }

        if ($lang != null){
            $query = Post::getPostsbyCategory($lang);
            $postDataProvider = $searchModel->searchQuery($query);
            $postDataProvider->pagination->setPageSize(5);
        }
        return $this->render('posts', ['dataProvider' => $postDataProvider, 'searchModel' => $searchModel]);
    }


    public function actionView($id = 1){
        $commentModel = new Comment();
        if(Yii::$app->request->isPost){
            if ($commentModel->load(Yii::$app->request->post())){
                $commentModel->post_id = $id;
                $commentModel->created_at = date("Y-m-d H:i:s");
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

    public function actionDeleteComment($id)
    {
        $comment = $this->findComment($id);
        if ($comment->user_id == Yii::$app->user->id || Yii::$app->user->can('admin')) {
            $comment->delete();
            return $this->redirect(['view', 'id' => $comment->post_id]);
        } else {
            throw new ForbiddenHttpException("Cannot delete comment of another user");
        }

    }

    public function actionUpvote($id){
        $comment = $this->findComment($id);
        $userId = Yii::$app->user->id;

        $commentVote = CommentVote::find()
            ->andWhere([
                'comment_id' => $id,
                'user_id' => $userId
            ])->one();

        if (!$commentVote){
            CommentVote::saveCommentVote($userId, $id, CommentVote::TYPE_UPVOTE);
        } else if ($commentVote->type == CommentVote::TYPE_UPVOTE){
            $commentVote->delete();
        } else if ($commentVote->type == CommentVote::TYPE_DOWNVOTE){
            $commentVote->delete();
            CommentVote::saveCommentVote($userId, $id, CommentVote::TYPE_UPVOTE);
        }
        return $this->renderAjax('_commentVotes', [
            'model' => $comment
        ]);
    }

    public function actionDownvote($id){
        $comment = $this->findComment($id);
        $userId = Yii::$app->user->id;

        $commentVote = CommentVote::find()
            ->andWhere([
                'comment_id' => $id,
                'user_id' => $userId
            ])->one();

        if (!$commentVote){
            CommentVote::saveCommentVote($userId, $id, CommentVote::TYPE_DOWNVOTE);
        } else if ($commentVote->type == CommentVote::TYPE_UPVOTE){
            $commentVote->delete();
            CommentVote::saveCommentVote($userId, $id, CommentVote::TYPE_DOWNVOTE);
        } else if ($commentVote->type == CommentVote::TYPE_DOWNVOTE){
            $commentVote->delete();
        }
        return $this->renderAjax('_commentVotes', [
            'model' => $comment
        ]);
    }

    public function actionFeed(){
        $blocks = Post::getSortedPostsOfMonth(Yii::$app->user->identity->profile->id);
        Post::_addBookmarkDelete();
        return $this->render('feed', ['blocks' => $blocks]);
    }

    public function actionBookmark(){
        Post::_addBookmarkDelete();
        $profile_id = Yii::$app->user->identity->profile->id;
        $searchModel = new PostSearch();
        $query = Post::getBookmarkedPosts($profile_id);
        $dataProvider = $searchModel->searchQuery($query);
        return $this->render('bookmark', ['dataProvider' => $dataProvider]);
    }

    protected function findComment($id){
        $comment = Comment::findOne($id);
        if (!$comment){
            throw new NotFoundHttpException("No such comment");
        }
        return $comment;
    }



}
