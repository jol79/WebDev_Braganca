<?php

/* @var $this \yii\web\View */
/* @var $content string */


use yii\bootstrap4\Alert;
use yii\bootstrap4\Breadcrumbs;
use yii\helpers\Html;
use yii\bootstrap4\Nav;
use yii\bootstrap4\NavBar;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => Html::img('@web/img/logo.png', ['alt'=>Yii::$app->name]),
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar navbar-expand-md navbar-light',
        ],
        'innerContainerOptions' => ['class'=>'container-fluid']
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => [
//            ['label' => 'Home', 'url' => ['/site/index'], 'options' => ['class'=>'test']],
            ['label' => 'Home', 'url' =>['/site/home']],
            ['label' => 'Posts', 'url' => ['/post/posts']],
            ['label' => 'Single Post', 'url' => ['/site/post']],
            ['label' => 'News', 'url' => ['/site/news']],
            ['label' => 'About', 'url' => ['site/about']],
            ['label' => 'Contact', 'url' => ['/site/contact']],
            ['label' => 'User', 'url' => ['/user']],
            ['label' => 'Creation', 'url' => ['/post/creation']],
            Yii::$app->user->isGuest ?
                ['label' => 'Login', 'url' => ['/user/login']] : // or ['/user/login-email']
                ['label' => 'Logout (' . Yii::$app->user->displayName . ')',
                    'url' => ['/user/logout'],
                    'linkOptions' => ['data-method' => 'post']],
        ],
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
    </div>
    <div class="container-fluid">
        <?= $content ?>
        <!-- Placing the Copyright Block on the web page: -->
        <div class="imgbox">
            <?= Html::img('@web/img/Copyright%20block.jpg', ['class' => 'center-fit', 'alt' => 'block_22']) ?>
        </div>
    </div>

</div>



<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
