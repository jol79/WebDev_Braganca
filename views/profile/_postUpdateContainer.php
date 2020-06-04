<?php

use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\Modal;
use yii\helpers\Html;

?>
<div class="col-6 col-sm-6 col-md-4 col-lg-4 sm-margin">
    <div class="settings mr-auto">
                <span class="update">
                    <?=Html::a('<i class="fas fa-pencil-alt"></i>',
                        ['post/update', 'id' => $model->post_id]);?>
                </span>

        <?php
        $froze_button = Html::submitButton('<i class="fas fa-ice-cream"></i>',
            ['class' => 'froze', 'name' => 'action', 'value' => 'froze']);
        $unfroze_button = Html::submitButton('<i class="fas fa-ice-cream"></i>',
            ['class' => 'froze', 'name' => 'action', 'value' => 'unfroze']);
        $delete_button = Html::a("Delete",
            ['post/delete', 'id' => $model->post_id], ['class' => 'btn btn-warning', 'data-method'=>'post']);
        Modal::begin([
            'toggleButton' => ['label' => '<i class="far fa-trash-alt"></i>'],
            'id' => 'delete',
            'title' => "Are you sure that you want to delete your post?"]);
        echo "<div class='modal-body'>
                If you want to make your post invisible for others you could use 'Froze' option, 
                otherwise your post will be deleted with all comments along .                       
                $froze_button
              </div>
              <div class='modal-footer'>
                <button type=\"button\" class=\"btn btn-secondary inside-modal\" data-dismiss=\"modal\">
                    Close
                </button>
                $delete_button
              </div>";
        Modal::end();
        ?>
        <span class="froze">
                    <?php $form = ActiveForm::begin();?>
                    <?php
                    if ($model->status == 'unfrozen') echo $froze_button;
                    else echo $unfroze_button;
                    ?>
                    <?= Html::hiddenInput("id", $model->post_id) ?>
                    <?php $form = ActiveForm::end();?>
                </span>
    </div>
</div>
