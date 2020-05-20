<?php


namespace amnah\yii2\user\models\forms;

use Yii;
use yii\base\Model;


class RegisterForm extends Model
{
    /* Declaring variable for recaptcha */
    public $reCaptcha;

    public function rules()
    {
        /* Creating rules for registeration process: */
        $rules = [
            /* if email, name, newpassword, recaptcha -> accepted then registration process completed ( alert - completed )*/
            [['email', 'name', 'newpassword'], 'required'],
        ];

        if (!Yii::$app->request->isAjax) {
            $rules[] = [['reCaptcha'], \himiklab\yii2\recaptcha\ReCaptchaValidator::className(), 'secret' => Yii::$app->params['6Ldie-4UAAAAAJvOvXzzHGEziSlUhJduZrnoQEyZ']];
        }

        return $rules;
    }
}