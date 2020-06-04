<?php

use voku\helper\HtmlDomParser;
use yii\helpers\Url;
use yii\bootstrap4\Html;
//require_once 'composer/autoload.php';

$this->title = 'News';
\app\assets\NewsAsset::register($this);
?>

<div class="container relaway" style="margin-top: 100px">

    <div class="" style="font-size: 32px; text-align: center; margin-top: 150px">
        <large>
            Latest News
        </large>
    </div>

    <!-- divider -->
    <div class="__divider"></div>

    <?php
        // define the url to parse:
        $DEFAULT_URL = 'https://news.ycombinator.com';

        // get html from web-page:
        $dom = HtmlDomParser::file_get_html($DEFAULT_URL);

        // using foreach loop to get only needed part of html:
        foreach ($dom->find('a[class=storylink]') as $post){

            // prints the news name:
            echo "<div class='' style='margin-top: 40px'>
                        <div class='row card-body hov_ef card__params'>
                            <div class='form-group text__card'>", $post->innertext;

            // getting link for each post:
            echo '<div class="row">';
            $link = $post->getAttribute('href');

            ?>

            <!-- Using button for url to visit the web page who make a post -->
            <a href="<?=$link?>" class="btn btn-primary button__params cube__button button__hover" style="border-radius: 24px; background: #616DE1; padding-bottom: 30px">Read</a></div></div></div>
            <?php
        }
    ?>

    <!-- divider -->
    <div class="__divider" style="margin-top: 35px"></div>

    <!-- Information about platforms that we are using to get actualized news: -->
    <div style="font-size: 32px; text-align: center; margin-top: 70px">
        <large>
            Sites that we  are monitoring for news
        </large>

        <div class="container cont_position" style="margin-left: 295px">
            <!-- Platforms icon's: -->
            <div class="row trow__position" style="">

                <!-- Apple -->
                <div class="col-1 col-sm-1 col-md-1 col-lg-1 col-xl-1">
                    <?= Html::img(Url::to('@web/img/news_pagePNGs/apple.png'), ['class' => '__sites', 'alt' => 'jw']) ?>
                </div>

                <!-- Facebook -->
                <div class="col-1 col-sm-1 col-md-1 col-lg-1 col-xl-1">
                    <?= Html::img(Url::to('@web/img/news_pagePNGs/facebook.png'), ['class' => '__sites', 'alt' => 'jw']) ?>
                </div>

                <!-- Google -->
                <div class="col-1 col-sm-1 col-md-1 col-lg-1 col-xl-1">
                    <?= Html::img(Url::to('@web/img/news_pagePNGs/google.png'), ['class' => '__sites', 'alt' => 'google']) ?>
                </div>

                <!-- Jawa World -->
                <div class="col-1 col-sm-1 col-md-1 col-lg-1 col-xl-1">
                    <?= Html::img(Url::to('@web/img/news_pagePNGs/java_world.png'), ['class' => '__sites', 'alt' => 'java_world']) ?>
                </div>

                <!-- omg Ubuntu -->
                <div class="col-1 col-sm-1 col-md-1 col-lg-1 col-xl-1">
                    <?= Html::img(Url::to('@web/img/news_pagePNGs/omg_ubuntu.png'), ['class' => '__sites', 'alt' => 'ubuntu']) ?>
                </div>

            </div>

            <div class="row brow__position" style="">

                <!-- Python -->
                <div class="col-1 col-sm-1 col-md-1 col-lg-1 col-xl-1">
                    <?= Html::img(Url::to('@web/img/news_pagePNGs/python.png'), ['class' => '__sites', 'alt' => 'python']) ?>
                </div>

                <!-- Ruby on Rails -->
                <div class="col-1 col-sm-1 col-md-1 col-lg-1 col-xl-1">
                    <?= Html::img(Url::to('@web/img/news_pagePNGs/ruby_on_rails.png'), ['class' => '__sites', 'alt' => 'ROR']) ?>
                </div>

                <!-- Telegram -->
                <div class="col-1 col-sm-1 col-md-1 col-lg-1 col-xl-1">
                    <?= Html::img(Url::to('@web/img/news_pagePNGs/telegram.png'), ['class' => '__sites', 'alt' => 'telegram']) ?>
                </div>

                <!-- Twitter -->
                <div class="col-1 col-sm-1 col-md-1 col-lg-1 col-xl-1">
                    <?= Html::img(Url::to('@web/img/news_pagePNGs/twitter.png'), ['class' => '__sites', 'alt' => 'twitter']) ?>
                </div>

                <!-- Yii2 Framework -->
                <div class="col-1 col-sm-1 col-md-1 col-lg-1 col-xl-1">
                    <?= Html::img(Url::to('@web/img/news_pagePNGs/yii2_framework.png'), ['class' => '__sites', 'alt' => 'yii2']) ?>
                </div>

            </div>
    </div>


</div>
