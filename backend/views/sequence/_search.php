<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\SequenceSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="sequence-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'recid') ?>

    <?= $form->field($model, 'activitytype') ?>

    <?= $form->field($model, 'activitysubtype') ?>

    <?= $form->field($model, 'prefix') ?>

    <?= $form->field($model, 'startno') ?>

    <?php // echo $form->field($model, 'endno') ?>

    <?php // echo $form->field($model, 'createdate') ?>

    <?php // echo $form->field($model, 'createby') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
