<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model backend\models\Productarias */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="productarias-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="box">
        <div class="box-header">
            <div class="box-title">
                <b style="color: #979797">Data</b> 
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
            <?=
            $form->field($model, 'productid')->widget(Select2::className(), [
                'data' => ArrayHelper::map($modelprod, 'recid', 'prodcode'),
                'language' => 'en',
                'options' => ['placeholder' => 'Select......',
                ],
                'pluginOptions' => [
                    'allowClear' => true
                ],
                    ]
            )
            ?>

            <?=
            $form->field($model, 'vendorid')->widget(Select2::className(), [
                'data' => ArrayHelper::map($modelvendor, 'recid', 'vendorname'),
                'language' => 'en',
                'options' => ['placeholder' => 'Select......',
                ],
                'pluginOptions' => [
                    'allowClear' => true
                ],
                    ]
            )
            ?>

            <?= $form->field($model, 'ariasname')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'detail')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'createdate')->textInput() ?>

            <div class="form-group">
                <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
            </div>
        </div>
    </div>


    <?php ActiveForm::end(); ?>

</div>
