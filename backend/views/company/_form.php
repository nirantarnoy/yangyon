<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model backend\models\Company */
/* @var $form yii\widgets\ActiveForm */
 $prov = new \common\models\Province();
 $city = new \common\models\Amphur();
 $district = new \common\models\District();
?>

<div class="company-form">

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
            <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'engname')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'idno')->textInput(['maxlength' => true]) ?>
            <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
            <?= $form->field($model, 'tel')->textInput(['maxlength' => true]) ?>
            <?= $form->field($model, 'mobile')->textInput(['maxlength' => true]) ?>

            <?php //echo $form->field($model, 'companytype')->textInput(['maxlength' => true]) ?>

            <?php //echo $form->field($model, 'createdate')->textInput() ?>





        </div>
    </div>
    <div class="box">
        <div class="box-header">
            <div class="box-title">
                <b style="color: #979797">Address</b> 
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

            <div class="row">
                <div class="col-lg-6">
                    <?= $form->field($model2, 'address')->textInput() ?>
                    <?php //echo $form->field($model2, 'detail')->textInput() ?>
                    <?=
                    $form->field($model2, 'province')->widget(Select2::classname(), [
                        'data' => ArrayHelper::map($prov->find()->all(), "PROVINCE_ID","PROVINCE_NAME"),
                        'language' => 'en',
                        'options' => ['placeholder' => 'Select Province......',
                            'onchange' => ' //alert("niran");
                        $.post("index.php?r=company/showlist&id=' . '"+$(this).val(),function(data){
                            $("select#address-city").html(data);
                            $("select#address-city").prop("disabled","");

                            });'
                        ],
                        'pluginOptions' => [
                            'allowClear' => true
                        ],
                    ])
                    ?>
                    <?= $form->field($model2, 'city')->widget(Select2::classname(), [
                        'data' => ArrayHelper::map($city->find()->all(), "AMPHUR_ID","AMPHUR_NAME"),
                        'language' => 'en',
                        'options' => ['placeholder' => 'Select City......','disabled'=>'disabled',
                            'onchange' => ' //alert("niran");
                        $.post("index.php?r=company/showlist1&id=' . '"+$(this).val(),function(data){
                            $("select#address-district").html(data);
                            $("select#address-district").prop("disabled","");
                            });'
                        ],
                        'pluginOptions' => [
                            'allowClear' => true
                        ],
                    ]) ?>
                    <?= $form->field($model2, 'district')->widget(Select2::classname(), [
                        'data' => ArrayHelper::map($district->find()->all(), "DISTRICT_ID","DISTRICT_NAME"),
                        'language' => 'en',
                        'options' => ['placeholder' => 'Select Distric......','disabled'=>'disabled',
                            'onchange' => ' //alert($(this).val());
                               $.post("index.php?r=company/showlist2&id=' . '"+$(this).val(),function(data){
                                      // alert(data);
                           $("#address-zipcode").val(data);

                         });'
                        ],
                        'pluginOptions' => [
                            'allowClear' => true
                        ],
                    ]) ?>
                    <?= $form->field($model2, 'zipcode')->textInput() ?>
                </div>
            </div>
        </div>
    </div>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>   



    <?php ActiveForm::end(); ?>

</div>
