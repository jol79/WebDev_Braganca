<?php
use yii\bootstrap4\Html;
?>

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