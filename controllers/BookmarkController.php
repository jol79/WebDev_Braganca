<?php

namespace app\controllers;

use amnah\yii2\user\models\Profile;
use app\models\Post;
use Yii;

class BookmarkController extends \yii\web\Controller{
    public function actionEmpty(){
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
        return $this->render(['']);
    }
}


