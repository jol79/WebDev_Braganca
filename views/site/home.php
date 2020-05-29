<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\db\ActiveRecord;
use yii\helpers\HtmlPurifier;
use yii\widgets\ListView;
use yii\data\Pagination;
use yii\widgets\LinkPager;

use yii\helpers\Url;

/* @var $form yii\bootstrap4\ActiveForm */
/* @var $model app\models\Feedback */

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
                            <form action="#">
                                <input type="submit" value="Create" class="btn btn-primary button_params" style="border-radius: 25px">
                            </form>
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
                            <form action="#">
                                <input type="submit" value="Learn" class="btn btn-primary button_params" style="border-radius: 25px">
                            </form>
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
                            <form action="#">
                                <input type="submit" value="Read" class="btn btn-primary button_params" style="border-radius: 25px">
                            </form>
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
                            <form action="#">
                                <input type="submit" value="Leave" class="btn btn-primary button_params" style="border-radius: 25px">
                            </form>
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
    <!-- leave comment: -->
    <?php if (Yii::$app->session->hasFlash('contactFormSubmitted')): ?>
        <div class="row">
            <div class="col mt-lg-5">
                <div class="relaway text-center">
                    <div class="">feedback posted</div>
                </div>
                <div class="alert alert-success relaway text-center ">
                    Thank you for feedback, you can see your comment below.
                </div>
            </div>
        </div>
    <?php else: ?>
        <div class="card mt-lg-5">
            <div class="card-body" style="background-color: #F0EFEF">
                <?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>
                <!-- text form: -->
                <div class="form-group relaway">
                    <?= $form->field($model, 'message')->textArea(['class' => 'form-control','rows' => 6, 'maxlength' => 280]) ?>
                </div>
                <div class="form-group text-center relaway-bold">
                    <?= Html::submitButton('Submit', ['class' => 'btn btn-primary btn-md', 'name' => 'contact-button']) ?>
                </div>
                <?php ActiveForm::end(); ?>
            </div>
        </div>
    <?php endif; ?>

    <!-- Comments: -->
    <?php
    if (is_array($result) || is_object($result))
    foreach ($result as $comment){
        echo "<br>
            <div class='container'>
                <div class='card-body' style='background-color: #F0EFEF; border-radius: 24px'>
                <div class='form-group relaway'>
                    <div class='' style='font-size: 30px; margin-top: -15px; color: #EDB23A'>
                        # ";
        echo Html::encode($comment->id_feedback), "</div>";
        echo "<div class='relaway' style='text-align: left; padding-left: 15px; padding-right: 15px'>";
        echo Html::encode($comment->message);
        echo "<br>
                <div class='' style='text-align: right; padding-top: 25px; margin-bottom: -25px; color: #A5A5A5'>";
        echo Html::encode($comment->created_at);
        echo "</div></div></div></div><br>";
    }
    ?>
</div>