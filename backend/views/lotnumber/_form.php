<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use kartik\date\DatePicker;

/* @var $this yii\web\View */
/* @var $model backend\models\Lotnumber */
/* @var $form yii\widgets\ActiveForm */

$prod = \backend\Models\Product::find()->all();
?>

<div class="lotnumber-form">

    <?php $form = ActiveForm::begin(); ?>
<div class="box">
        <div class="box-header">
            <div class="box-title">
                <b style="color: #979797">Header</b> 
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
            <div class="col-lg-4">
                    <label class="control-label col-sm-4" for="inputSuccess3">Product.</label>
                    <div class="col-sm-8">
                        <?= $form->field($model, 'prodid')->widget(Select2::className(), [
                                'data' => ArrayHelper::map($prod, 'recid', 'prodcode'),
                                'language' => 'en',
                                'options' => ['placeholder' => 'Select......','id'=>'prodcode',
                                ],
                                'pluginOptions' => [
                                    'allowClear' => true
                                ],
                                    ]
                            )->label(false) ?>
                    </div>
                </div>
             <div class="col-lg-3">
                    <label class="control-label col-sm-3" for="inputSuccess3">LotNo.</label>
                    <div class="col-sm-9">
                       <?= $form->field($model, 'lotnumbercode')->textInput(['maxlength' => true])->label(false) ?>
                    </div>
                </div>
                <div class="col-lg-5">
                              <label class="control-label col-sm-3" for="inputSuccess3">Detail.</label>
                              <div class="col-sm-9">
                                 <?= $form->field($model, 'detail')->textInput(['maxlength' => true])->label(false) ?>
                              </div>
                          </div>
             </div>
        <div class="row">
                 <div class="col-lg-4">
                    <label class="control-label col-sm-4" for="inputSuccess3">Start Date.</label>
                    <div class="col-sm-8">
                        <?= $form->field($model, 'startdate')->widget(DatePicker::className(),['pluginOptions' => [
                        'format' => 'dd-mm-yyyy',
                        'autoclose'=>true,
                        'todayHighlight' => true
                    
                            ],'options'=>['id'=>'startdate'] ,
                            ]
                                )->label(false);?>
                        <?php
//                        echo DatePicker::widget([
//                            'name' => 'startdate',
//                            'model' => $model,
//                            'attribute' => 'startdate',
//                            'value' => date('dd-mm-yyyy', strtotime('+2 days')),
//                            'type' => DatePicker::TYPE_COMPONENT_PREPEND,
//                            'options' => ['placeholder' => 'Select date ...','id'=>"startdate",],
//                            'pluginOptions' => [
//                                'format' => 'dd-mm-yyyy',
//                                'autoclose' => true,
//                                'todayHighlight' => true
//                            ]
//                        ]);
                        ?>
                    </div>
                </div>
       <div class="col-lg-4">
                    <label class="control-label col-sm-4" for="inputSuccess3">Expire Date.</label>
                    <div class="col-sm-8">
                       <?= $form->field($model, 'enddate')->textInput(['readonly'=>'readonly','id'=>'expdate'])->label(false) ?>
                    </div>
                </div>
 
        </div>
    


    <?php //echo $form->field($model, 'createdate')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>
    </div>
</div>
    

    <?php ActiveForm::end(); ?>

</div>
<?php $this->registerJs(
        '$(function(){
            $("#startdate").change(function(){
                var from = $(this).val().split("-");
                var f = new Date(from[2],from[1]-0,from[0]-0);
                var prodcode = $("#prodcode").val();
                
                        var Urls = "' . \yii::$app->getUrlManager()->createUrl('lotnumber/getlifetime') . '";
                       // run_waitme("#pkdetail");
                        $.ajax({
                            type:"post",
                            dataType: "html",
                            url: Urls,
                            data:{prodcode: prodcode},
                            success: function(data){
                                    f.setDate(f.getDate() + parseInt(data));
                                    $("#expdate").val(f.getDate()+"-"+f.getMonth()+"-"+f.getFullYear());
                                },
                            error:function(data){
                                alert(" Could not enything");
                            }
                        });

//               f.setDate(f.getDate() + 10);
//               $("#expdate").val(f.getDate()+"-"+f.getMonth()+"-"+f.getFullYear());
            });
        });'
);?>
