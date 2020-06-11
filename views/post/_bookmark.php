<?php
use yii\helpers\Html;

if (!$model->isBookmarked()){
    $link_class = 'unbookmarked';
}
else $link_class = 'bookmarked';

echo Html::a('<i class="far fa-bookmark"></i>',
    ['post/bookmark_add_del', 'post_id' => $model->post_id], ['class' => $link_class]);