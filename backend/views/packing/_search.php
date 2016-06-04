<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\PackingSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="packing-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'recid') ?>

    <?= $form->field($model, 'packcode') ?>

    <?= $form->field($model, 'detail') ?>

    <?= $form->field($model, 'factor') ?>

    <?= $form->field($model, 'createdate') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
