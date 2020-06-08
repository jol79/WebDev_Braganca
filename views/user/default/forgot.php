<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var yii\widgets\ActiveForm $form
 * @var amnah\yii2\user\models\forms\ForgotForm $model
 */

$this->title = Yii::t('user', 'Forgot password');
\app\assets\ForgotPasswordAsset::register($this);
?>
<div class="user-default-forgot">

    <div class="row centered_login" style="margin-left: -150.5px; box-shadow: 0px 0px 25px rgba(0, 0, 0, 0.10);">
        <div align="center">
            <div class="col-lg" style="margin-left: -10px">

                its working

                <!-- Information page name -->
                <div class="text-center login_text" style="margin-left: 20px">
                    <label class = "mt-4 Arial_font"><?= Html::encode($this->title) ?></label>
                </div>

                <!-- Divider near the "Sign In" label -->
                <div class = "h-divider" style="width: 240px"></div>

                <?php if ($flash = Yii::$app->session->getFlash('Forgot-success')): ?>

                    <div class="alert alert-success">
                        <p><?= $flash ?></p>
                    </div>

                <?php else: ?>


                    <?php $form = ActiveForm::begin(['id' => 'forgot-form']); ?>

                    <?= $form->field($model, 'email')->textInput(['maxlength' => 64, 'class' => 'border_radius_24', 'style' => 'padding-right: 20px; margin-left: 5px', 'placeholder' => 'Email']) ?>
                    <?= Html::submitButton(Yii::t('user', 'Submit'), ['class' => 'btn btn-primary', 'style' => 'border-radius: 24px']) ?>
                    <?php ActiveForm::end(); ?>

                <?php endif; ?>
            </div>
        </div>
    </div>
