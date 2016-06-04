<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\UnitconversionSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="unitconversion-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'recid') ?>

    <?= $form->field($model, 'prodid') ?>

    <?= $form->field($model, 'fromunit') ?>

    <?= $form->field($model, 'tounit') ?>

    <?= $form->field($model, 'fromfactor') ?>

    <?php // echo $form->field($model, 'tofactor') ?>

    <?php // echo $form->field($model, 'createdate') ?>

    <?php // echo $form->field($model, 'updatedate') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
