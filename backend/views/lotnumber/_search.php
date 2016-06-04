<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\LotnumberSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="lotnumber-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'recid') ?>

    <?= $form->field($model, 'prodid') ?>

    <?= $form->field($model, 'lotnumbercode') ?>

    <?= $form->field($model, 'detail') ?>

    <?= $form->field($model, 'startdate') ?>

    <?php // echo $form->field($model, 'enddate') ?>

    <?php // echo $form->field($model, 'createdate') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
