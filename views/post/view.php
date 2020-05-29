<?php

/* @var $commentDataProvider ActiveDataProvider*/
/* @var $commentModel app\models\Comment */
/* @var $model app\models\Post */

use app\assets\PostAsset;
use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\Html;
use yii\data\ActiveDataProvider;
use yii\helpers\Url;
use yii\widgets\ListView;

PostAsset::register($this);

//$green_box_img  = Html::img('@web/img/green_box.png', ['class' => 'float-left like_image']);
//$red_box_img  = Html::img('@web/img/red_box.png', ['class' => 'float-left like_image']);
//$user_avatar = Html::img('@web/avatars/user1.jpg', ['class' => 'comment_avatar mx-auto d-block']);
//$profile_link = Url::toRoute(["profile/view", "id" => 1]);
?>


<div class="container mt-4">

    <div class="row">
        <div class="profile-picture mx-auto">
            <?= Html::img("@web/avatars/user{$model->user_id}.png")?>
        </div>
    </div>

    <div class="row">
        <div class="col-12 user_info">
            <p class="text-center">
                <?= Html::a($model->user->username, ['profile/view', 'user_id' => $model->user_id]);?>
            </p>

            <hr class="divider">

            <h1 class="text-center"><?= $model->topic ?></h1>
        </div>
    </div>

    <br>

    <div class="row post_content text-justify">
        <div class="col-10 offset-1 post_content text-justify">
            <p class="font-italic text-muted text-center">
                <?= $model->description ?>
            </p>

            <p>
                <?= $model->body ?>
            </p>

        </div>
    </div>

    <div class="row">
        <div class="col-10 offset-1">
            <h2 class="text-center">Comments</h2>
        </div>
    </div>
    <div class="row">
        <div class="col-10 offset-1">
            <?= ListView::widget([
                'dataProvider' => $commentDataProvider,
                'itemView' => '_comments',
                'layout' => '{items}'
            ]);?>
        </div>

    </div>

    <div class="row">
        <div class="col-12">
            <?php
            $form = ActiveForm::begin();
            ?>

            <?= $form->field($commentModel, 'text')->textarea() ?>

            <div class="form-group">
                <?= Html::submitButton('Save', ['class' =>'btn btn-primary']) ?>
            </div>
            <?php ActiveForm::end() ?>
        </div>
    </div>
</div>



