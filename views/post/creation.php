<?php

use dosamigos\tinymce\TinyMce;
use yii\bootstrap4\ActiveForm;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\web\JsExpression;

/** @var Array $dropDown_items */
?>
<?php $form = ActiveForm::begin();?>



    <?= $form->field($model, 'topic')->textInput(['maxlength' => 50]) ?>
    <?= $form->field($model, 'description')
        ->textarea(['rows' => '6', 'maxlength' => 300, 'placeholder' => 'Your description can attract attention']) ?>

    <?= $form->field($model, 'body')->widget(TinyMce::className(), [
        'options' => ['rows' => 6],
        'language' => 'en',
        'clientOptions' => [
            'plugins' => [
                "advlist autolink lists link charmap print preview anchor",
                "searchreplace visualblocks code fullscreen",
                "insertdatetime media table contextmenu paste",
                "image imagetools spellchecker visualchars textcolor",
                "autosave colorpicker hr nonbreaking template"
            ],
            'images_upload_url'=>Url::to('@web/upload.php'),
            'images_upload_base_path' => Url::to('@web'),
            'toolbar' => "undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
        ]
    ]);?>


    <?php // dropDownList takes a dictionary, values are displayed to a user and ids are values of an option attribute?>
    <?= $form->field($model, 'category_id')
        ->dropDownList(
            $dropDown_items, ['prompt' => Yii::t('app', 'Select Language')])?>

    <div class="form-group">
        <?= Html::submitButton('Publish', ['class' => 'btn btn-success']) ?>
        <?= Html::submitButton('View', ['class' => 'btn btn-success']) ?>
    </div>


<?php ActiveForm::end();?>