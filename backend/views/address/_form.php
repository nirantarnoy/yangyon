<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model backend\models\Address */
/* @var $form yii\widgets\ActiveForm */

$prov = \common\models\Province::find()->all();
?>

<div class="address-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="box">
        <div class="box-header">
            <div class="box-title">
                <b style="color: #979797">Basic Data</b> 
            </div>
            <div class="box-tools">
                <ul class="pagination pagination-sm no-margin pull-right">
                </ul>
                <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
<!--                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>-->
                </div>
            </div>
        </div>
        <div class="box-body">
            <?= $form->field($model, 'address')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'detail')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'district')->textInput() ?>

            <?= $form->field($model, 'city')->textInput() ?>

            <?=
            $form->field($model, 'province')->widget(Select2::className(), [
                'data' => ArrayHelper::map($prov, 'PROVINCE_ID', 'PROVINCE_NAME'),
                'language' => 'en',
                'options' => ['placeholder' => 'Select......',
                ],
                'pluginOptions' => [
                    'allowClear' => true
                ],
                    ]
            )
            ?>

            <?= $form->field($model, 'zipcode')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'addresstype')->textInput() ?>

            <?= $form->field($model, 'isprimary')->textInput() ?>

            <?= $form->field($model, 'addressofid')->textInput() ?>

            <?= $form->field($model, 'createdate')->textInput() ?>

            <div class="form-group">
                <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
            </div>
        </div>
    </div>


    <?php ActiveForm::end(); ?>

</div>
