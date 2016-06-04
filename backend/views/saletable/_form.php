<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;
use kartik\date\DatePicker;
use yii\web\Session;
use yii\bootstrap\Modal;

$session = new Session();
$session->open();

/* @var $this yii\web\View */
/* @var $model backend\models\Saletable */
/* @var $form yii\widgets\ActiveForm */

$vat = [['id' => 0, 'name' => '0%'], ['id' => 7, 'name' => '7%'],];
$prod = backend\Models\Product::find()->all();
$wh = backend\Models\Warehouse::find()->all();
?>

<div class="saletable-form">
    <?php if (!empty($session->getFlash('msg'))): ?>
        <div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <?php echo $session->getFlash('msg'); ?>
        </div>
    <?php endif; ?>

    <?php $form = ActiveForm::begin(); ?>


    <div class="salenoid" id="<?= $model->isNewRecord ? '' : $session['recid']; ?>"></div>
    <div class="salestatus" id="<?= $model->isNewRecord ? '0' : $model->status; ?>"></div>

    <div class="box form-header">
        <div class="box-header">
            <div class="box-title">
                <b style="color: #979797">Header</b> 
            </div>
            <div class="box-tools">
                <ul class="pagination pagination-sm no-margin pull-right">
                </ul>
                <div class="box-tools pull-right">
<!--                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>-->
                </div>
            </div>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-lg-4">
                    <label class="control-label col-sm-3" for="inputSuccess3">Sale no</label>
                    <div class="col-sm-9">
                        <?= $form->field($model, 'saleno')->textInput(['maxlength' => true, 'readonly' => 'readonly', 'value' => $model->isNewRecord ? $runno : $model->saleno])->label(false) ?>
                    </div>
                </div>
                <div class="col-lg-4">
                    <label class="control-label col-sm-3" for="inputSuccess3">Date</label>
                    <div class="col-sm-9">
                        <?php
                        echo DatePicker::widget([
                            'name' => 'shipdate',
                            'model' => $model,
                            'attribute' => 'deliverydate',
                            //'value' => date('dd-mm-yyyy', strtotime('+2 days')),
                           'type' => DatePicker::TYPE_COMPONENT_APPEND,
                            'options' => ['value' => date('d-m-Y'),],
                            'pluginOptions' => [
                                'format' => 'dd-mm-yyyy',
                                'autoclose' => true,
                                'todayHighlight' => true
                            ]
                        ]);
                        ?>
                    </div>
                </div>
                <div class="col-lg-4">
                    <label class="control-label col-sm-3" for="inputSuccess3">Customer</label>
                    <div class="col-sm-9">
                        <?=
                        $form->field($model, 'customerid')->widget(Select2::className(), [
                            'data' => ArrayHelper::map($modelcust, 'recid', 'customername'),
                            'language' => 'en',
                            'options' => ['placeholder' => 'Select......',
                            ],
                            'pluginOptions' => [
                                'allowClear' => true
                            ],
                                ]
                        )->label(false)
                        ?>
                    </div>
                </div>

            </div>
            <div class="row">
                <div class="col-lg-4">
                    <label class="control-label col-sm-3" for="inputSuccess3">Payment</label>
                    <div class="col-sm-9">
                        <?=
                        $form->field($model, 'payment')->widget(Select2::className(), [
                            'data' => ArrayHelper::map($modelpayment, 'recid', 'paymentname'),
                            'language' => 'en',
                           // 'options' => ['placeholder' => 'Select......',
                            //],
                            'pluginOptions' => [
                                'allowClear' => true
                            ],
                                ]
                        )->label(false)
                        ?>
                    </div>
                </div>
                <div class="col-lg-2">
                    <label class="control-label col-sm-3" for="inputSuccess3">Vat</label>
                    <div class="col-sm-9">
                        <?=
                        $form->field($model, 'vat')->dropDownList(
                                ArrayHelper::map($vat, 'id', 'name'), ['id' => 'vat']
                        )->label(false)
                        ?>
                    </div>
                </div>
                <div class="col-lg-3">
                    <label class="control-label col-sm-4" for="inputSuccess3">Discount</label>
                    <div class="col-sm-8">
                        <?= $form->field($model, 'discount')->textInput(['id' => 'discount', 'value' => $model->isNewRecord ? "0" : $model->discount])->label(false) ?>
                    </div>
                </div>
                <div class="col-lg-3">
                    <label class="control-label col-sm-4" for="inputSuccess3">Discount%</label>
                    <div class="col-sm-8">
                        <?= $form->field($model, 'discountper')->textInput(['id' => 'discountpercent', 'value' => $model->isNewRecord ? "0" : $model->discountper])->label(false) ?>
                    </div>
                </div>

            </div>
            <div class="row">
                <div class="col-lg-3">
                    <label class="control-label col-sm-4" for="inputSuccess3">DiscAmt</label>
                    <div class="col-sm-8">
                        <?= $form->field($model, 'discountamt')->textInput(['style' => 'text-align: right;', 'readonly' => 'readonly', 'id' => 'discountamt'])->label(false) ?>
                    </div>
                </div>
                <div class="col-lg-3">
                    <label class="control-label col-sm-4" for="inputSuccess3">DiscPerAmt</label>
                    <div class="col-sm-8">
                        <?= $form->field($model, 'discountperamt')->textInput(['style' => 'text-align: right;', 'readonly' => 'readonly', 'id' => 'discountperamt'])->label(false) ?>
                    </div>
                </div>
                <div class="col-lg-3">
                    <label class="control-label col-sm-4" for="inputSuccess3">VatAmt</label>
                    <div class="col-sm-8">
                        <?= $form->field($model, 'vatamt')->textInput(['style' => 'text-align: right;', 'readonly' => 'readonly', 'id' => 'vatamt'])->label(false) ?>
                    </div>
                </div>
                <div class="col-lg-3">
                    <label class="control-label col-sm-3" for="inputSuccess3">Total</label>
                    <div class="col-sm-9">
                        <?= $form->field($model, 'totalamt')->textInput(['style' => 'text-align: right;', 'readonly' => 'readonly', 'id' => 'totalsale'])->label(false) ?>
<!--                        <input type="text" id="totalstandard" value="<?php //echo $model->totalamt ?>">-->

                    </div>
                </div>

            </div>
              <div class="row">
                <div class="col-lg-6">
                    <label class="control-label col-sm-2" for="inputSuccess3">Remark</label>
                    <div class="col-sm-10">
                        <?= $form->field($model, 'remark')->textarea(['rows'=>3])->label(false) ?>
                    </div>
                </div>
                

               <div class="col-lg-6">
                    <label class="control-label col-sm-2" for="inputSuccess3">Note</label>
                    <div class="col-sm-10">
                        <?= $form->field($model, 'note')->textarea(['rows'=>3])->label(false) ?>
                    </div>
                </div>
                

            </div>


            <?php //echo $form->field($model, 'createdate')->textInput()   ?>

            <div class="form-group">
                <?php if ($model->status != 200): ?>
                    <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary', 'id' => 'btnsubmit']) ?>
                <div class="btn btn-default print-invoice" style="display: none"><a href="index.php?r=saletable/postsale&id=<?=$model->recid?>"><i class="glyphicon glyphicon-print"></i> Print</a></div>
                <?php endif; ?>
            </div>


        </div>
    </div>

    <?php ActiveForm::end(); ?>

    <div class="box" id="pidetail">
        <div class="box-header">
            <div class="box-title">
                <!--                <b style="color: #979797">Detail</b> -->
                <b> <span class="rowcount"><?=$model->isNewRecord?'':count($modelline)?></span> </b> <b style="color: #888888">รายการ</b>
            </div>
            <div class="box-tools">
                <ul class="pagination pagination-sm no-margin pull-right">
                </ul>
                <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                </div>
            </div>
        </div>
        <div class="box-body">
            <div class="row pull-left" style="margin-bottom: 15px;">

                <div class="col-lg-12">
                    <?php  if(!$model->isNewRecord && $model->status == 0):?>
                   <div class="btn btn-primary checkline" id=""><i class="fa fa-check"></i> Validate line</div>
                   <?php endif;?>
                <!--     <div class="btn btn-danger calc"><i class="fa fa-trash-o"></i></div>-->

                </div>

            </div>
            <div class="row pull-right" style="margin-bottom: 15px;">

                <div class="col-lg-12">
                    <div class="btn btn-default addline"><i class="fa fa-plus-square"></i></div>
                    <div class="btn btn-warning removeline"><i class="fa fa-minus-square"></i></div>

                </div>

            </div>


            <table class="table table-striped table-bordered table-hover" style="margin-top: 10px" data-resizable-columns-id="demo-table">
                <thead>
                    <tr>
                        <th width="200px" style="text-align: left">ITEMID</th>
                        <th width="" style="text-align: left" data-resizable-column-id="NAME">NAME</th>
                        <th width="100px" style="text-align: right">WH</th>
                        <th width="110px" style="text-align: right">LOC</th>
                        <th width="110px" style="text-align: right">LOT</th>
                        <th width="90px" style="text-align: right">QTY</th>
                        <th width="80px" style="text-align: center">UNIT</th>
                        <th width="100px" style="text-align: right">PRICE</th>
                        <th width="110px" style="text-align: right">AMOUNT</th>
                        <th width="90px" style="text-align: right">ONHAND</th>

                    </tr>
                </thead>
                <tbody>
                    <?php if (!$model->isNewRecord && count($modelline) > 0): ?>
                        <?php foreach ($modelline as $data): ?>
                            <tr id="<?= $data->recid ?>">
                                <td style="vertical-align: middle;text-align: left;" class="tdgroup">
                                    <input id="xix" list="dl" type="text" class="form-control prodcode" value="<?= $data->product->prodcode ?>" autocomplete="off">
                                    <datalist id="dl">
                                        <?php foreach ($prod as $item): ?>
                                            <option value="<?= $item->prodcode ?>"/>
                                        <?php endforeach; ?>
                                    </datalist>

                                </td>
                                <td style="text-align: left;" class="prodname2">
                                    <input type="text" class="form-control prodname" style="border: none;width: 100%;" name="prodname" value="<?= $data->prodname ?>">
                                </td>
                                <td style="vertical-align: middle;" class="tdname">
                                   <input id="xix" list="dl2" type="text" class="form-control wh" value="<?= $data->warehouseid==null?'': $data->wh->warehousename?>" autocomplete="off">
                                        <datalist id="dl2">
                                            <?php foreach ($wh as $item): ?>
                                                <option value="<?= $item->warehousename ?>"/>
                                            <?php endforeach; ?>
                                        </datalist>
                                        <?php ?>     
                                </td>
                                <td style="vertical-align: middle;" class="tdname">
                                     <select class="form-control loc">
                                            <option value="<?=$data->locationid?>"><?= $data->locationid==null?'':$data->loc->locationname?></option>
                                        </select>
                                </td>
                                  <td style="vertical-align: middle;" class="tdname">
                                     <select class="form-control lot">
                                            <option value="<?=$data->lotid?>"><?= $data->lotid==null?'':$data->lot->lotnumbercode?></option>
                                        </select>
                                </td>
                                <td style="vertical-align: middle;" class="tdname">
                                    <input type="text" class="form-control saleqty" style="border: none;width: 100%;text-align: right;" name="saleqty"  value="<?= $data->qty ?>">
                                </td>

                                <td style="vertical-align: middle;">
                                    <input type="text"  style="border: none;text-align: center;" class="form-control saleunit" name="unit" value="<?= $data->units->unitname ?>">                         
                                </td>
                                <td style="vertical-align: middle;">
                                    <input type="text"  style="border: none;text-align: right;" class="form-control saleprice" name="price" value="<?= $data->price ?>"> 
                                </td>
                                <td style="vertical-align: middle;">
                                    <input type="text" class="form-control total" style="background-color: #fff; text-align: right;" name="total" readonly="readonly" value="<?= $data->qty * $data->price ?>">
                                </td>
                                <td>
                                <input type="text"  style="border: none;text-align: right;" class="form-control onhand" readonly="readonly" name="onhand" value=""> 
                                </td>
                            </tr>
                        <?php endforeach; ?>


                    <?php elseif (!$model->isNewRecord): ?>

                        <tr id="1">
                            <td style="vertical-align: middle;text-align: left;" class="tdgroup">
                                <input id="xix" list="dl" type="text" class="form-control prodcode">
                                <datalist id="dl">
                                    <?php foreach ($prod as $item): ?>
                                        <option value="<?= $item->prodcode ?>"/>
                                    <?php endforeach; ?>
                                </datalist>
                                <?php
                                ?>
                            </td>
                            <td style="text-align: left;" class="prodname2">
                                <input type="text" class="form-control prodname" style="border: none;width: 100%;" name="prodname" value="">
                            </td>
                              <td style="vertical-align: middle;" class="tdname">
                                   <input id="xix" list="dl2" type="text" class="form-control wh" value="" autocomplete="off">
                                        <datalist id="dl2">
                                            <?php foreach ($wh as $item): ?>
                                                <option value="<?= $item->warehousename ?>"/>
                                            <?php endforeach; ?>
                                        </datalist>
                                        <?php ?>     
                                </td>
                                <td style="vertical-align: middle;" class="tdname">
                                     <select class="form-control loc">
                                            <option value=""></option>
                                        </select>
                                </td>
                            <td style="vertical-align: middle;" class="tdname">
                                     <select class="form-control lot">
                                            <option value=""></option>
                                        </select>
                                </td>
                            <td style="vertical-align: middle;" class="tdname">
                                <input type="text" class="form-control saleqty" style="border: none;width: 100%;text-align: right;" name="saleqty"  value="">
                            </td>

                            <td style="vertical-align: middle;">
                                <input type="text"  style="border: none;text-align: center;" class="form-control saleunit" name="unit" value="">                         
                            </td>
                            <td style="vertical-align: middle;">
                                <input type="text"  style="border: none;text-align: right;" class="form-control saleprice" name="price" value=""> 
                            </td>
                            <td style="vertical-align: middle;">
                                <input type="text" class="form-control total" style="background-color: #fff; text-align: right;" name="total" readonly="readonly" value="">
                            </td>
                            <td>
                                <input type="text"  style="border: none;text-align: right;" class="form-control onhand" readonly="readonly" name="onhand" value=""> 
                            </td>

                        </tr>

                    <?php endif; ?>
                </tbody>
            </table>



        </div>
    </div>
</div>
   <?php
        Modal::begin([
            'header' => '',
            'id' => 'modal',
            // 'data-backdrop'=>false,
            'size' => 'modal-lg',
            'headerOptions'=>['class'=>'ok'],
            'options' => ['data-backdrop' => 'static','draggable'=>'true','droppable'=>'true',
            ],
            'footer' => '<a href="#" class="btn btn-danger" data-dismiss="modal">ยกเลิก</a>',
        ]);
        echo "<div id='showmodal'></div>";
    
?>
<?php Modal::end();?>     
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
            
            
                    // INIT 
                    
//                    $("#discount").val("0");
//                    $("#discountpercent").val("0");
                   // $("#totalstandard").hide();
                       if($(".checkline").attr("id") == ""){
                          $(".print-invoice").hide();
                       }
                       
                     //VALIDATE LINE
                     
                     $(".checkline").click(function(){
                        if($("table tbody>tr").length <=0){return;}
                     var x =0;
                  
                        $("table tbody>tr").find(".prodcode").each(function(){
                              var prodcode = $(this).closest("tr").find(".prodcode").val();
                              var qty = $(this).closest("tr").find(".saleqty").val();
                              var onhand = $(this).closest("tr").find(".onhand").val();
                             var wh = $(this).closest("tr").find(".wh").val();
                             var loc = $(this).closest("tr").find(".loc").val();
                             var lot = $(this).closest("tr").find(".lot").val();
                                 
                             var m = checktype(prodcode);
                             if(m == 0){
                             }else{
                              if( wh =="" || loc =="" || lot ==""  || parseInt(qty) > parseInt(onhand) || qty <= 0 ){
                                    x+=1;
                                }
                             }   
                                  
                            
                        });
                       // alert(x);
                        if(x>0){
                             
                             $("#modal2").modal("show").find("#showmodal").html("พบข้อผิดพลาด โปรดตรวจสอบอีกครั้ง");
                             $(".print-invoice").hide();
                             return;
                        }else{
                             $(this).attr("id","1");
                             $(".print-invoice").fadeIn();
                        }
                       
                     });
                     
                     // FUNCTION CHECK WAGE
                     
                     function checktype(prodcode){
                     var res = 0;
                         var Urls = "' . \yii::$app->getUrlManager()->createUrl('saletable/checkprodtype') . '";
                                 // run_waitme("#pkdetail");
                                  $.ajax({
                                      type:"post",
                                      dataType: "html",
                                      url: Urls,
                                      async: false,
                                      data:{prodcode: prodcode},
                                      success: function(data){
                                             if(data =="ค่าแรง")
                                              {
                                                res = 0;
                                              }else{
                                                res = 1;
                                              }
                                      },
                                      error:function(data){
                                          alert(" Could not enything ddd");
                                      }
                                  });
                                  return res;
                    }
                   
                     var recid = $(".salenoid").attr("id");
                     if(recid != "" && $("table tbody>tr").length > 0){
                            $("table tbody>tr").each(function(){
                                var prodcode = $(this).closest("tr").find(".prodcode").val();
                                var wh = $(this).closest("tr").find(".wh").val();
                                var loc = $(this).closest("tr").find(".loc").val();
                                var trqty = $(this).closest("tr").find(".onhand");

                                if(loc == "" || wh ==""){return;}else{
                                    var Urls = "' . \yii::$app->getUrlManager()->createUrl('saletable/checkonhand') . '";
                               // run_waitme("#pkdetail");
                                $.ajax({
                                    type:"post",
                                    dataType: "json",
                                    url: Urls,
                                    data:{prodcode: prodcode,wh: wh,loc: loc},
                                    success: function(data){
                                             trqty.val(data);
                                           // window.location.reload();
                                            //$("#pkdetail").waitMe("hide");
                                        },
                                    error:function(data){
                                        alert(" Could not enything");
                                    }
                                });
                                }
                            });
                     }
                     
                     // PREVENT SUBMIT
                     
                     $(".form-header").find("input[type=text]").keypress(function(e){
                        if(e.which == 13){
                            $(this).next().focus();
                            return false;
                        }
                     });
                        
                      
                    //KEYPRESS
                    
                    $("table tbody>tr .saleqty,.saleprice").keypress(function(e){
                          if(e.which != 8 && e.which != 0 && (e.which >=48 && e.which <=57 || e.which == 13) ){
                            //alert(e.which);
                            }else{
                            e.preventDefault();
                            }
                    });


                     rowindex = 0;
                     $("table tbody>tr").each(function(){
                        $(this).click(function(){ 
                            rowindex = $(this).index();
                        });
                       
                        
                     });
                    //SELECT PROD
                    
                     $(".prodcode").on("change",function(){
                        var crow  = $(this).closest("tr");
                       // alert($(this).val());
                      
                         var xurl = "' . \yii::$app->getUrlManager()->createUrl('saletable/getdetail') . '";
                      
                       $.ajax({
                            type:"post",
                            dataType: "json",
                            url: xurl,
                            data:{id: $(this).val()},
                            success: function(data){
                                //alert(data[0]);
                               crow.find(".prodname").val(data[0]);
                               crow.find(".saleqty").val("0");
                               crow.find(".saleunit").val(data[2]);
                               crow.find(".saleprice").val(data[3]);
                               crow.find(".total").val("0");
                                
                              // calall();
                            }
                            ,
                            error:function(data){
                                alert(" Could not enything");
                            }
                        });
                        
                        var lot = $(this).closest("tr").find(".lot");
                             var xurl = "' . \yii::$app->getUrlManager()->createUrl('transissue/getlot') . '";
                              $.ajax({
                                   type:"post",
                                   dataType: "html",
                                   url: xurl,
                                   data:{id: $(this).val() },
                                   success: function(data){
                                   //alert(data);
                                      lot.html(data);
                                   }
                                   ,
                                   error:function(data){
                                       alert(" Could not enything");
                                   }
                               });
                        if($(this).val()!="" && $(".wh").val()!="" && $("tr:last").find(".prodcode").val()!=""){
                         $("table tbody>tr:last").clone(true).insertAfter("table tbody>tr:last");
                           $("table tbody>tr:last").each(function() {
                                
                                $(this).attr("id","2000");
                                $(this).find(".prodcode").val("");
                                $(this).find(".prodname").val("");
                                $(this).find(".wh").val("");
                                $(this).find(".loc").val("");
                                $(this).find(".lot").val("");
                                $(this).find(".saleqty").val("0");
                                $(this).find(".saleunit").val("");
                                $(this).find(".saleprice").val("0");
                                $(this).find(".total").val("0");
                        
                           }); 
                        }

                     });
                     
                    ////// CLICK
                    
                     $(".prodcode").on("click",function(){
                      if($(this).val()!="" && $(".wh").val()!="" && $("tr:last").find(".prodcode").val()!=""){
                         $("table tbody>tr:last").clone(true).insertAfter("table tbody>tr:last");
                           $("table tbody>tr:last").each(function() {
                                
                                $(this).attr("id","2000");
                                $(this).find(".prodcode").val("");
                                $(this).find(".prodname").val("");
                                $(this).find(".wh").val("");
                                $(this).find(".loc").val("");
                                $(this).find(".lot").val("");
                                $(this).find(".saleqty").val("0");
                                $(this).find(".saleunit").val("");
                                $(this).find(".saleprice").val("0");
                                $(this).find(".total").val("0");
                        
                           }); 
                        }
                     });
                     
                   // Qty Change
                   
                   $(".saleqty,.saleprice").change(function(){
                        var prodcode = $(this).closest("tr").find(".prodcode").val();
                       var onhand = $(this).closest("tr").find(".onhand").val();
                        var qty = $(this).closest("tr").find(".saleqty").val();
                        var prc = $(this).closest("tr").find(".saleprice").val();
                       
                         
                        var Urls = "' . \yii::$app->getUrlManager()->createUrl('saletable/checkprodtype') . '";
                       // run_waitme("#pkdetail");
                        $.ajax({
                            type:"post",
                            dataType: "html",
                            url: Urls,
                            data:{prodcode: prodcode},
                            success: function(data){
                                    if(data =="ค่าแรง")
                                    {
                                     
                                    }else{
                                            if(parseInt(qty) > parseInt(onhand)){
                                             alert("จำนวนไม่พอสำหรับการขาย");
                                             $(".print-invoice").hide();return;
                                            }
                                    }
                                },
                            error:function(data){
                                alert(" Could not enything ddd");
                            }
                        });
                       
                        
                       $(this).closest("tr").find(".total").val(qty * prc);
                       headercal();
                   });
                   
                   $(".wh,.loc,.lot").change(function(){
                  
                        var prodcode = $(this).closest("tr").find(".prodcode").val();
                        var wh = $(this).closest("tr").find(".wh").val();
                        var loc = $(this).closest("tr").find(".loc").val();
                        var lot = $(this).closest("tr").find(".lot").val();
                        var trqty = $(this).closest("tr").find(".onhand");
                        
                        if(loc == "" || wh ==""){return;}else{
                            var Urls = "' . \yii::$app->getUrlManager()->createUrl('saletable/checkonhand') . '";
                       // run_waitme("#pkdetail");
                        $.ajax({
                            type:"post",
                            dataType: "json",
                            url: Urls,
                            data:{prodcode: prodcode,wh: wh,loc: loc,lot: lot},
                            success: function(data){
                                     trqty.val(data);
                                   // window.location.reload();
                                    //$("#pkdetail").waitMe("hide");
                                },
                            error:function(data){
                                alert(" Could not enything");
                            }
                        });
                        }
                   });
                   
                   $(".wh,.loc,.lot").click(function(){
                  
                        var prodcode = $(this).closest("tr").find(".prodcode").val();
                        var wh = $(this).closest("tr").find(".wh").val();
                        var loc = $(this).closest("tr").find(".loc").val();
                        var lot = $(this).closest("tr").find(".lot").val();
                        var trqty = $(this).closest("tr").find(".onhand");
                        
                        if(loc == "" || wh ==""){return;}else{
                            var Urls = "' . \yii::$app->getUrlManager()->createUrl('saletable/checkonhand') . '";
                       // run_waitme("#pkdetail");
                        $.ajax({
                            type:"post",
                            dataType: "json",
                            url: Urls,
                            data:{prodcode: prodcode,wh: wh,loc: loc,lot: lot},
                            success: function(data){
                                     trqty.val(data);
                                   // window.location.reload();
                                    //$("#pkdetail").waitMe("hide");
                                },
                            error:function(data){
                                alert(" Could not enything");
                            }
                        });
                        }
                   });
  
  

                   // CAL
                   
                   function calall(){
                        var rowcount = 0;
                        var totalline = 0;
                        $("table tbody>tr").each(function(){
                             rowcount +=1;
                             totalline = totalline + parseFloat($(this).find(".total").val());
                           
                             //$("#totalsale").val( totalline + parseFloat($("#vatamt").val()) - parseFloat($("#discountamt").val()) - parseFloat($("#discountperamt").val()));
                             $("#totalsale").val(totalline);
                             $("#totalstandard").val(totalline);
                            // headercal();
                             $(".rowcount").text(rowcount);
                        });
                   }

                     $(".addline").click(function(){
                         var rowid = 0;
                         $("table tbody>tr:last").clone(true).insertAfter("table tbody>tr:last");
                           $("table tbody>tr:last").each(function() {
                                
                                $(this).attr("id","2000");
                                $(this).find(".prodcode").val("");
                                $(this).find(".prodname").val("");
                                $(this).find(".wh").val("");
                               $(this).find(".loc").val("");
                              $(this).find(".lot").val("");
                               $(this).find(".saleqty").val("0");
                                $(this).find(".saleunit").val("");
                                $(this).find(".saleprice").val("0");
                                $(this).find(".total").val("0");
                               $(this).find(".onhand").val("0");
                        
                           }); 

                     });
                       $(".removeline").click(function(){
                       
                          var chkrow =0;
                          var tr;
                          $("table tbody>tr").each(function(){
                             chkrow +=1;
                             tr = $(this);
                          });
                         if(chkrow ==1){
                             tr.find(".prodcode").val("");
                             tr.find(".prodname").val("");
                              $(this).find(".wh").val("");
                               $(this).find(".loc").val("");
                             tr.find(".saleqty").val("");
                             tr.find(".saleunit").val("");
                             tr.find(".saleprice").val("");
                             tr.find(".total").val("");
                         }else{ 
                            $("table tbody>tr:eq("+ rowindex +")").remove();
                         }
                        
                         calall();
                         
                     });
                     
                    // $(".updateline").click(function(){
                      $("#btnsubmit").click(function(e){
                
                    var rowcount = $("table tbody>tr").length;
                    //alert(rowcount);
                    if(rowcount <= 0){
                      //alert("ไม่มีรายการให้คำนวน");
                      return;
                    }
                          var saleid = $(".salenoid").attr("id");
                          var id = [];
                          var prodcode = [];
                          var qty = [];
                          var wh = [];
                          var loc = [];
                          var lot = [];
                          var price = [];
                          var unit = [];
                          var total = [];
                          
                          var i = 0;
                          $("tr").find(".tdgroup").find(".prodcode").each(function(){
                              if($(this).closest("tr").find(".prodcode").val() ==""){
                                return true;
                              }
                              
                                id[i] =$(this).closest("tr").attr("id") ;
                                prodcode[i] =$(this).closest("tr").find(".prodcode").val();
                                qty[i] = $(this).closest("tr").find(".saleqty").val();
                               wh[i] = $(this).closest("tr").find(".wh").val();
                               loc[i] = $(this).closest("tr").find(".loc").val();
                               lot[i] = $(this).closest("tr").find(".lot").val();
                                price[i] = $(this).closest("tr").find(".saleprice").val();
                                unit[i] = $(this).closest("tr").find(".saleunit").val();
                                total[i] = $(this).closest("tr").find(".total").val();
                                i++;
                            });
                        
                        //  alert(id);return;  
                       var Urls = "' . \yii::$app->getUrlManager()->createUrl('saletable/updateline') . '";
                       // run_waitme("#pkdetail");
                        $.ajax({
                            type:"post",
                            dataType: "html",
                            url: Urls,
                            data:{saleid: saleid,id: id,prodcode: prodcode,qty: qty,price: price,unit: unit,total: total,wh: wh,loc: loc,lot: lot},
                            success: function(data){
                                   // alert(data); 
                                   // window.location.reload();
                                    //$("#pkdetail").waitMe("hide");
                                },
                            error:function(data){
                                alert(" Could not enything");
                            }
                        });
                });
                

                 // HEADER RECAL
                 function headercal(){
                    calall();
                   //var total = $("#totalstandard").val();
                    var total = $("#totalsale").val();
                  
                   // if(total <=0){total = $("#totalstandard").val(); }
                    var disc = $("#discount").val();
                    var vat = $("#vat").val();
                   // var discamt = (total * $("#discount").val())/100;
                    var discper = $("#discountpercent").val();
                    var discperamt = ((total - disc) * $("#discountpercent").val())/100;
                    var vatval = ((total - disc - discperamt) * vat)/100;
                    
                    $("#vatamt").val(vatval);
                    $("#discountamt").val(disc);
                    $("#discountperamt").val(discperamt);
                   // $("#totalsale").val( parseFloat(parseFloat(total)+parseFloat(vatval)-parseFloat(discamt)-parseFloat(discperamt)));
                    $("#totalsale").val( parseFloat(parseFloat(total)-parseFloat(disc)-parseFloat(discperamt)+parseFloat(vatval)));
                 }
                 
                // HEADER CAL
                
                $("#vat").change(function(){
                  headercal();
                });
                $("#discount").change(function(){
                    headercal();
                });
                $("#discountpercent").change(function(){
                    headercal();
                });
                function run_waitme(selector){
                    $(selector).waitMe({
                        effect: "bounce",
                        text: "Please wait..",
                        bg: "rgba(255,255,255,0.7)",
                        color: "#000",
                        sizeW: "",
                        sizeH:"",
                        source:"",
                        onClose: function() {}

                    });
                }
                
                /// GET LOC
                 
                    $("table tbody>tr").each(function(){
                    
                        $(this).find(".wh").on("click change",function(){

                        var loc = $(this).closest("tr").find(".loc");
                             var xurl = "' . \yii::$app->getUrlManager()->createUrl('saletable/getloc') . '";
                              $.ajax({
                                   type:"post",
                                   dataType: "html",
                                   url: xurl,
                                   data:{id: $(this).val() },
                                   success: function(data){
                                   //alert(data);
                                      loc.html(data);
                                   }
                                   ,
                                   error:function(data){
                                       alert(" Could not enything");
                                   }
                               });
                        });
                    });
                 
                    $("table tbody>tr").dblclick(function(){
                        var prodid = $(this).find(".prodcode").val();
                        if(prodid ==""){return;}
                          var xurl = "' . \yii::$app->getUrlManager()->createUrl('productonhand/onhandline') . '";
                          $("#modal").modal("show")
                          .find("#showmodal")
                          .load(xurl+"&id="+ prodid)
                          .draggable();
                          
                         
                    });
                
                 $(".alert").delay(4000).fadeOut();
                 
                   $("table tbody>tr").each(function(){
                  
                        var prodcode = $(this).closest("tr").find(".prodcode").val();
                        var wh = $(this).closest("tr").find(".wh").val();
                        var loc = $(this).closest("tr").find(".loc").val();
                        var lot = $(this).closest("tr").find(".lot").val();
                        var trqty = $(this).closest("tr").find(".onhand");
                        
                        if(loc == "" || wh ==""){return;}else{
                            var Urls = "' . \yii::$app->getUrlManager()->createUrl('saletable/checkonhand') . '";
                       // run_waitme("#pkdetail");
                        $.ajax({
                            type:"post",
                            dataType: "json",
                            url: Urls,
                            data:{prodcode: prodcode,wh: wh,loc: loc,lot: lot},
                            success: function(data){
                                     trqty.val(data);
                                   // window.location.reload();
                                    //$("#pkdetail").waitMe("hide");
                                },
                            error:function(data){
                                alert(" Could not enything");
                            }
                        });
                        }
                   });
                     
            });
        '
);
?>