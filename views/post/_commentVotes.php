<?php
/* @var $model \app\models\Comment */

use yii\helpers\Url; ?>

<div class="container">
    <div class="row">
        <div class="col-2 mr-3">
            <a href="<?= Url::to(['post/upvote', 'id' => $model->id]) ?>"
               data-method="post" data-pjax="1"
               class="btn <?= $model->isUpvotedBy(Yii::$app->user->id) ? 'btn-outline-primary' : 'btn-outline-secondary' ?>">
                <i class="fas fa-arrow-up"><?= $model->getUpvotes()->count() ?></i>
            </a>
        </div>
        <div class="col-2 ml-3">
            <a href="<?= Url::to(['post/downvote', 'id' => $model->id]) ?>"
               data-method="post" data-pjax="2"
               class="btn <?= $model->isDownvotedBy(Yii::$app->user->id) ? 'btn-outline-primary' : 'btn-outline-secondary' ?>">
                <i class="fas fa-arrow-down"><?= $model->getDownvotes()->count() ?></i>
            </a>
        </div>
    </div>
</div>
