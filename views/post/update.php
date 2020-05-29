<?php

use yii\helpers\Html;

/** @var Array $dropDown_items */
/* @var $this yii\web\View */
/* @var $model app\models\Post */

$this->title = "Update:  " . '\'' . $model->topic . '\'';
//$this->params['breadcrumbs'][] = ['label' => 'Posts', 'url' => ['index']];
//$this->params['breadcrumbs'][] = ['label' => $model->post_id, 'url' => ['view', 'id' => $model->post_id]];
//$this->params['breadcrumbs'][] = 'Update';
?>
<div class="post-update">

    <?= $this->render('_createAndUpdate', [
        'model' => $model,
        'dropDown_items' => $dropDown_items,
    ]) ?>

</div>
