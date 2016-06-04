<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;
use yii\bootstrap\Modal;

/* @var $this yii\web\View */
/* @var $model backend\models\Product */
/* @var $form yii\widgets\ActiveForm */
$bomtype = [['id' => 0, 'name' => 'Parent'], ['id' => '1', 'name' => 'Child']];
?>

<div class="product-form">

    <?php $form = ActiveForm::begin(['id'=>'myform','options'=>['enctype'=>'multipart/form-data']]); ?>
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
                <div class="col-lg-9 pull-left">
                    <div class="row">
                        <div class="col-lg-3">
                            <?= $form->field($model, 'prodcode')->textInput(['maxlength' => true,'id'=>'prodcode']) ?>
                        </div>
                        <div class="col-lg-5">
                            <?= $form->field($model, 'prodname')->textInput(['maxlength' => true]) ?>
                        </div>
                        <div class="col-lg-4">
                            <?= $form->field($model, 'prodename')->textInput(['maxlength' => true]) ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                            <?= $form->field($model, 'detail')->textarea(['row' => 3]) ?>
                        </div>
                        <div class="col-lg-4">
                            <?=
                            $form->field($model, 'prodgroupid')->widget(Select2::className(), [
                                'data' => ArrayHelper::map($modelprodgroup, 'recid', 'groupname'),
                                'language' => 'en',
                                'options' => ['placeholder' => 'Select......',
                                ],
                                'pluginOptions' => [
                                    'allowClear' => true
                                ],
                                    ]
                            )
                            ?>
                        </div>
                        <div class="col-lg-4">
                            <?=
                            $form->field($model, 'prodcategoryid')->widget(Select2::className(), [
                                'data' => ArrayHelper::map($modelprodcategory, 'recid', 'categoryname'),
                                'language' => 'en',
                                'options' => ['placeholder' => 'Select......',
                                ],
                                'pluginOptions' => [
                                    'allowClear' => true
                                ],
                                    ]
                            )
                            ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-2">
                            <?=
                            $form->field($model, 'modelid')->widget(Select2::className(), [
                                'data' => ArrayHelper::map($modelmodel, 'recid', 'modelname'),
                                'language' => 'en',
                                'options' => ['placeholder' => 'Select......',
                                ],
                                'pluginOptions' => [
                                    'allowClear' => true
                                ],
                                    ]
                            )
                            ?>
                        </div>
                        <div class="col-lg-2">
                            <?=
                            $form->field($model, 'prodtype')->dropDownList(
                                    ArrayHelper::map($bomtype, 'id', 'name')
                            )
                            ?>
                        </div>
                        <div class="col-lg-3">
                            <?=
                            $form->field($model, 'packing')->widget(Select2::className(), [
                                'data' => ArrayHelper::map($modelpacking, 'recid', 'packcode'),
                                'language' => 'en',
                                'options' => ['placeholder' => 'Select......',
                                ],
                                'pluginOptions' => [
                                    'allowClear' => true
                                ],
                                    ]
                            )
                            ?>
                        </div>
                        <div class="col-lg-2">
                            <?= $form->field($model, 'cost')->textInput(['style' => 'text-align: right', 'value' => '0', 'readonly' => 'readonly']) ?>
                        </div>
                        <div class="col-lg-2">
                            <?= $form->field($model, 'costdate')->textInput(['readonly' => 'readonly']) ?>
                        </div>

                    </div>
                    <div class="row">

                        <div class="col-lg-3">
                            <?= $form->field($model, 'isactive')->checkbox()->label(false) ?>
                        </div>
                        <div class="col-lg-3">
                            <?= $form->field($model, 'puchactive')->checkbox()->label(false) ?>
                        </div>
                        <div class="col-lg-2">
                            <?php //echo $form->field($model, 'saleactive')->checkbox()->label(false) ?>
                        </div>

                    </div>
                </div>
                <div class="col-lg-3 pull-right">
                    <div class="row">
                        <div class="col-sm-12">
                            <?php echo $form->field($model, 'photo')->fileInput() ?>
                        </div>
                     
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="thumbnail">
                                <a href="../../uploads/<?php echo $model->photo?>" target="_blank"><img src="../../uploads/<?php echo $model->photo?>" alt=""></a>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>




        </div>
    </div>

    <div class="box">
        <div class="box-header">
            <div class="box-title">
                <b style="color: #979797">Advanced Data</b> 
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

            <div class="panel panel-active">
                <div class="panel-heading">
                    <div class="panel-title">
                        <b>Plan And Units</b>
                    </div>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-4">
                            <?=
                            $form->field($model, 'planid')->widget(Select2::className(), [
                                'data' => ArrayHelper::map($modelplan, 'recid', 'planname'),
                                'language' => 'en',
                                'options' => ['placeholder' => 'Select......',
                                ],
                                'pluginOptions' => [
                                    'allowClear' => true
                                ],
                                    ]
                            )
                            ?>
                        </div>
                        <div class="col-lg-2">
                            <?=
                            $form->field($model, 'inventunit')->widget(Select2::className(), [
                                'data' => ArrayHelper::map($modelunit, 'recid', 'unitname'),
                                'language' => 'en',
                                'options' => ['placeholder' => 'Select......',
                                ],
                                'pluginOptions' => [
                                    'allowClear' => true
                                ],
                                    ]
                            )
                            ?>
                        </div>
                        <div class="col-lg-2">
                            <?=
                            $form->field($model, 'purchaseunit')->widget(Select2::className(), [
                                'data' => ArrayHelper::map($modelunit, 'recid', 'unitname'),
                                'language' => 'en',
                                'options' => ['placeholder' => 'Select......',
                                ],
                                'pluginOptions' => [
                                    'allowClear' => true
                                ],
                                    ]
                            )
                            ?>
                        </div>
                        <div class="col-lg-2">
                            <?=
                            $form->field($model, 'saleunit')->widget(Select2::className(), [
                                'data' => ArrayHelper::map($modelunit, 'recid', 'unitname'),
                                'language' => 'en',
                                'options' => ['placeholder' => 'Select......',
                                ],
                                'pluginOptions' => [
                                    'allowClear' => true
                                ],
                                    ]
                            )
                            ?>
                        </div>
                        <div class="col-lg-2">
                            <?=
                            $form->field($model, 'bomunit')->widget(Select2::className(), [
                                'data' => ArrayHelper::map($modelunit, 'recid', 'unitname'),
                                'language' => 'en',
                                'options' => ['placeholder' => 'Select......',
                                ],
                                'pluginOptions' => [
                                    'allowClear' => true
                                ],
                                    ]
                            )
                            ?>
                        </div>
                    </div>
                </div>
            </div>

            <div class="panel panel-active">
                <div class="panel-heading">
                    <div class="panel-title">
                        <b>Pricing</b>
                    </div>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-4">
                            <?= $form->field($model, 'purchprice')->textInput(['style' => 'text-align: right', 'value' => '0']) ?>
                        </div>
                        <div class="col-lg-2">
                            <?= $form->field($model, 'saleprice')->textInput(['style' => 'text-align: right', 'value' => '0']) ?>
                        </div>
                        <div class="col-lg-2">
                            <?= $form->field($model, 'saleprice2')->textInput(['style' => 'text-align: right', 'value' => '0']) ?>
                        </div>
                        <div class="col-lg-2">
                            <?= $form->field($model, 'saleprice3')->textInput(['style' => 'text-align: right', 'value' => '0']) ?>
                        </div>

                    </div>
                </div>
            </div>

            <div class="panel panel-active">
                <div class="panel-heading">
                    <div class="panel-title">
                        <b style="color: ">Spacific</b>
                    </div>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-2">
                            <?= $form->field($model, 'netweight')->textInput(['style' => 'text-align: right', 'value' => '0']) ?>
                        </div>
                        <div class="col-lg-2">
                            <?= $form->field($model, 'tareweight')->textInput(['style' => 'text-align: right', 'value' => '0']) ?>
                        </div>
                        <div class="col-lg-2">
                            <?= $form->field($model, 'grossweight')->textInput(['style' => 'text-align: right', 'value' => '0']) ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-3">
                            <?= $form->field($model, 'height')->textInput() ?>
                        </div>
                        <div class="col-lg-3">
                            <?= $form->field($model, 'width')->textInput() ?>
                        </div>
                        <div class="col-lg-3">
                            <?= $form->field($model, 'dept')->textInput() ?>
                        </div>
                        <div class="col-lg-3">
                            <?= $form->field($model, 'density')->textInput() ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-3">
                            <?= $form->field($model, 'minstock')->textInput() ?>
                        </div>
                        <div class="col-lg-3">
                            <?= $form->field($model, 'maxstock')->textInput() ?>
                        </div>
                        <div class="col-lg-2">

                        </div>
                        <div class="col-lg-2">
                            <?= $form->field($model, 'lifetime')->textInput() ?>
                        </div>
                        <div class="col-lg-2">
                            <?= $form->field($model, 'leedtime')->textInput() ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-3">
                            <?= $form->field($model, 'minorder')->textInput() ?>
                        </div>
                        <div class="col-lg-3">
                            <?= $form->field($model, 'maxorder')->textInput() ?>
                        </div>
                        <div class="col-lg-3">
                            <?= $form->field($model, 'multiple')->textInput() ?>
                        </div>
                        <div class="col-lg-3">

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>


    <?php //echo $form->field($model, 'createby')->textInput()  ?>

    <?php //echo $form->field($model, 'createdate')->textInput()  ?>

    <?php //echo $form->field($model, 'modifydate')->textInput()  ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary','id'=>'btnsub']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
<?php
        Modal::begin([
            'header' => '',
            'id' => 'modal2',
            // 'data-backdrop'=>false,
            'size' => 'modal-md',
            'headerOptions'=>[],
            'options' => ['data-backdrop' => 'static',
            ],
            'footer' => '<a href="#" class="btn btn-danger" data-dismiss="modal">ยกเลิก</a>',
        ]);
        echo "<div id='showmodal'></div>";
    
?>
<?php Modal::end();?>     
<?php
$this->registerJs(
        '   
            $(function(){
                   $("#prodcode").on("change",function(){
                         var xurl = "' . \yii::$app->getUrlManager()->createUrl('product/chkcode') . '";
                      
                       $.ajax({
                            type:"post",
                            dataType: "html",
                            url: xurl,
                            data:{id: $(this).val()},
                            success: function(data){
                                if(data == 1){
                                $("#btnsub").prop("disabled","disabled");
                                    $("#modal2").modal("show").find("#showmodal").html("รหัสสินค้าซ้ำ");
                                    return;
                                }else{
                                    $("#btnsub").prop("disabled","");
                                }
                            }
                            ,
                            error:function(data){
                                alert(" Could not enything");
                            }
                        });
                      });
                        
            });
        '
);
?>
