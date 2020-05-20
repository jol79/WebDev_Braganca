<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var yii\widgets\ActiveForm $form
 * @var amnah\yii2\user\models\forms\LoginForm $model
 */

$this->title = Yii::t('user', 'Sign in');
\app\assets\LoginAsset::register($this);

?>


<div class="user-default-login">

    <div class="row centered_login" style="margin-left: -150.5px">
        <div align="center">
        <div class="col-lg">
            <!-- Information page name -->
            <div class="text-center login_text">
                <label class = "mt-4 Arial_font"><?= Html::encode($this->title) ?></label>
            </div>

            <!-- Divider near the "Sign In" label -->
            <div class = "h-divider"></div>

            <!-- input forms -->
            <?php $form = ActiveForm::begin([
                'id' => 'login-form',
                'options' => ['class' => 'form-group'],
                'fieldConfig' => [
                    'template' => "
<div class=\"col-lg-3 input_position\" style=\"width: 250px\">
    {input}
</div>
<div class=\"col-lg-7\">{error}</div>",
                    'labelOptions' => ['class' => 'col-lg-2 control-label'],
                ],

            ]); ?>

            <?= $form->field($model, 'email')->textInput(['maxlength' => 64, 'class' => 'border_radius_24', 'style' => '', 'placeholder' => 'Email']) ?>
            <?= $form->field($model, 'password')->passwordInput(['maxlength' => 64, 'class' => 'border_radius_24', 'placeholder' => 'Password']) ?>


            <div class="form-group">
                <div class="col-lg-offset-2 col-lg-10">
                    <?= Html::submitButton(Yii::t('user', 'Login'), ['class' => 'btn btn-primary']) ?>

                    <br/><br/>
                    <?= Html::a(Yii::t("user", "Register"), ["/user/register"]) ?> /
                    <?= Html::a(Yii::t("user", "Forgot password") . "?", ["/user/forgot"]) ?> /
                    <?= Html::a(Yii::t("user", "Resend confirmation email"), ["/user/resend"]) ?>
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

            <div class="col-lg-offset-2" style="color:#999;">
                You may login with <strong>neo/neo</strong>.<br>
                To modify the username/password, log in first and then <?= HTML::a("update your account", ["/user/account"]) ?>.
            </div>
        </div>
    </div>
</div>
