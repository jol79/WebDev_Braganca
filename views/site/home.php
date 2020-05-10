
<?php
use yii\helpers\Html;

use yii\widgets\ActiveForm;

use yii\helpers\Url;

$this->title = 'Home';
\app\assets\HomeAsset::register($this);
$this->params['breadcrumbs'][] = $this->title;
?>


<!--<!DOCTYPE html>-->
<!--<html lang="en">-->
<!---->
<!--<head>-->
<!--    <meta charset="UTF-8">-->
<!--    <meta name="viewport" content="width=device-width, initial-scale=1.0">-->
<!--    <link rel="stylesheet" type="text/css" href="../../web/css/home_page.css"/>-->
<!---->
<!--</head>-->
<!---->
<!--<body>-->

<!-- Full Page Intro -->
<!--<div class="view" style="background-image: url('#'); background-repeat: no-repeat; background-size: cover; background-position: center center;">-->
<!--     Mask & flexbox options-->
<!--    <div class="mask rgba-gradient d-flex justify-content-center align-items-center">-->
        <!-- Content -->
<div class="container">
    <div class = 'container' style="margin-top: 100px;">
        <div class = 'container-fluid'>
            <!-- Placing the first photo on the web page: -->
            <div class="row rounded mx-auto d-block text-center">
<!--                <img src="../../web/img/FirstPage_Home.png" class="rounded mx-auto d-block mt-5">-->
                <?php echo Html::img('@web/img/FirstPage_Home.png') ?>
            </div>
            <!-- User Choice, block system: -->
            <div class="container">
                <div class="row">
                    <!-- Block 11 -->
                    <div class="col-md-6 l_colMargin mt_blocksElements">
                        <div class="card no_bo  rder">
<!--                            <img class="card-img" src="../../web/img/Block_photo11.jpg" alt="block_1">-->
                            <?php echo Html::img('@web/img/Block_photo11.jpg') ?>
                            <div class="card-img-overlay text-white d-flex justify-content-center align-items-end">
                                <div class="container">
                                    <div class="row">
                                        <text class="text-center text_in_blocks text_block11">Your programming</br> experience is</br> important</text>
                                    </div>
                                    <div class="row">
                                        <button type="button" class="btn btn-primary button_params" data-toggle="button">
                                            Create
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Block 12 -->
                    <div class="col-md-6">
                        <div class="card no_border r_colMargin mt_blocksElements">
<!--                            <img class="card-img" src="../../web/img/Block_photo12.jpg" alt="block_2">-->
                            <?php echo Html::img('@web/img/Block_photo12.jpg') ?>
                            <div class="card-img-overlay text-white d-flex justify-content-center align-items-end">
                                <div class="container">
                                    <div class="row">
                                        <text class="text-center text_in_blocks text_block11">Learn applying on</br> practice users</br> examples</text>
                                    </div>
                                    <div class="row">
                                        <button type="button" class="btn btn-primary button_params" data-toggle="button">
                                            Learn
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Block 21-->
                    <div class="col-md-6">
                        <div class="card no_border l_colMargin">
<!--                            <img class="card-img" src="../../web/img/Block_photo21.jpg" alt="block_3">-->
                            <?php echo Html::img('@web/img/Block_photo21.jpg') ?>
                            <div class="card-img-overlay text-white d-flex justify-content-center align-items-end">
                                <div class="container">
                                    <div class="row">
                                        <text class="text-center text_in_blocks text_block22">Read filtered news</br> from the most popular</br> sources</text>
                                    </div>
                                    <div class="row">
                                        <button type="button" class="btn btn-primary button_params" data-toggle="button">
                                            Read
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Block 22 -->
                    <div class="col-md-6">
                        <div class="card no_border r_colMargin">
<!--                            <img class="card-img" src="../../web/img/Block_photo22.jpg" alt="block_4">-->
                            <?php echo Html::img('@web/img/Block_photo22.jpg') ?>
                            <div class="card-img-overlay text-white d-flex justify-content-center align-items-end">
                                <div class="container">
                                    <div class="row">
                                        <text class="text-center text_in_blocks text_block22">Here you can leave the</br> feedback for</br> developers</text>
                                    </div>
                                    <div class="row">
                                        <button type="button" class="btn btn-primary button_params" data-toggle="button">
                                            Leave
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Placing the second photo on the web page: -->
            <div class="container">
                <div class="row">
                    <div class="img-wrapper img-responsive">
<!--                        <img class="img-responsive" src="../../web/img/SecondPhoto_Home.jpg">-->
                        <?php echo Html::img('@web/img/SecondPhoto_Home.jpg') ?>
                        <div class="img-overlay">
                            <button class="btn btn-md btn-success btn-custom">Leave</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Comments block: -->
            <div class="container text-center">
                <div class="row mt-md-5">
                    <div class="col com_block mr-2">
                        <div class="row">
                            <div class="col img_comment">
<!--                                <img src="../../web/img/comment_photo.jpg" alt="#" class="img_comment">-->
                                <?php echo Html::img('@web/img/comment_photo.jpg') ?>
                            </div>
                            <div class="col text_comment">
                                <p1>Amazing resource made by people who are passionate about what they are doing. Knew much new ...</p1>
                            </div>
                        </div>
                    </div>
                    <div class="col com_block ml-2">
                        <div class="row">
                            <div class="col img_comment">
<!--                                <img src="../../web/img/comment_photo.jpg" alt="#" class="img_comment">-->
                                <?php echo Html::img('@web/img/comment_photo.jpg') ?>
                            </div>
                            <div class="col text_comment">
                                <p1>Amazing resource made by people who are passionate about what they are doing. Knew much new ...</p1>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col com_block mr-2">
                        <div class="row">
                            <div class="col img_comment">
<!--                                <img src="../../web/img/comment_photo.jpg" alt="#" class="img_comment">-->
                                <?php echo Html::img('@web/img/comment_photo.jpg') ?>
                            </div>
                            <div class="col text_comment">
                                <p1>Amazing resource made by people who are passionate about what they are doing. Knew much new ...</p1>
                            </div>
                        </div>
                    </div>
                    <div class="col com_block ml-2">
                        <div class="row">
                            <div class="col img_comment">
<!--                                <img src="../../web/img/comment_photo.jpg" alt="#" class="img_comment">-->
                                <?php echo Html::img('@web/img/comment_photo.jpg') ?>
                            </div>
                            <div class="col text_comment">
                                <p1>Amazing resource made by people who are passionate about what they are doing. Knew much new ...</p1>
                            </div>
                        </div>
                    </div>
                </div>
<!--                   <div class="container">-->
<!--                       <div class="row mt-2">-->
<!--                           <div class="col com_block_bottom mr-2">-->
<!--                               <div class="row">-->
<!--                                   <div class="col">-->
<!--                                       <img src="img/comment_photo.jpg" alt="#" class="img_comment">-->
<!--                                   </div>-->
<!--                                   <div class="col text_comment">-->
<!--                                       <p1>Amazing resource made by people who are passionate about what they are doing. Knew much new ...</p1>-->
<!--                                   </div>-->
<!--                               </div>-->
<!--                           </div>-->
<!--                       </div>-->
<!--                   </div>-->
            </div>
            <!-- Placing the Copyright Block on the web page: -->
            <div class="row d-block cop_imgPlacing">
<!--                <img src="../../web/img/Copyright%20block.jpg" class="rounded mx-auto d-block mt-5 mb-4">-->
                <?php echo Html::img('@web/img/Copyright%20block.jpg') ?>
            </div>
        </div>
    </div>
    </div>
<!--</div>-->
<!--</body>-->
<!---->
<!--</html>-->