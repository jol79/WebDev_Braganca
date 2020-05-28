<?php
/* @var $models */ //From sitecontroller (change it)
/** @var $pagination */
/** @var TYPE_NAME $dataProvider */
$this->title = 'Posts';
\app\assets\PostsAsset::register($this);
use yii\helpers\Html;

 ?>
<div class="row search-field">
    <div class="input-group mx-auto mb-2">
        <input type="text" class="form-control" placeholder="Search for a related">
        <div class="input-group-append">
            <button class="btn btn-secondary" type="button">
                <i class="fas fa-search fa-sm"></i>
            </button>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
        <?php
        //Dynamic generation start of the implementation
//            for ($k = 0; $k < count($icons); $k++){
//
//                if (($k + 1) % 4 == 1){
//                    echo '<div class="row justify-content-center">';
//                }
//                echo Html::a("<i class=\"{$icons[$k]->category_icon_class}\"></i>
//                    <p>{$icons[$k]->category_name}</p>",
//                    ['/post/posts', 'lang' => strval($icons[$k]->category_name)],
//                    ['class' => ['lang']]);
//            }
        ?>
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
    echo $this->render('_postListView', ['dataProvider'  => $dataProvider, 'subview' => '__postContainer'])
?>
</div>