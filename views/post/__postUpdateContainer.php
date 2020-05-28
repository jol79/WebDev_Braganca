<?php

use yii\bootstrap4\ActiveForm;
use yii\helpers\Html;

?>
<div class="post mx-auto">
    <div class="container">
        <div class="row">
            <div class="col-1 icon">
                <i class="<?=$model->category->category_icon_class?>"></i>
            </div>
            <div class="col-12 col-sm-11 col-md-11 col-lg-11">
                <div class="row">
                    <div class="col-12 col-sm-9 col-md-9 col-lg-">
                        <span class='topic'>
                            <i class="<?=$model->category->category_icon_class?> logo-small"></i>
                            <a href=""><?=$model->topic?></a>
                        </span>
                    </div>
                    <div class="col-3 col-sm-3 col-md-3 col-lg-3">
                        <a class="read" data-toggle="collapse" href="#post<?=$model->post_id?>" role="button"
                           aria-expanded="false" aria-controls="post<?=$model->post_id?>">
                            <div class="button">
                                Edit
                            </div>
                        </a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-9">
                        <span class='description'><?=$model->description?></span>
                    </div>
                    <div class="col-12 col-sm-12 col-md-12 col-lg-3 mt-5 small-device">
                        <div class="details">
                            <span class='rank'>
                                <?=$model->rating?>
                                <i class="fas fa-star"></i>
                            </span>
                            <span class='comments'>
                                45
                                <i class="far fa-comment"></i>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="control-buttons collapse text-center" id="post<?=$model->post_id?>">
            <?php $form = ActiveForm::begin();?>
                <?= Html::a("Update", ['post/update', 'id' => $model->post_id], ['class' => 'update']) ?>
                <?= Html::a("Delete", ['post/delete', 'id' => $model->post_id], ['class' => 'delete', 'data-method'=>'post']) ?>
                <?php
                if ($model->status == 'unfrozen'){
                    echo Html::submitButton('Froze', ['class' => 'froze', 'name' => 'action', 'value' => 'froze']);
                }
                else{
                    echo Html::submitButton('Unfroze', ['class' => 'froze', 'name' => 'action', 'value' => 'unfroze']);
                }
                ?>
                <?= Html::hiddenInput("id", $model->post_id) ?>
            <?php ActiveForm::end();?>
        </div>
    </div>
</div>
