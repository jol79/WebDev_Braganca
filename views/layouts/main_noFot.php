<?php

/* @var $this \yii\web\View */
/* @var $content string */


use rmrevin\yii\fontawesome\component\Icon;
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
            'class' => 'navbar-expand-md fixed-top my_nav',
        ],
        'innerContainerOptions' => ['class'=>'container-fluid']
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'encodeLabels' => false,
        'items' => [
            ['label' => 'Home', 'url' => ['/site/index'],],
            ['label' => 'Read', 'url' => ['/post/posts']],
            ['label' => 'News', 'url' => ['/site/news']],
            ['label' => 'About', 'url' => ['site/about']],
            ['label' => 'Contact', 'url' => ['/site/contact'],
                'visible' => !Yii::$app->user->isGuest && !Yii::$app->user->can('admin')],
            ['label' => 'Create', 'url' => ['/post/create'],
                'visible' => !Yii::$app->user->isGuest,],
            ['label' => 'Profile <i class="fas fa-user"></i>', 'url' => ['/profile/view'],
                'visible' => !Yii::$app->user->isGuest,],
            ['label' => 'Manage entities <i class="fas fa-pencil-alt"></i>',
                'visible' => !Yii::$app->user->isGuest && Yii::$app->user->can('admin'),
                'items' => [
                    ['label' => 'Manage posts <i class="far fa-newspaper"></i>', 'url' => ['/post/index'],],
                    ['label' => 'Manage users <i class="fas fa-users"></i>', 'url' => ['/user/admin'],],
                    ['label' => 'Manage comments <i class="far fa-comments"></i>', 'url' => ['/comment/index'],]
                ]],

            Yii::$app->user->isGuest ?
                ['label' => 'Login <i class="fas fa-sign-in-alt"></i>', 'url' => ['/user/login']] : // or ['/user/login-email']
                ['label' => 'Logout <i class="fas fa-sign-out-alt"></i> (' . Yii::$app->user->displayName . ')',
                    'url' => ['/user/logout'],
                    'linkOptions' => ['data-method' => 'post'],],

        ],
    ]);
    NavBar::end();
    ?>
    <?php
        $container_class = Yii::$app->controller->action->id == 'index' ? 'container-fluid' : 'container';
    ?>
    <div class="container mt-4">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
    </div>
    <div class="<?= $container_class ?>">
        <?= $content ?>
    </div>
</div>



<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
