<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Sequence */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="sequence-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'activitytype')->textInput() ?>

    <?= $form->field($model, 'activitysubtype')->textInput() ?>

    <?= $form->field($model, 'prefix')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'startno')->textInput() ?>

    <?= $form->field($model, 'endno')->textInput() ?>

    <?= $form->field($model, 'createdate')->textInput() ?>

    <?= $form->field($model, 'createby')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
