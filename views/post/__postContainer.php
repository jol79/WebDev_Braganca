<?php

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
                                <?= Html::a($model->topic,
                                    ['post/view', 'id' => $model->post_id]) ?>
                            </span>
                        </div>
                        <div class="col-3 col-sm-3 col-md-3 col-lg-3">
                            <?= Html::a("<div class=\"button\"> Read</div>",
                                ['post/view', 'id' => $model->post_id], ['class' => 'read']) ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-sm-12 col-md-12 col-lg-9">
                            <span class='description'><?=$model->description?></span>
                        </div>
                        <div class="col-12 col-sm-12 col-md-12 col-lg-3 small-device">
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
