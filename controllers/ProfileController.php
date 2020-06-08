<?php

namespace app\controllers;

//use amnah\yii2\user\models\Profile;
use app\models\Follower;
use app\models\Post;
use app\models\Profile;
use app\models\Search\PostSearch;
use app\models\UploadForm;
use Yii;
use yii\data\ActiveDataProvider;
use yii\filters\AccessControl;
use yii\web\UploadedFile;

class ProfileController extends \yii\web\Controller
{
    public function behaviors(){
        return [
            'access' => [
                'class' => AccessControl::class,
                'only' => ['update', 'view'],
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@']
                    ]
                ]
            ],
        ];
    }
    //Using GET method to trigger chosen function by a user.
    //'user_id' default value points on
    //whether it is a logged in user or a foreign one
    public function actionView($profile_id = 0, $func = 'default')
    {
        $searchModel = new PostSearch();
        $logged_in = false;
        $current_profile_id = Yii::$app->user->identity->profile->id;
        if (!$profile_id || $profile_id == $current_profile_id){
            $this->_frozePost();
            $profile_id = $current_profile_id;
            if ($func == 'default'){
                $logged_in = true;
            }
            else if ($func == 'editProfile'){
                $this->redirect(['profile/update']);
            }
        }
        else{
            $this->_subscribeUnsubscribe();
        }

        $query = Post::getPostsbyProfileId($profile_id);
        $userPostsDataProvider = $searchModel->searchQuery($query);
        $userPostsDataProvider->pagination->setPageSize(5);

        return $this->render('view',
            ['dataProvider' => $userPostsDataProvider,
                'model' => Profile::getProfileByProfileId($profile_id), 'logged_in' => $logged_in]);
    }

    private function _addBookmarkDelete(){
        if (Yii::$app->request->isPost){
            $post_id = Yii::$app->request->post('post_id');
            $post = Post::getPostByPostId($post_id);
            if ($post){
                $profile_id = Yii::$app->user->identity->profile->id;
                $action = Yii::$app->request->post('action');
                if ($action == 'add_bookmark'){
                    if ($post->add_bookmark($profile_id)){
                        Yii::$app->session->addFlash("success", "Bookmarked");
                    }
                    else{
                        Yii::$app->session->addFlash("danger", "Can't add a new bookmark");
                    }
                }
                else{
                    if ($post->delete_bookmark($profile_id)){
                        Yii::$app->session->addFlash("success", "Bookmark was removed successfully");
                    }
                    else{
                        Yii::$app->session->addFlash("danger", "Can't remove bookmark");
                    }
                }
            }
            else{
                Yii::$app->session->addFlash("danger", "Post Doesn't exist");
            }
        }
    }


    public function actionUpdate(){
        $profile_id =Yii::$app->user->identity->profile->id;
        $model = Profile::getProfileByProfileId($profile_id);
        $img_model = new UploadForm();
        if (Yii::$app->request->isPost){
            if ($model->load(Yii::$app->request->post()) && $model->validate()){
                if ($model->save()){
                    Yii::$app->session->addFlash("success", 'Your data was saved');
                    $this->redirect(['profile/view']);
                }
                else{
                    Yii::$app->session->addFlash("danger", 'Something went wrong');
                }
            }
            $img_model->imageFile = UploadedFile::getInstance($img_model, 'imageFile');
            //'empty()' to check whether any image was uploaded since it is optional
            if (!empty($img_model->imageFile) && $img_model->upload($profile_id, $model)) {
                // file is uploaded successfully
                Yii::$app->session->addFlash("success", "You successfully changed Profile Image");
                $this->redirect(['profile/view']);
            }
        }
        return $this->render('update', ['model' => $model, 'img_model' => $img_model]);
    }

    private function _frozePost(){
        if (Yii::$app->request->isPost){
            $action = Yii::$app->request->post('action');
            if ($action){
                $post_id = Yii::$app->request->post('id');
                $model = Post::getPostByPostId($post_id);
                if ($action == 'froze'){
                    if ($model->frozePost()){
                        Yii::$app->session->addFlash("info", "Your post was frozen which means it is no longer visible");
                    }
                    else{
                        Yii::$app->session->addFlash("danger", "Can't froze this post");
                    }
                }
                else if($action == 'unfroze'){
                    if ($model->unfrozePost()){
                        Yii::$app->session->addFlash("warning", "Your post was successfully unfrozen and it is visible for other users.");
                    }
                    else{
                        Yii::$app->session->addFlash("Danger", "Post can't be unfrozen");
                    }
                }
            }

        }
    }

    private function _subscribeUnsubscribe(){
        if (Yii::$app->request->isPost){
            $profile_id_author = Yii::$app->request->post('id');
            $author = Profile::findOne($profile_id_author);
            if ($author){
                $profile_id_user = Yii::$app->user->identity->profile->id;
                $action = Yii::$app->request->post('action');
                if ($action == 'follow'){
                    if ($author->subscribe($profile_id_user)){
                        Yii::$app->session->addFlash("success", "Subscribed");
                    }
                    else{
                        Yii::$app->session->addFlash("danger", "Something went wrong");
                    }
                }
                else if ($action == 'unfollow'){
                    if ($author->unSubscribe($profile_id_user)){
                        Yii::$app->session->addFlash("success", "Unsubscribed");
                    }
                    else{
                        Yii::$app->session->addFlash("danger", "Something went wrong");
                    }
                }
                else{
                    Yii::$app->session->addFlash("danger", "Unreachable Error");
                }
            }
        }
    }
}
