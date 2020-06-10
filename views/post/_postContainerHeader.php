<?php
use yii\bootstrap4\Html;
?>

<div class="col-sm-2 col-md-2 col-lg-2">
    <?=Html::a(Html::img("@web/avatars/{$model->profile->image_name}"),
        ['/profile/view', 'profile_id' => $model->profile_id],
        ['class' => ['post-picture']]);?>
</div>
<div class="col-6 col-sm-10 col-md-4 col-lg-4 bio">
    <span class="user-name"><?= $model->profile->full_name?></span>
    <br>
    <span class="date">
        <?= date("jS F", strtotime($model->date))?>
    </span>
</div>