<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\BomlistSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="bomlist-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'recid') ?>

    <?= $form->field($model, 'bomname') ?>

    <?= $form->field($model, 'detail') ?>

    <?= $form->field($model, 'productid') ?>

    <?= $form->field($model, 'createby') ?>

    <?php // echo $form->field($model, 'active') ?>

    <?php // echo $form->field($model, 'approve') ?>

    <?php // echo $form->field($model, 'fromdate') ?>

    <?php // echo $form->field($model, 'todate') ?>

    <?php // echo $form->field($model, 'createdate') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
