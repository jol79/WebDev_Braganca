<?php

use app\assets\ProfileAsset;
use yii\bootstrap4\ActiveForm;
use yii\helpers\Html;

ProfileAsset::register($this);
/** @var app\models\UploadForm $img_model */
?>


<div class="profile-wrap mx-auto">
    <div class="row p-3">
        <div class="col-md-12 col-lg-3">
            <div class="profile-picture mx-auto">
                <?= Html::img("@web/avatars/{$model->image_name}")?>
            </div>
        </div>
        <div class="col-md-12 col-lg-9">
            <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]);?>
            <?= $form->field($img_model, 'imageFile')->fileInput()->label("Select New Image") ?>
            <?= $form->field($model, 'full_name')->textInput()?>
            <?= $form->field($model, 'status')->textInput()?>
            <?= $form->field($model, 'about')->textarea(['rows' => '6'])?>
            <?= Html::submitButton('Save', ['class' => 'btn btn-success',
                'name' => 'action', 'value' => 'Save']) ?>
            <?php ActiveForm::end();?>
        </div>
    </div>
</div>
