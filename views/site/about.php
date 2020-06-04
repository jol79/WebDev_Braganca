<?php

/* @var $this yii\web\View */

use yii\bootstrap4\Modal;
use yii\helpers\Html;
use yii\widgets\Pjax;

$this->title = 'About';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        This is the About page. You may modify the following file to customize its content:
    </p>

<?php

?>
    <code><?= __FILE__ ?></code>
</div>
