<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Vendorgroup */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="vendorgroup-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'groupname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'detail')->textInput(['maxlength' => true]) ?>

    <?php //echo $form->field($model, 'createdate')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
