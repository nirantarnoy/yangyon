<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Packing */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="packing-form">

     <?php $form = ActiveForm::begin(); ?>
 <div class="box">
        <div class="box-header">
            <div class="box-title">
                <b style="color: #979797">Data</b> 
            </div>
            <div class="box-tools">
                <ul class="pagination pagination-sm no-margin pull-right">
                </ul>
                <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
<!--                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>-->
                </div>
            </div>
        </div>
     <div class="box-body">
         <?= $form->field($model, 'packcode')->textInput(['style' => 'width: 50%']) ?>

    <?= $form->field($model, 'detail')->textInput(['row' => 4]) ?>

    <?= $form->field($model, 'factor')->textInput(['style' => 'width: 20%']) ?>

    <?php //echo $form->field($model, 'createdate')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>
     </div>
 </div>
    

    <?php ActiveForm::end(); ?>

</div>
