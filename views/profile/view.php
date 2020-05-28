<?php
/* @var $this yii\web\View */
/* @var $user_id Integer */
/** @var View $subview */
use app\assets\ProfileAsset;
use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\Html;
use yii\bootstrap4\LinkPager;
use yii\widgets\Pjax;

ProfileAsset::register($this);
$logged_in = $model->user_id == Yii::$app->user->id;
?>

<div class="profile-wrap mx-auto">
    <div class="row">
        <div class="col-lg-12">
            <?= $this->render('flashes') ?>
        </div>
    </div>
    <div class="row p-3">
        <div class="col-md-12 col-lg-3">
            <div class="profile-picture mx-auto">
                <?= Html::img("@web/avatars/{$model->image_name}")?>
            </div>
        </div>
        <div class="col-md-12 col-lg-9">
            <div class="bio">
                <div class="row">
                    <span class='fullname'><?=$model->full_name?></span>
                    <?php $form = ActiveForm::begin(); ?>
                    <?php
                    if (!$logged_in){
                        if($model->isSubscribed()){
                            echo Html::submitButton('Unfollow', ['class' => 'follow-button text-center',
                                'name' => 'action', 'value' => 'unfollow']);
                        }
                        else{
                            echo Html::submitButton('Follow', ['class' => 'follow-button text-center',
                                'name' => 'action', 'value' => 'follow']);
                        }
                    }
                    else{
                        echo Html::a("You", ['profile/view'], ['class' => 'follow-button text-center']);
                    }
                    ?>
                    <?= Html::hiddenInput("id", $model->id) ?>
                    <?php ActiveForm::end(); ?>
                </div>
                <div class="row">
                    <span class="status">
                        <?=$model->status?>
                    </span>
                </div>
                <div class="row about">
                    <span><?=$model->about?></span>
                </div>
                <div class="row">
                    <span class='register-date'>
                        member of CS since <?= date("F Y", strtotime($model->created_at))?>
                    </span>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="settings">
                <?php
                if($logged_in){

                    echo Html::a("Edit Posts",
                        ['profile/view', 'func' => 'editPosts'], ['class' => 'edit-posts']);
                    echo Html::a("Edit Profile",
                        ['profile/view', 'func' => 'editProfile'], ['class' => 'edit-profile']);
                    if ($subview == '__postUpdateContainer'){
                        echo Html::a("Back to feed",
                            ['profile/view', 'func' => 'back-to-feed'], ['class' => 'back-to-feed']);
                    }
                }
                ?>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 mt-5">
            <span class="title">
                <?php
                if (!$logged_in) echo "Featured";
                else{
                    $title = $subview == '__postContainer' ? 'Posts of followed users' : 'Your posts';
                    echo $title;
                }
                ?>
            </span>
        </div>
    </div>
</div>
<div class='row'>
<?php
    /** @var app\models\Post $dataProvider */
    //reusability of a subview '__postContainer' from 'views/post'

    echo $this->render('//post/_postListView',
        ['dataProvider'  => $dataProvider, 'subview' => $subview]);

?>
</div>

