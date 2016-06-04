<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model backend\models\Vendor */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="vendor-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'vendercode')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'vendorname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'detail')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'vendorgroupid')->widget(Select2::className(), [
                        'data' => ArrayHelper::map($modelgroup, 'recid', 'groupname'),
                        'language' => 'en',
                        'options' => ['placeholder' => 'Select......',
                        ],
                        'pluginOptions' => [
                            'allowClear' => true
                        ],
                            ]
                    ) ?>

    <?= $form->field($model, 'payment')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'createdate')->textInput() ?>

    <?= $form->field($model, 'updatedate')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
