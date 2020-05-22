<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var yii\widgets\ActiveForm $form
 * @var amnah\yii2\user\models\forms\ResendForm $model
 */

$this->title = Yii::t('user', 'Resend');
\app\assets\ResendAsset::register($this);
?>
<div class="user-default-resend">

    <div class="row centered_resend" style="margin-left: -150.5px">
        <div align="center">
        <div class="col-lg">
            <!-- Information page name -->
            <div class="text-center login_text">
                <label class = "mt-4 Arial_font"><?= Html::encode($this->title) ?></label>
            </div>

            <?php if ($flash = Yii::$app->session->getFlash('Resend-success')): ?>

                <div class="alert alert-success">
                    <p><?= $flash ?></p>
                </div>

            <?php else: ?>

            <!-- Divider near the "Sign In" label -->
            <div class = "h-divider" style="width: 270px"></div>

            <?php $form = ActiveForm::begin(['id' => 'resend-form']); ?>
                <?= $form->field($model, 'email')->textInput(['maxlength' => 64, 'class' => 'border_radius_24', 'style' => 'padding-right: 20px; margin-left: 5px', 'placeholder' => 'Email']) ?>

                <?= Html::submitButton(Yii::t('user', 'Submit'), ['class' => 'btn btn-primary', 'style' => 'border-radius: 24px']) ?>
                <?php ActiveForm::end(); ?>

            <?php endif; ?>
        </div>
        </div>
    </div>
</div>