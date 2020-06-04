<?php

use app\models\Comment;
use app\assets\ProfileAsset;
use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\Html;
use yii\bootstrap4\LinkPager;
use yii\web\View;
use yii\widgets\ListView;
use yii\widgets\Pjax;
?>

    <div class="post-wrap mx-auto mt-3 mb-3 p-2">
        <div class="row">
            <div class="col-sm-2 col-md-2 col-lg-2">
                <?=Html::a(Html::img("@web/avatars/{$model->profile->image_name}"), ['/profile/view', 'profile_id' => $model->profile_id],
                    ['class' => ['post-picture']]);?>
            </div>
            <div class="col-6 col-sm-10 col-md-4 col-lg-4 bio">
                <span class="user-name"><?= $model->profile->full_name?></span>
                <br>
                <span class="date">
                        <?= date("jS F", strtotime($model->date))?>
                </span>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-6 sm-margin">
                <span class="lang-logo mr-auto">
                        <i class="<?=$model->category->category_icon_class?>"></i>
                </span>
            </div>
        </div>
        <div class="row mt-2 mb-2">
            <div class="col-lg-12 text-center">
                <?=Html::a($model->topic, ['/post/view', 'id' => $model->post_id], ['class' => ['topic']]);?>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="desc-wrap">
                    <span class="description">
                        <?=$model->description?>
                    </span>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <span class="like">
                    34
                    <i class="far fa-heart"></i>
                </span>
                <?php $form = ActiveForm::begin(['id' => 'bookmark']); ?>
                <?php
                    if (!($model->profile_id == Yii::$app->user->identity->profile->id)){
                        echo "<span class='bookmark-wrap'>";

                        if (!$model->isBookmarked()){
                            echo Html::submitButton('<i class="far fa-bookmark"></i>',
                                ['class' => 'bookmark add ml-2', 'name' => 'action', 'value' => 'add_bookmark']);
                        }
                        else{
                            echo Html::submitButton('<i class="far fa-bookmark"></i>',
                                ['class' => 'bookmark del ml-2', 'name' => 'action', 'value' => 'del_bookmark']);
                        }

                        echo Html::hiddenInput('post_id', $model->post_id);
                        echo "</span>";
                    }
                    ?>
                <?php ActiveForm::end(); ?>
                <span class="comments">
                    <?=Comment::getCommentsbyPostId($model->post_id)?>
                    <i class="far fa-comments"></i>
                </span>
            </div>
        </div>
    </div>


