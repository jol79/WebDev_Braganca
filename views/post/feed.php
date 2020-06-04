<?php

use app\assets\FeedAsset;
use app\models\Post;
use yii\data\ArrayDataProvider;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ListView;
use yii\widgets\Pjax;

/** @var \phpDocumentor\Reflection\Types\Array_ $blocks */
FeedAsset::register($this);
?>


<div class="row">
    <div class="col-lg-12 text-center head">
        Subscriptions
    </div>
</div>

<?php

    foreach ($blocks as $time => $models) {
    $dataProvider = new ArrayDataProvider(['allModels' => $models]);
    echo "<div class='row'>";
    echo "<div class='col-lg-12 time'>$time</div>";
    echo "</div>";

    echo ListView::widget([
        'dataProvider' => $dataProvider,
        'itemView' => '_postContainer',
        'viewParams' => ['logged_in' => false],
        'options' => [
            'tag' => 'div',
            'class' => 'row block',
        ],
        'itemOptions' => [
            'tag' => 'div',
            'class' => 'col-lg-6',
        ],
        'layout' =>
            "{items}",
    ]);

    }

    ?>




