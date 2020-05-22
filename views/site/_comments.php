<?php

use app\models\Comment;
use yii\bootstrap4\Html;
use yii\helpers\Url;

/* @var $model Comment */

?>

<div class="row">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-1 ml-4 pr-0">
                <a href="<?=Url::toRoute(["profile/view", "id" => $model->user_id])?>"><?= Html::img('@web/avatars/user'.$model->user_id.'.jpg', ['class' => 'comment_avatar mx-auto d-block']); ?></a>
            </div>
            <div class="col pl-0">
                <p class="text-left"><a href="<?=Url::toRoute(["profile/view", "id" => $model->user_id])?>"><?= $model->user->username ?></a></p>
            </div>
            <div class="col mr-5">
                <p class="text-right comment_date_text"><?= $model->created_at ?></p>
            </div>
        </div>
        <div class="row justify-content-center pt-4 pb-2">
            <div class="col-11">
                <p class="text-justify"><?= $model->text ?></p>
            </div>
        </div>
        <div class="row align-items-center">
            <div class="col-1 offset-10 pr-0 pr-0">
                <?= Html::img('@web/img/green_box.png', ['class' => 'float-left like_image']) ?>
                <p><?= $model->upvote ?></p>
            </div>
            <div class="col-1 pl-0 ml-0">
                <?= Html::img('@web/img/red_box.png', ['class' => 'float-left like_image']) ?>
                <p><?= $model->downvote ?></p>
            </div>
        </div>
    </div>
</div>
