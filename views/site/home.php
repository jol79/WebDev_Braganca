
<?php
use yii\helpers\Html;

use yii\widgets\ActiveForm;

use yii\helpers\Url;

$this->title = 'Home';
\app\assets\HomeAsset::register($this);
$this->params['breadcrumbs'][] = $this->title;
?>


<!-- Placing the first photo on the web page: -->
<div class="parallax_first">
    <p class="pos_firsttextinPhoto">Here is a space where people share and  encourage others.</p>
</div>

<!-- User Choice, block system: -->
<div class="container">
    <div class="row">
        <!-- Block 11 -->
        <div class="col-md-6 mt_blocksElements">
            <div class="card no_border" style="border: none">
                <!--                            <img class="card-img" src="../../web/img/Block_photo11.jpg" alt="block_1">-->
                <?= Html::img('@web/img/Block_photo11.jpg', ['class' => 'card-img', 'alt' => 'block_22']) ?>
                <div class="card-img-overlay text-white d-flex justify-content-center align-items-end">
                    <div class="container">
                        <div class="row">
                            <text class="text-center text_in_blocks text_block11" style="">Your programming</br> experience is</br> important</text>
                        </div>
                        <div class="row">
                            <button type="button" class="btn btn-primary button_params" data-toggle="button" style="border-radius: 25px">
                                Create
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Block 12 -->
        <div class="col-md-6">
            <div class="card mt_blocksElements no_border" style="border: none">
                <!--                            <img class="card-img" src="../../web/img/Block_photo12.jpg" alt="block_2">-->
                <?= Html::img('@web/img/Block_photo12.jpg', ['class' => 'card-img', 'alt' => 'block_22']) ?>
                <div class="card-img-overlay text-white d-flex justify-content-center align-items-end">
                    <div class="container">
                        <div class="row">
                            <text class="text-center text_in_blocks text_block11">Learn applying on</br> practice users</br> examples</text>
                        </div>
                        <div class="row">
                            <button type="button" class="btn btn-primary button_params" data-toggle="button" style="border-radius: 25px">
                                Learn
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Block 21-->
        <div class="col-md-6">
            <div class="card no_border" style="border: none; margin-bottom: -35px" >
                <!--                            <img class="card-img" src="../../web/img/Block_photo21.jpg" alt="block_3">-->
                <?= Html::img('@web/img/Block_photo21.jpg', ['class' => 'card-img', 'alt' => 'block_22']) ?>
                <div class="card-img-overlay text-white d-flex justify-content-center align-items-end">
                    <div class="container">
                        <div class="row">
                            <text class="text-center text_in_blocks text_block22">Read filtered news</br> from the most popular</br> sources</text>
                        </div>
                        <div class="row">
                            <button type="button" class="btn btn-primary button_params" data-toggle="button" style="border-radius: 25px">
                                Read
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Block 22 -->
        <div class="col-md-6">
            <div class="card no_border" style="border: none">
                <!--                            <img class="card-img" src="../../web/img/Block_photo22.jpg" alt="block_4">-->
                <?= Html::img('@web/img/Block_photo22.jpg', ['class' => 'card-img', 'alt' => 'block_22']) ?>
                <div class="card-img-overlay text-white d-flex justify-content-center align-items-end">
                    <div class="container">
                        <div class="row">
                            <text class="text-center text_in_blocks text_block22">Here you can leave the</br> feedback for</br> developers</text>
                        </div>
                        <div class="row">
                            <button type="button" class="btn btn-primary button_params" data-toggle="button" style="border-radius: 25px">
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
<div class="parallax_second">
    <p class="pos_secondtextinPhoto">Participate in platform’s growth</p>
</div>

<!-- comments block divider: -->
<div class="container">
    <div class="text-center">
        <p class="cos mb-5 mt-3">Leave comment</p>
    </div>
    <!-- Comments block: -->
    <div class="container text-center">
        <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="card p-3 text-right" style="background-color: #F0EFEF">
                        <blockquote class="blockquote mb-0 relaway">
                            <p>Amazing resource made by people who are passionate about what they are doing. Knew much new ...</p>
                            <footer class="blockquote-footer relaway">
                                <small class="text-muted">
                                    Alex Makowski <cite title="Source Title">15 min ago</cite>
                                </small>
                            </footer>
                        </blockquote>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="card p-3 text-right" style="background-color: #F0EFEF">
                        <blockquote class="blockquote mb-0 relaway">
                            <p>Amazing resource made by people who are passionate about what they are doing. Knew much new ...</p>
                            <footer class="blockquote-footer relaway">
                                <small class="text-muted">
                                    Alex Makowski <cite title="Source Title">15 min ago</cite>
                                </small>
                            </footer>
                        </blockquote>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="card p-3 text-right" style="background-color: #F0EFEF">
                        <blockquote class="blockquote mb-0 relaway">
                            <p>Amazing resource made by people who are passionate about what they are doing. Knew much new ...</p>
                            <footer class="blockquote-footer relaway">
                                <small class="text-muted">
                                    Alex Makowski <cite title="Source Title">15 min ago</cite>
                                </small>
                            </footer>
                        </blockquote>
                    </div>
                </div>
            </div>
            <!-- dots to slide between comments: -->
            <a class="carousel-control-prev black-dots" href="#carouselExampleCaptions" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next black-dots" href="#carouselExampleCaptions" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
    <!-- leave comment: -->
    <div class="card mt-lg-5" style="margin-bottom: 120px">
        <div class="card-body" style="background-color: #F0EFEF">
            <form>
                <!-- Comment: -->
                <div class="form-group relaway">
                    <label for="replyFormComment">Your comment</label>
                    <textarea class="form-control" id="send" rows="5"></textarea>
                </div>
                <!-- nickname/name: -->
                <div class="relaway">
                    <label for="replyFormName">Your name/nickname</label>
                    <input type="email" id="replyFormName" class="form-control relaway">
                </div>
                <br>
                <!-- Email: -->
                <div class="relaway">
                    <label for="replyFormEmail">Paste here your Email</label>
                    <input type="Email" id="replyFormEmail" class="form-control relaway">
                </div>
                <div class="text-center mt-4 relaway-bold">
                    <button class="btn btn-info btn-md" type="submit">Post</button>
                </div>
            </form>
        </div>
    </div>
    <!-- Placing the Copyright Block on the web page: -->
    <div class="imgbox">
        <?= Html::img('@web/img/Copyright%20block.jpg', ['class' => 'center-fit', 'alt' => 'block_22']) ?>
    </div>
</div>


<!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">-->
<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>-->
<!--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>-->