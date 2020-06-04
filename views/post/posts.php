<?php
/* @var $models */ //From sitecontroller (change it)
/** @var $pagination */
/** @var app\models\Post $dataProvider */
/** @var app\models\Search\PostSearch $searchModel */
$this->title = 'Posts';
\app\assets\PostsAsset::register($this);

use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\LinkPager;
use yii\helpers\Html;
use yii\widgets\ListView;
use yii\widgets\Pjax;

?>

<div class="row search-field mt-5">
    <div class="search-field mx-auto">
        <?php $form = ActiveForm::begin(['id' => 'searchBar']);?>
        <?= $form->field($searchModel, 'searchString')->textInput(['maxlength' => 50]) ?>
        <?= Html::submitButton('<i class="fas fa-search fa-sm"></i>', ['class' => 'search-button']); ?>
        <?php ActiveForm::end();?>
    </div>

</div>
<div class="row">
    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
        <div class="row">
            <?= Html::a(
                "<i class=\"devicon-python-plain\"></i>
                      <p>Python</p>",
                ['/post/posts', 'lang' => 'python'],
                ['class' => ['lang', 'ml-auto']]) ?>
            <?= Html::a(
                "<i class=\"devicon-csharp-plain\"></i>
                      <p>C sharp</p>",
                ['/post/posts', 'lang' => 'csharp'],
                ['class' => ['lang']]) ?>
            <?= Html::a(
                "<i class=\"devicon-go-plain\"></i>
                      <p>GoLang</p>",
                ['/post/posts', 'lang' => 'golang'],
                ['class' => ['lang']]) ?>
            <?= Html::a(
                "<i class=\"devicon-javascript-plain\"></i>
                      <p>JavaScript</p>",
                ['/post/posts', 'lang' => 'javascript'],
                ['class' => ['lang', 'mr-auto']]) ?>
        </div>
        <div class="row row-2">
            <?= Html::a(
                "<i class=\"devicon-c-plain\"></i>
                <p>C</p>",
                ['/post/posts', 'lang' => 'clang'],
                ['class' => ['lang', 'ml-auto']]) ?>
            <?= Html::a(
                "<i class=\"devicon-swift-plain\"></i>
                <p>Swift</p>",
                ['/post/posts', 'lang' => 'swift'],
                ['class' => ['lang']]) ?>
            <?= Html::a(
                "<i class=\"devicon-php-plain\"></i>
                <p>php</p>",
                ['/post/posts', 'lang' => 'php'],
                ['class' => ['lang']]) ?>
            <?= Html::a(
                "<i class=\"devicon-cplusplus-plain\"></i>
                <p>C++</p>",
                ['/post/posts', 'lang' => 'cplusplus'],
                ['class' => ['lang', 'mr-auto']]) ?>
        </div>
        <div class="row row-3">
            <?= Html::a(
                "<i class=\"devicon-ruby-plain\"></i>
                <p>Ruby</p>",
                ['/post/posts', 'lang' => 'ruby'],
                ['class' => ['lang', 'ml-auto']]) ?>
            <?= Html::a(
                "<i class=\"devicon-typescript-plain\"></i>
                <p>TypeScript</p>",
                ['/post/posts', 'lang' => 'typescript'],
                ['class' => ['lang']]) ?>
            <?= Html::a(
                "<i class=\"devicon-java-plain\"></i>
                <p>Java</p>",
                ['/post/posts', 'lang' => 'java'],
                ['class' => ['lang']]) ?>
            <?= Html::a(
                "<i class=\"devicon-mysql-plain\"></i>
                <p>SQL</p>",
                ['/post/posts', 'lang' => 'sql'],
                ['class' => ['lang', 'mr-auto']]) ?>
        </div>
    </div>
</div>
<div class="row mt-3">
<?php
Pjax::begin(['linkSelector' => '.lang', 'formSelector' => '#searchBar']);
Pjax::begin(['linkSelector' => '.page-link']);
if ($dataProvider != null) {
    if (!$dataProvider->totalCount) echo "<div class=\"col-md-12 col-lg-12 text-center pt-3\">No results</div>";
    else {

        /** @var boolean $logged_in */
        echo ListView::widget([
            'dataProvider' => $dataProvider,
            'itemView' => '_postContainer',
            'options' => [
                'tag' => 'div',
                'class' => 'row',
            ],
            'itemOptions' => [
                'tag' => 'div',
                'class' => 'col-lg-6',
            ],
            'layout' =>
                "{items}",
        ]);
        echo LinkPager::widget([
            'pagination' => $dataProvider->pagination,
        ]);
    }
}
Pjax::end();
Pjax::end();
?>
</div>