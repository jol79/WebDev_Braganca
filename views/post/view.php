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
use yii\widgets\Pjax;

PostAsset::register($this);
?>


<div class="container mt-4">

    <div class="row">
        <div class="profile-picture mx-auto">
            <?= Html::img("@web/avatars/user{$model->profile_id}.png")?>
        </div>
    </div>

    <div class="row">
        <div class="col-12 user_info">
            <p class="text-center">
                <?= Html::a($model->profile->full_name, ['profile/view', 'profile_id' => $model->profile_id]);?>
            </p>

            <?php
            Pjax::begin();
            $button_text = '<i class="far fa-heart fa-2x"></i>';
            if ($model->getPostHeart())
            {
                $button_text = '<i class="fas fa-heart fa-2x"></i>';
            }
            echo Html::a($button_text, ['post/heart', 'id' => $model->post_id], [
                'data-method' => 'post',
                'class' => 'btn',
                'data-pjax' => 3
            ]);
            Pjax::end();
            ?>



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



