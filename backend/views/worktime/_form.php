<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Worktime */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="worktime-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="box">
        <div class="box-header">
            <div class="box-title">
                Header

            </div>
        </div>
        <div class="box-body">
            <?= $form->field($model, 'worktimename')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'detial')->textInput(['maxlength' => true]) ?>

            <?php //echo $form->field($model, 'createdate')->textInput() ?>
            
            <div class="container">
                <p><b>Select workingday active</b></p>
                <div class="row" style="margin-bottom: 20px;">
                    <div class="col-sm-1">
                        <div class="checkbox">
                        <label><input type="checkbox" value="">Monday</label>
                    </div>
                    </div>
                     <div class="col-sm-1">
                        <div class="checkbox">
                        <label><input type="checkbox" value="">Tuesday</label>
                    </div>
                    </div>
                     <div class="col-sm-1">
                        <div class="checkbox">
                        <label><input type="checkbox" value="">Wednesday</label>
                    </div>
                    </div>
                     <div class="col-sm-1">
                        <div class="checkbox">
                        <label><input type="checkbox" value="">Thursday</label>
                    </div>
                    </div>
                <div class="col-sm-1">
                        <div class="checkbox">
                        <label><input type="checkbox" value="">Thursday</label>
                    </div>
                    </div>
                <div class="col-sm-1">
                        <div class="checkbox">
                        <label><input type="checkbox" value="">Friday</label>
                    </div>
                    </div>
                <div class="col-sm-1">
                        <div class="checkbox">
                        <label><input type="checkbox" value="">Saturday</label>
                    </div>
                    </div>
                <div class="col-sm-1">
                        <div class="checkbox">
                        <label><input type="checkbox" value="">Sunday</label>
                    </div>
                    </div>
                    
                </div>
            </div>

            <div class="form-group">
                <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
            </div>
        </div>
    </div>

   
    <?php ActiveForm::end(); ?>


</div>
