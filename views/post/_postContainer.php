<?php
use app\assets\FeedAsset;
use app\models\Comment;
use app\assets\ProfileAsset;
use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\Html;
use yii\bootstrap4\LinkPager;
use yii\web\View;
use yii\widgets\ListView;
use yii\widgets\Pjax;
FeedAsset::register($this);
?>
<div class="post-wrap mx-auto mt-3 mb-3 p-2">
    <div class="row">
        <?= $this->render('_postContainerHeader', ['model' => $model]) ?>

        <div class="col-sm-6 col-md-6 col-lg-6 sm-margin">
            <span class="lang-logo mr-auto">
                    <i class="<?=$model->category->category_icon_class?>"></i>
            </span>
        </div>
    </div>
        <?= $this->render('_postContainerContent', ['model' => $model]) ?>

        <?= $this->render('_postContainerFooter' , ['model' => $model]) ?>
</div>




