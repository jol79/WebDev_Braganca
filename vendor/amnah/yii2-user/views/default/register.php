<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\captcha\Captcha;

/**
 * @var yii\web\View $this
 * @var yii\widgets\ActiveForm $form
 * @var amnah\yii2\user\Module $module
 * @var amnah\yii2\user\models\User $user
 * @var amnah\yii2\user\models\User $profile
 * @var amnah\yii2\user\models\forms\RegisterForm $model
 * @var string $userDisplayName
 */

$module = $this->context->module;

$this->title = Yii::t('user', 'Register');
\app\assets\RegistrationAsset::register($this);

?>
<div class="user-default-register">

    <div class="row centered_registration" style="margin-left: -150px; box-shadow: 0px 0px 25px rgba(0, 0, 0, 0.10);">

        <!-- Information page name: -->
        <div class="text-center registration_text">
            <label class = "mt-4 Arial_font"><?= Html::encode($this->title) ?></label>
        </div>

        <!-- Divider near the "Sign In" label -->
        <div class = "h-divider" style="width: 260px; margin-left: 20px"></div>

        <!-- Alert if reg. process success: -->
        <?php if ($flash = Yii::$app->session->getFlash("Register-success")): ?>

            <div class="alert alert-success">
                <p><?= $flash ?></p>
            </div>

        <?php else: ?>

        <!-- Forms for input -->
            <?php $form = ActiveForm::begin([
                'id' => 'register-form',
                'options' => ['class' => 'form-group'],
                'fieldConfig' => [
                    'template' => "
<div class=\"col-lg-3\" style='margin-left: 25px'>
    {input}
</div>
<div class=\"col-lg-7\">
    {error}
</div>",
                    'labelOptions' => ['class' => 'col-lg-2 control-label'],
                ],
                'enableAjaxValidation' => true,
            ]); ?>


            <?php if ($module->requireEmail): ?>
                <?= $form->field($user, 'email')->textInput(['maxlength' => 64, 'class' => 'border_radius_24', 'style' => 'padding-right: 20px',  'placeholder' => 'Email']) ?>
            <?php endif; ?>

            <?php if ($module->requireUsername): ?>
                <?= $form->field($user, 'username')->textInput(['maxlength' => 64, 'class' => 'border_radius_24', 'style' => 'padding-right: 20px', 'placeholder' => 'Username']) ?>
            <?php endif; ?>

            <?= $form->field($user, 'newPassword')->passwordInput(['maxlength' => 64, 'class' => 'border_radius_24', 'style' => 'padding-right: 20px', 'placeholder' => 'Password']) ?>

            <!-- Pasting reCaptcha: -->
            <?= \himiklab\yii2\recaptcha\ReCaptcha::widget([
                'name' => 'reCaptcha',
                'siteKey' => '6Ldie-4UAAAAAMRzRn5zNKy3Ih8dfK300bFwZr27',
                'widgetOptions' => ['class' => 'col-sm-offset-3']
            ]) ?>
            


        <?php /* uncomment if you want to add profile fields here
            <?= $form->field($profile, 'full_name') ?>
            */ ?>

            <div class="form-group">
                <div class="col-lg-offset-2 col-lg-10">
                    <?= Html::submitButton(Yii::t('user', 'Register'), ['class' => 'btn btn-primary btn-reg', 'style' => 'border-radius: 24px']) ?>

                    <br/><br/>
                    <div class="row">
                        <text class="" style="margin-left: 37px; font-family: 'Raleway', serif; font-size: 16px">
                            already have an account?
                        </text>

                        <?= Html::a(Yii::t('user', 'Login'), ["/user/login"]) ?>

                    </div>
                </div>
            </div>

            <?php ActiveForm::end(); ?>

            <?php if (Yii::$app->get("authClientCollection", false)): ?>
                <div class="col-lg-offset-2 col-lg-10">
                    <?= yii\authclient\widgets\AuthChoice::widget([
                        'baseAuthUrl' => ['/user/auth/login']
                    ]) ?>
                </div>
            <?php endif; ?>

        <?php endif; ?>

    </div>
</div>