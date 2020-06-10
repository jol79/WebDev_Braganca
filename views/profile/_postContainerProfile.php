<?php

use app\models\Comment;
use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\Modal;
use yii\helpers\Html;
use yii\widgets\Pjax;

?>

<div class="post-wrap mx-auto mt-3 mb-3 p-2">
    <div class="row">
        <?= $this->render('//post/_postContainerHeader', ['model' => $model]) ?>
        <?= $this->render('_updateRender', ['model' => $model, 'logged_in' => $logged_in]) ?>
    </div>
        <?= $this->render('//post/_postContainerContent', ['model' => $model]) ?>
        <?= $this->render('//post/_postContainerFooter', ['model' => $model]) ?>
    </div>