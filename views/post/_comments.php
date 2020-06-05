<?php

use app\models\Comment;
use yii\bootstrap4\Html;
use yii\helpers\Url;
use yii\widgets\Pjax;

/* @var $model Comment */

?>

<hr class="divider">
<div class="row">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-1 ml-4 pr-0">
                <a href="<?=Url::toRoute(["profile/view", "id" => $model->user_id])?>" class="comment-picture">
                    <?= Html::img('@web/avatars/user'.$model->user_id.'.png', ['class' => 'comment_avatar mx-auto d-block']); ?>
                </a>
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
        <div class="row align-items-end justify-content-end no-gutters">
            <div class="col-1 no-gutters">
            <?php
            if (Yii::$app->user->id == $model->user_id || Yii::$app->user->can('admin')){
                echo
                '
                <a href="'. Url::to(['comment/update', 'id' => $model->id]) .'" data-method="post"><i class="fas fa-pencil-alt"></i></a>
                <a href="'. Url::to(['post/delete-comment', 'id' => $model->id]) .'" data-method="post"><i class="fas fa-trash"></i></a>
                ';
            }
            ?>
            </div>
            <div class="col-2">
                <?php Pjax::begin() ?>
                    <?= $this->render('_commentVotes', [
                            'model' => $model
                    ])?>
                <?php Pjax::end() ?>
            </div>
        </div>
    </div>
</div>
