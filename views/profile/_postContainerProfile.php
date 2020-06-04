<?php

use app\models\Comment;
use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\Modal;
use yii\helpers\Html;
use yii\widgets\Pjax;

?>
<?php
if ($model->status == 'frozen'){
    $bg = 'blue';
}
else $bg = '';
?>
<div class="post-wrap mx-auto mt-3 mb-3 p-2 <?= $bg ?>">
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
        <?php
        /** @var boolean $logged_in */
        if ($logged_in){
            $cols = "2";
            echo $this->render('_postUpdateContainer', ['model' => $model]);
        }
        else $cols = "6";
        ?>
        <div class="col-sm-6 col-md-<?=$cols?> col-lg-<?=$cols?> sm-margin">
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
                <?=Html::a($model->description, ['/post/view', 'id' => $model->post_id], ['class' => ['description']]);?>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
                <span class="like">
                    34
                    <i class="far fa-heart"></i>
                </span>

            <?php
            if (!($model->profile_id == Yii::$app->user->identity->profile->id)){
                echo "<span class='bookmark-wrap'>";
                $form = ActiveForm::begin(['id' => 'bookmark']);
                Pjax::begin(['formSelector' => '#bookmark']);
                if (!$model->isBookmarked()){
                    echo Html::submitButton('<i class="far fa-bookmark"></i>',
                        ['class' => 'bookmark add ml-2', 'name' => 'action', 'value' => 'add_bookmark']);
                }
                else{
                    echo Html::submitButton('<i class="far fa-bookmark"></i>',
                        ['class' => 'bookmark  delete ml-2', 'name' => 'action', 'value' => 'del_bookmark']);
                }
                echo Html::hiddenInput('post_id', $model->post_id);
                Pjax::end();
                ActiveForm::end();
                echo "</span>";

            }
            ?>
            <span class="comments">
                <?=Comment::getCommentsbyPostId($model->post_id)?>
                <i class="far fa-comments"></i>
            </span>
        </div>
    </div>
</div>