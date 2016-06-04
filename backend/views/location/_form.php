<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model backend\models\Location */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="location-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'locationname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'detail')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'warehouseid')->widget(Select2::className(),[
        'data'=>  \yii\helpers\ArrayHelper::map($modelwh, 'recid', 'warehousename'),
        'language'=>'en',
        'options' => ['placeholder' => 'Select warehouse......',
                            ],
                            'pluginOptions' => [
                                'allowClear' => true
                            ],
    ]) ?>

    <?php //echo $form->field($model, 'createdate')->textInput() ?>

    <?php //echo $form->field($model, 'updatedate')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
