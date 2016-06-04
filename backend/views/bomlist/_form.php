<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Bomlist */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="bomlist-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'bomname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'detail')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'productid')->textInput() ?>

    <?= $form->field($model, 'createby')->textInput() ?>

    <?= $form->field($model, 'active')->textInput() ?>

    <?= $form->field($model, 'approve')->textInput() ?>

    <?= $form->field($model, 'fromdate')->textInput() ?>

    <?= $form->field($model, 'todate')->textInput() ?>

    <?= $form->field($model, 'createdate')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
