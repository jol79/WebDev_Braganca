<?php

namespace app\controllers;

//use amnah\yii2\user\models\Profile;
use app\models\Follower;
use app\models\Post;
use app\models\Profile;
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
    public function actionView($user_id = 0, $func = 'default')
    {
        $this->_frozePost();

        if (!$user_id){
            $user_id = Yii::$app->user->id;
            if ($func == 'default'){
                return $this->_default($user_id);
            }
            else if ($func == 'editPosts'){
                return $this->_editPosts($user_id);
            }
            else if ($func == 'editProfile'){
                $this->redirect(['profile/update']);
            }
            else if ($func == 'back-to-feed'){
                $this->redirect(['profile/view']);
            }
        }
        else{
            $this->_subscribeUnsubscribe();
            return $this->_asGuest($user_id);
        }
        return true;
    }

    private function _asGuest($user_id){
        $userPostsDataProvider = new ActiveDataProvider([
            'query' => Post::getPostsbyUserId($user_id),
            'pagination' => ['pageSize' => 5]
        ]);
        return $this->render('view',
            ['dataProvider' => $userPostsDataProvider,
                'subview' => '__postContainer',
                'model' => Profile::getProfileByUserId($user_id)]);
    }

    private function _default($user_id){
        $userPostsDataProvider = new ActiveDataProvider([
            'query' => Post::getFollowedPosts($user_id),
            'pagination' => ['pageSize' => 5]
        ]);
        return $this->render('view',
            ['dataProvider' => $userPostsDataProvider,
                'subview' => '__postContainer',
                'model' => Profile::getProfileByUserId($user_id)]);
    }

    private function _editPosts($user_id){
        $userPostsDataProvider = new ActiveDataProvider([
            'query' => Post::getPostsbyUserId($user_id),
            'pagination' => ['pageSize' => 5]
        ]);

        return $this->render('view',
            ['dataProvider' => $userPostsDataProvider,
                'subview' => '__postUpdateContainer',
                'model' => Profile::getProfileByUserId($user_id)]);

    }

    public function actionUpdate(){
        $user_id = Yii::$app->user->id;
        $model = Profile::getProfileByUserId($user_id);
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
            if (!empty($img_model->imageFile) && $img_model->upload($user_id, $model)) {
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
            $profile_id = Yii::$app->request->post('id');
            $author = Profile::findOne($profile_id);
            if ($author){
                $user_id = Yii::$app->user->id;
                $action = Yii::$app->request->post('action');
                if ($action == 'follow'){
                    if ($author->subscribe($user_id)){
                        Yii::$app->session->addFlash("success", "Subscribed");
                    }
                    else{
                        Yii::$app->session->addFlash("danger", "Something went wrong");
                    }
                }
                else if ($action == 'unfollow'){
                    if ($author->unSubscribe($user_id)){
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
            else{
                Yii::$app->session->addFlash("danger", "Author doesn't exist");
            }
        }
    }

}
