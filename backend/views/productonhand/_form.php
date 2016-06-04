<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Productonhand */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="productonhand-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'prodid')->textInput() ?>

    <?= $form->field($model, 'warehouseid')->textInput() ?>

    <?= $form->field($model, 'locationid')->textInput() ?>

    <?= $form->field($model, 'lotid')->textInput() ?>

    <?= $form->field($model, 'serialid')->textInput() ?>

    <?= $form->field($model, 'realqty')->textInput() ?>

    <?= $form->field($model, 'reservqty')->textInput() ?>

    <?= $form->field($model, 'qty')->textInput() ?>

    <?= $form->field($model, 'status')->textInput() ?>

    <?= $form->field($model, 'createdate')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
