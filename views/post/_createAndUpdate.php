
<?php

use app\assets\CreateAndUpdateAsset;
use dosamigos\tinymce\TinyMce;
use yii\bootstrap4\ActiveForm;
use yii\helpers\Html;
use yii\helpers\Url;
/** @var Array $dropDown_items */
CreateAndUpdateAsset::register($this);

?>
    <div class="wrapper-create mx-auto pt-4">
        <h2><?= Html::encode($this->title) ?></h2>
        <?php $form = ActiveForm::begin(); ?>
        <?= $form->field($model, 'topic')->textInput(['maxlength' => 50]) ?>
        <?= $form->field($model, 'description')
        ->textarea(['rows' => '6', 'maxlength' => 300, 'placeholder' => 'Your description can attract attention']) ?>

        <?= $form->field($model, 'body')->widget(TinyMce::className(), [
        'options' => ['rows' => 20],
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

        <?php
        $button_name = 'Publish';
        if (Yii::$app->user->can('admin')){
            $button_name = 'Change';
            echo $form->field($model, 'status')
                ->dropDownList(['frozen' => 'Froze', 'unfrozen'=>'Unfroze'],
                    ['prompt' => Yii::t('app', 'Select Status')]);
        }
        ?>
        <?= $form->field($model, 'category_id')
            ->dropDownList(
                $dropDown_items, ['prompt' => Yii::t('app', 'Select Language')])?>

        <div class="form-group">
            <?= Html::submitButton($button_name, ['class' => 'btn btn-success',
                'name' => 'action', 'value' => 'publish']) ?>
        </div>
    <?php ActiveForm::end();?>
    </div>
