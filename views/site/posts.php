<?php
/* @var $lang */ //From sitecontroller (change it)
$this->title = 'Posts';
\app\assets\PostsAsset::register($this);

use yii\helpers\Html; ?>
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
        <div class="row">
            <?= Html::a(
                "<i class=\"devicon-python-plain\"></i>
                      <p>Python</p>",
                ['/site/posts', 'lang' => 'python'],
                ['class' => ['lang', 'ml-auto']]) ?>
            <?= Html::a(
                "<i class=\"devicon-csharp-plain\"></i>
                      <p>C sharp</p>",
                ['/site/posts', 'lang' => 'csharp'],
                ['class' => ['lang']]) ?>
            <?= Html::a(
                "<i class=\"devicon-go-plain\"></i>
                      <p>GoLang</p>",
                ['/site/posts', 'lang' => 'golang'],
                ['class' => ['lang']]) ?>
            <?= Html::a(
                "<i class=\"devicon-javascript-plain\"></i>
                      <p>JavaScript</p>",
                ['/site/posts', 'lang' => 'javascript'],
                ['class' => ['lang', 'mr-auto']]) ?>
        </div>
        <div class="row row-2">
            <?= Html::a(
                "<i class=\"devicon-c-plain\"></i>
                <p>C</p>",
                ['/site/posts', 'lang' => 'clang'],
                ['class' => ['lang', 'ml-auto']]) ?>
            <?= Html::a(
                "<i class=\"devicon-swift-plain\"></i>
                <p>Swift</p>",
                ['/site/posts', 'lang' => 'swift'],
                ['class' => ['lang']]) ?>
            <?= Html::a(
                "<i class=\"devicon-php-plain\"></i>
                <p>php</p>",
                ['/site/posts', 'lang' => 'php'],
                ['class' => ['lang']]) ?>
            <?= Html::a(
                "<i class=\"devicon-cplusplus-plain\"></i>
                <p>C++</p>",
                ['/site/posts', 'lang' => 'cplusplus'],
                ['class' => ['lang', 'mr-auto']]) ?>
        </div>
        <div class="row row-3">
            <?= Html::a(
                "<i class=\"devicon-ruby-plain\"></i>
                <p>Ruby</p>",
                ['/site/posts', 'lang' => 'ruby'],
                ['class' => ['lang', 'ml-auto']]) ?>
            <?= Html::a(
                "<i class=\"devicon-typescript-plain\"></i>
                <p>TypeScript</p>",
                ['/site/posts', 'lang' => 'typescript'],
                ['class' => ['lang']]) ?>
            <?= Html::a(
                "<i class=\"devicon-java-plain\"></i>
                <p>Java</p>",
                ['/site/posts', 'lang' => 'java'],
                ['class' => ['lang']]) ?>
            <?= Html::a(
                "<i class=\"devicon-mysql-plain\"></i>
                <p>SQL</p>",
                ['/site/posts', 'lang' => 'sql'],
                ['class' => ['lang', 'mr-auto']]) ?>
        </div>
    </div>
</div>
<div class="row mt-3">
    <?php
    if (!(count($result))) {
        echo "<div class=\"col-md-12 col-lg-12 \">Nothing was Found</div>";
    } elseif (count($result)) {
        $lg_column = count($result) == 1 ? 'col-lg-12 mx-auto' : 'col-lg-6 md-second';
        foreach($result as $column){
            echo <<<_EOF
                    <div class="col-md-12 col-lg-6 $lg_column">
                        <div class="post ml-auto">
                            <div class="container">
                                <div class="row">
                                    <div class="col-8">
                                        <div class="first-line mt-1">
                                            <span class='rank'>{$column['rating']}<i class="fas fa-star "></i></span>
                                            <span class='topic' data-toggle="tooltip" data-placement="top"
                                                  title="Logical Operators in Python">
                                                        {$column['topic']}
                                             </span>
                                        </div>
                                    </div>
                                    <div class="col-4 mt-1">
                                        <a href="">
                                            <div class="button mx-auto">
                                                <span class='check center'>Read</span>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <div class="row mt-1">
                                    <div class="col-12">
                                        <div class="code-sample mx-auto">
                                                    <pre class="prettyprint">
{$column['code']}
                                                    </pre>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <a href='#' class='author'>by: {$column['username']}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
_EOF;
        }
    }
    ?>
</div>