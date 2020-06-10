<?php
use app\models\Comment;
use yii\widgets\Pjax;
?>

<div class="row">
    <div class="col-lg-12">
        <span class="like">
            <?= $model->getHearts()->count(); ?>
            <i class="far fa-heart"></i>
        </span>
        <?php
        if (!($model->profile_id == Yii::$app->user->identity->profile->id)){
            Pjax::begin(['enablePushState' => false]);
            echo $this->render('_bookmark', ['model' => $model]);
            Pjax::end();
        }
        ?>
        <span class="comments">
            <?=$model->getComments()->count()?>
            <i class="far fa-comments"></i>
        </span>
    </div>
</div>