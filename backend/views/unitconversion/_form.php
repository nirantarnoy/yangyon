<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Unitconversion */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="unitconversion-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'prodid')->textInput() ?>

    <?= $form->field($model, 'fromunit')->textInput() ?>

    <?= $form->field($model, 'tounit')->textInput() ?>

    <?= $form->field($model, 'fromfactor')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tofactor')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'createdate')->textInput() ?>

    <?= $form->field($model, 'updatedate')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
