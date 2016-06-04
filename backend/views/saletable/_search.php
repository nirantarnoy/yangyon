<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\SaletableSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="saletable-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'recid') ?>

    <?= $form->field($model, 'saleno') ?>

    <?= $form->field($model, 'deliverydate') ?>

    <?= $form->field($model, 'shipdate') ?>

    <?= $form->field($model, 'customerid') ?>

    <?php // echo $form->field($model, 'discount') ?>

    <?php // echo $form->field($model, 'discountper') ?>

    <?php // echo $form->field($model, 'vat') ?>

    <?php // echo $form->field($model, 'discountamt') ?>

    <?php // echo $form->field($model, 'discountperamt') ?>

    <?php // echo $form->field($model, 'vatamt') ?>

    <?php // echo $form->field($model, 'totalamt') ?>

    <?php // echo $form->field($model, 'createdate') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
