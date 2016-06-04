<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\ProductonhandSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="productonhand-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'recid') ?>

    <?= $form->field($model, 'prodid') ?>

    <?= $form->field($model, 'warehouseid') ?>

    <?= $form->field($model, 'locationid') ?>

    <?= $form->field($model, 'lotid') ?>

    <?php // echo $form->field($model, 'serialid') ?>

    <?php // echo $form->field($model, 'realqty') ?>

    <?php // echo $form->field($model, 'reservqty') ?>

    <?php // echo $form->field($model, 'qty') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'createdate') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
