<?php

use yii\bootstrap4\LinkPager;
use yii\widgets\ListView;

/** @var $dataProvider */

if ($dataProvider != null) {
    if (!$dataProvider->totalCount) echo "<div class=\"col-md-12 col-lg-12 text-center pt-3\">No results</div>";
    else {

        /** @var boolean $logged_in */
        echo ListView::widget([
            'dataProvider' => $dataProvider,
            'itemView' => '__postContainer',
            'viewParams' => ['logged_in' => $logged_in],
            'options' => [
                'tag' => 'div',
                'class' => 'col-lg-12',
            ],
            'layout' =>
                "{items}",
        ]);
        echo LinkPager::widget([
            'pagination' => $dataProvider->pagination,
        ]);
    }
}

?>