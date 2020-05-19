<?php

namespace app\controllers;

class ProfileController extends \yii\web\Controller
{
    public function actionView($id = 1)
    {

        return $this->render('view', [
            "user_id" => $id
        ]);
    }

}
