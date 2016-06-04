<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model backend\models\Customer */
/* @var $form yii\widgets\ActiveForm */
 $prov = new \common\models\Province();
 $city = new \common\models\Amphur();
 $district = new \common\models\District();
 $custgroup = new \common\models\Customergroup();
 $payment = new \common\models\Paymenttype();
?>

<div class="customer-form">

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
             <div class="row">
                 <div class="col-lg-6">
                      <label class="control-label col-sm-3" for="inputSuccess3">Customer Name</label>
                    <div class="col-sm-9">
                        <?= $form->field($model, 'customername')->textInput(['maxlength' => true])->label(false) ?>
                    </div>
                 </div>
             <div class="col-lg-6">
                      <label class="control-label col-sm-3" for="inputSuccess3">Tax ID</label>
                    <div class="col-sm-9">
                        <?= $form->field($model, 'taxid')->textInput(['maxlength' => true])->label(false) ?>
                    </div>
                 </div>
             </div>
            <div class="row">
                 <div class="col-lg-6">
                      <label class="control-label col-sm-3" for="inputSuccess3">Detail</label>
                    <div class="col-sm-9">
                        <?= $form->field($model, 'detail')->textarea(['rows' =>4])->label(false) ?>
                    </div>
                 </div>
             <div class="col-lg-6">
                      <label class="control-label col-sm-3" for="inputSuccess3">Group</label>
                    <div class="col-sm-9">
                        <?= $form->field($model, 'customergroupid')->widget(Select2::className(), [
                            'data' => ArrayHelper::map($custgroup->find()->all(), 'recid', 'groupname'),
                            'language' => 'en',
                            'options' => ['placeholder' => 'Select......',
                            ],
                            'pluginOptions' => [
                                'allowClear' => true
                            ],
                                ]
                        )->label(false) ?>
                    </div>
                 </div>
             </div>
              <div class="row">
                 <div class="col-lg-6">
                      <label class="control-label col-sm-3" for="inputSuccess3">Payment term</label>
                    <div class="col-sm-9">
                         <?= $form->field($model, 'payment')->widget(Select2::className(), [
                            'data' => ArrayHelper::map($payment->find()->all(), 'recid', 'paymentname'),
                            'language' => 'en',
                            'options' => ['placeholder' => 'Select......',
                            ],
                            'pluginOptions' => [
                                'allowClear' => true
                            ],
                                ]
                        )->label(false) ?>
                    </div>
                 </div>
             <div class="col-lg-6">
                         <label class="control-label col-sm-3" for="inputSuccess3">Email</label>
                    <div class="col-sm-9">
                        <?= $form->field($model, 'email')->textInput(['rows' =>4])->label(false) ?>
                    </div>
                 </div>
             </div>
            <div class="row">
                 <div class="col-lg-6">
                      <label class="control-label col-sm-3" for="inputSuccess3">Phone</label>
                    <div class="col-sm-9">
                        <?= $form->field($model, 'tel')->textInput(['maxlength' => true])->label(false) ?>
                    </div>
                 </div>
             <div class="col-lg-6">
                      <label class="control-label col-sm-3" for="inputSuccess3">Mobile</label>
                    <div class="col-sm-9">
                        <?= $form->field($model, 'mobile')->textInput(['maxlength' => true])->label(false) ?>
                    </div>
                 </div>
             </div>

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
                            $.post("index.php?r=customer/showlist&id=' . '"+$(this).val(),function(data){
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
                        $.post("index.php?r=customer/showlist1&id=' . '"+$(this).val(),function(data){
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
                               $.post("index.php?r=customer/showlist2&id=' . '"+$(this).val(),function(data){
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
