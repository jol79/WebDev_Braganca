<?php
/* @var $this yii\web\View */
/* @var $user_id Integer */
/** @var View $subview */
/** @var boolean $logged_in */
use app\assets\ProfileAsset;
use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\Html;
use yii\bootstrap4\LinkPager;
use yii\web\View;
use yii\widgets\ListView;
use yii\widgets\Pjax;

ProfileAsset::register($this);
?>

<div class="profile-wrap mx-auto mt-5">
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
                    <?php $form = ActiveForm::begin(['id' => 'subscriptions']); ?>
                    <?php
                    Pjax::begin(['formSelector' => '#subscriptions']);
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
                    Pjax::end();
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
                    echo Html::a("<span class = 'align-middle'>Edit Profile <i class=\"fas fa-user-circle\"></i></span>",
                        ['profile/view', 'func' => 'editProfile'], ['class' => 'edit-profile text-center']);
                }
                ?>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 mt-5">
            <span class="title">
                <?php
                /** @var app\models\Post $dataProvider */
                if ($logged_in && $dataProvider->totalCount){
                    echo "Posts featured by you";
                }
                else if(!$logged_in){
                    echo "Featured";
                }
                ?>
            </span>
        </div>
    </div>
</div>
<div class='row mb-5'>
<?php
Pjax::begin(['linkSelector' => '.page-link']);
if ($dataProvider != null) {
    if (!$dataProvider->totalCount) {
        $create_link = Html::a('Create your fist post <i class="fas fa-pencil-alt"></i>',
            ['post/create'], ['class' => 'first-post text-center mx-auto p-3']);
        echo "<div class=\"col-md-12 col-lg-12 pt-3\">
                    $create_link    
              </div>";
    }
    else {
        /** @var boolean $logged_in */
        echo ListView::widget([
            'dataProvider' => $dataProvider,
            'itemView' => '_postContainerProfile',
            'viewParams' => ['logged_in' => $logged_in],
            'options' => [
                'tag' => 'div',
                'class' => 'row',
            ],
            'itemOptions' => [
                'tag' => 'div',
                'class' => 'col-lg-6',
            ],
            'layout' =>
                "{items}",
        ]);
        echo LinkPager::widget([
            'pagination' => $dataProvider->pagination,
        ]);
    }
}
Pjax::end();
?>
</div>

