<?php
/** @var boolean $logged_in */
if ($logged_in){
    $cols = "2";
    echo $this->render('_postUpdateContainer', ['model' => $model]);
}
else $cols = "6";
?>

<div class="col-sm-6 col-md-<?=$cols?> col-lg-<?=$cols?> sm-margin">
    <span class="lang-logo mr-auto">
            <i class="<?=$model->category->category_icon_class?>"></i>
    </span>
</div>