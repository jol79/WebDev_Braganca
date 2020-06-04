<?php

/** @var app\models\Post $dataProvider */
use yii\bootstrap4\LinkPager;
use yii\helpers\Html;
use yii\widgets\ListView;
use yii\widgets\Pjax;

\app\assets\BookmarkAsset::register($this);
?>

<div class="row">
    <div class="col-lg-12 title-bookmark text-center">
        Bookmarks
    </div>
</div>


<div class="row">
    <?php

    if ($dataProvider != null) {
        if (!$dataProvider->totalCount) {
            $create_link = Html::a('Search for posts that will be interesting for you <i class="fas fa-book-open"></i>',
                ['//post/posts'], ['class' => 'no-bookmarks text-center mx-auto p-3']);
            echo "<div class=\"col-md-12 col-lg-12 pt-3\">
                    $create_link    
              </div>";
        }
        else {
//            Pjax::begin();
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
//            Pjax::end();
        }
    }

    ?>
</div>
