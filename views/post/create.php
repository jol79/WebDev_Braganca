<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Post */
/** @var Array $dropDown_items */

$this->title = 'Create Post';
//$this->params['breadcrumbs'][] = ['label' => 'Posts', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="post-create">

    <?=
    $this->render('_createAndUpdate', [
        'model' => $model,
        'dropDown_items' => $dropDown_items,
    ]) ?>

</div>
