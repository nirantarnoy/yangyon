<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\ProductariasSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="productarias-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'recid') ?>

    <?= $form->field($model, 'productid') ?>

    <?= $form->field($model, 'vendorid') ?>

    <?= $form->field($model, 'ariasname') ?>

    <?= $form->field($model, 'detail') ?>

    <?php // echo $form->field($model, 'createdate') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
