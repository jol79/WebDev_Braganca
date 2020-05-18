<?php

use app\assets\PostAsset;
use yii\bootstrap4\Html;

PostAsset::register($this);

$green_box_img  = Html::img('@web/img/green_box.png', ['class' => 'float-left like_image']);
$red_box_img  = Html::img('@web/img/red_box.png', ['class' => 'float-left like_image']);
$user_avatar = Html::img('@web/img/flori.jpg', ['class' => 'comment_avatar mx-auto d-block']);
?>


<div class="container mt-4">
    <div class="row">
        <img src="/FINAL-PROJECT/img/flori.jpg" class="profile_avatar"/>
    </div>

    <div class="row">
        <div class="col-12 user_info">
            <p class="text-center">user_name</p>

            <hr class="divider">

            <p class="text-center">user_page</p>

            <hr class="divider">

            <p class="text-center">post_id</p>
        </div>
    </div>

    <br>

    <div class="row post_content text-justify">
        <div class="col-12 post_content text-justify">
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
            <pre class="code_snippet_pre">
                <p>
#example code snippet
import os
print("Hello world!")
print(os.getcwd())
                </p>
            </pre>

        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <h1 class="text-center">Comments</h1>
        </div>
    </div>
    <div class="row">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-1 ml-4 pr-0">
                    <a href="#"><?= $user_avatar ?></a>
                </div>
                <div class="col pl-0">
                    <p class="text-left"><a href="#">username</a></p>
                </div>
                <div class="col mr-5">
                    <p class="text-right comment_date_text">10/04/2020</p>
                </div>
            </div>
            <div class="row justify-content-center pt-4 pb-2">
                <div class="col-11">
                    <p class="text-justify">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas eu tempus massa. Suspendisse sollicitudin sem metus, et interdum erat venenatis a. Phasellus id sollicitudin metus. Interdum et malesuada fames ac ante ipsum primis in faucibus. Aliquam in risus et enim tempus venenatis quis at nibh. Cras id nisi tortor. Ut ullamcorper euismod tellus a feugiat. Praesent sed pellentesque nunc. Nam consectetur placerat faucibus. Cras vitae felis non neque iaculis malesuada nec ut urna. Mauris condimentum ipsum pellentesque nulla convallis dignissim. Phasellus scelerisque tellus eu ligula vehicula, nec eleifend mauris feugiat. Nunc pulvinar sollicitudin leo, quis malesuada orci porta sed. Morbi imperdiet vel enim et viverra. Nullam gravida id felis in molestie.</p>
                </div>
            </div>
            <div class="row align-items-center">
                <div class="col-1 offset-10 pr-0 pr-0">
                    <?= $green_box_img ?>
                    <p>12</p>
                </div>
                <div class="col-1 pl-0 ml-0">
                    <?= $red_box_img ?>
                    <p>12</p>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-1 ml-4 pr-0">
                    <a href="#"><?= $user_avatar ?></a>
                </div>
                <div class="col pl-0">
                    <p class="text-left"><a href="#">username</a></p>
                </div>
                <div class="col mr-5">
                    <p class="text-right comment_date_text">10/04/2020</p>
                </div>
            </div>
            <div class="row justify-content-center pt-4 pb-2">
                <div class="col-11">
                    <p class="text-justify">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas eu tempus massa. Suspendisse sollicitudin sem metus, et interdum erat venenatis a. Phasellus id sollicitudin metus. Interdum et malesuada fames ac ante ipsum primis in faucibus. Aliquam in risus et enim tempus venenatis quis at nibh. Cras id nisi tortor. Ut ullamcorper euismod tellus a feugiat. Praesent sed pellentesque nunc. Nam consectetur placerat faucibus. Cras vitae felis non neque iaculis malesuada nec ut urna. Mauris condimentum ipsum pellentesque nulla convallis dignissim. Phasellus scelerisque tellus eu ligula vehicula, nec eleifend mauris feugiat. Nunc pulvinar sollicitudin leo, quis malesuada orci porta sed. Morbi imperdiet vel enim et viverra. Nullam gravida id felis in molestie.</p>
                </div>
            </div>
            <div class="row align-items-center">
                <div class="col-1 offset-10 pr-0 pr-0">
                    <?= $green_box_img ?>
                    <p>12</p>
                </div>
                <div class="col-1 pl-0 ml-0">
                    <?= $red_box_img ?>
                    <p>12</p>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-1 ml-4 pr-0">
                    <a href="#"><?= $user_avatar ?></a>
                </div>
                <div class="col pl-0">
                    <p class="text-left"><a href="#">username</a></p>
                </div>
                <div class="col mr-5">
                    <p class="text-right comment_date_text">10/04/2020</p>
                </div>
            </div>
            <div class="row justify-content-center pt-4 pb-2">
                <div class="col-11">
                    <p class="text-justify">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas eu tempus massa. Suspendisse sollicitudin sem metus, et interdum erat venenatis a. Phasellus id sollicitudin metus. Interdum et malesuada fames ac ante ipsum primis in faucibus. Aliquam in risus et enim tempus venenatis quis at nibh. Cras id nisi tortor. Ut ullamcorper euismod tellus a feugiat. Praesent sed pellentesque nunc. Nam consectetur placerat faucibus. Cras vitae felis non neque iaculis malesuada nec ut urna. Mauris condimentum ipsum pellentesque nulla convallis dignissim. Phasellus scelerisque tellus eu ligula vehicula, nec eleifend mauris feugiat. Nunc pulvinar sollicitudin leo, quis malesuada orci porta sed. Morbi imperdiet vel enim et viverra. Nullam gravida id felis in molestie.</p>
                </div>
            </div>
            <div class="row align-items-center">
                <div class="col-1 offset-10 pr-0 pr-0">
                    <?= $green_box_img ?>
                    <p>12</p>
                </div>
                <div class="col-1 pl-0 ml-0">
                    <?= $red_box_img ?>
                    <p>12</p>
                </div>
            </div>
        </div>
    </div>

</div>



