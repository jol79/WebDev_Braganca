<?php

/* @var $commentDataProvider ActiveDataProvider*/
/* @var $model app\models\Comment */

use app\assets\PostAsset;
use app\models\Comment;
use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\Html;
use yii\data\ActiveDataProvider;
use yii\helpers\Url;
use yii\widgets\ListView;

PostAsset::register($this);

//$green_box_img  = Html::img('@web/img/green_box.png', ['class' => 'float-left like_image']);
//$red_box_img  = Html::img('@web/img/red_box.png', ['class' => 'float-left like_image']);
//$user_avatar = Html::img('@web/avatars/user1.jpg', ['class' => 'comment_avatar mx-auto d-block']);
//$profile_link = Url::toRoute(["profile/view", "id" => 1]);
?>


<div class="container mt-4">
    <div class="row">
        <img src="/FINAL-PROJECT/avatars/user1.jpg" class="profile_avatar"/>
    </div>

    <div class="row">
        <div class="col-12 user_info">
            <p class="text-center">user_name</p>

            <hr class="divider">

            <h1 class="text-center">This is the fancy post title</h1>
        </div>
    </div>

    <br>

    <div class="row post_content text-justify">
        <div class="col-12 post_content text-justify">
            <p class="font-italic text-muted text-center">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed arcu mi, malesuada ut sodales eget, dapibus nec orci. Vivamus malesuada vestibulum pharetra. Fusce ac mauris tellus. Donec dapibus molestie ante in fringilla. Curabitur eu ex viverra orci pretium iaculis. Nunc efficitur, augue et aliquet aliquet, quam orci pretium leo, aliquet rutrum eros mi vel neque. Maecenas elementum sem a tellus luctus, non hendrerit ex lacinia. Nunc nec sodales sapien, id eleifend est. Nulla facilisi. Nulla venenatis nunc eget purus blandit, eu condimentum arcu sagittis.
            </p>

            <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed arcu mi, malesuada ut sodales eget, dapibus nec orci. Vivamus malesuada vestibulum pharetra. Fusce ac mauris tellus. Donec dapibus molestie ante in fringilla. Curabitur eu ex viverra orci pretium iaculis. Nunc efficitur, augue et aliquet aliquet, quam orci pretium leo, aliquet rutrum eros mi vel neque. Maecenas elementum sem a tellus luctus, non hendrerit ex lacinia. Nunc nec sodales sapien, id eleifend est. Nulla facilisi. Nulla venenatis nunc eget purus blandit, eu condimentum arcu sagittis.

                Praesent pellentesque pharetra eros, eu blandit odio vestibulum lobortis. In non sem ante. Etiam lobortis blandit fermentum. Nulla auctor diam ut leo feugiat convallis. In vestibulum, justo eget congue maximus, nisl nibh semper orci, eget iaculis lacus augue ac enim. Duis sed mauris pulvinar, lacinia felis ut, efficitur elit. Proin non quam ac nunc tincidunt cursus. Maecenas semper lorem consequat, vestibulum lectus malesuada, ullamcorper nunc. Nunc eget diam in dolor euismod scelerisque. Duis tempor nec elit eget mattis. Aenean eu risus at arcu sodales gravida. Pellentesque id quam risus. In maximus lectus id mi vulputate, sed blandit leo luctus.


                Nunc eu viverra massa, et molestie massa. Sed augue nisl, vestibulum ut laoreet sed, tempor eget nunc. Maecenas lacinia dui porttitor turpis venenatis, sodales pretium est lobortis. Aliquam accumsan pretium suscipit. Etiam suscipit efficitur ex ornare suscipit. Duis viverra ante rutrum nunc venenatis viverra. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Praesent sollicitudin lacinia orci eget egestas. Sed sit amet purus et velit aliquam fermentum. Vivamus venenatis massa id metus accumsan porta. Curabitur rhoncus augue ipsum, id egestas ipsum fringilla a. In quis facilisis neque. Curabitur convallis risus eu pretium sodales. Aliquam fermentum congue diam, at suscipit eros mollis a.

                Lorem ipsum dolor sit amet, consectetur adipiscing elit. In faucibus sapien eu eleifend laoreet. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Aenean id auctor nisl. Cras dolor magna, feugiat eu finibus id, finibus a mi. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Quisque laoreet justo suscipit, suscipit quam at, congue orci. Morbi mollis lectus nec aliquam convallis. Proin consequat mollis tempor. Phasellus et quam finibus, imperdiet nunc sed, feugiat lectus. Donec a mi posuere, tristique nunc at, tempus lorem. Vestibulum suscipit lacus tellus, in ultrices orci finibus vitae. Aenean semper diam vel diam auctor, id scelerisque nisi porta. Proin ut nisi massa. Praesent ultrices massa dolor, ut porttitor mi iaculis vitae.

                Duis at nisi interdum ligula gravida fringilla at ac quam. Pellentesque accumsan odio metus, congue luctus massa aliquam id. Phasellus nec justo orci. In hac habitasse platea dictumst. Phasellus a tempus nisi. Proin sed felis metus. Nam mollis, odio sed mollis suscipit, nulla urna facilisis turpis, vitae convallis dui sem sit amet leo. Vivamus placerat ligula ac dui egestas tincidunt.
            </p>
        </div>
    </div>
    <div class="row code_snippet_row">
        <div class="col-12">
            <script src="https://gist.github.com/232zero/71165d1e00c687ef40a312588b3b517e.js"></script>

        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <h2 class="text-center">Comments</h2>
        </div>
    </div>

    <?= ListView::widget([
        'dataProvider' => $commentDataProvider,
        'itemView' => '_comments',
    ]);?>

    <div class="row">
        <div class="col-12">
            <?php
            $form = ActiveForm::begin();
            ?>

            <?= $form->field($model, 'text')->textarea() ?>

            <div class="form-group">
                <?= Html::submitButton('Save', ['class' =>'btn btn-primary']) ?>
            </div>
            <?php ActiveForm::end() ?>
        </div>
    </div>


</div>



