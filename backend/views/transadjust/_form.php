<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use kartik\date\DatePicker;
use yii\helpers\ArrayHelper;
use yii\web\Session;
use yii\bootstrap\Modal;

$session = new Session();
$session->open();

/* @var $this yii\web\View */
/* @var $model backend\models\Transadjust */
/* @var $form yii\widgets\ActiveForm */
$prod = backend\Models\Product::find()->all();
$wh = backend\Models\Warehouse::find()->all();
$act = \common\models\Activity::find()->all();
$acttype = 8;
?>

<div class="transadjust-form" id="transadjust">

    <?php $form = ActiveForm::begin(); ?>
    <div class="salenoid" id="<?= $model->isNewRecord ? '' : $session['recid']; ?>"></div>
    <div class="salestatus" id="<?= $model->status == null?0:$model->status?>"></div>
    <div class="box" id="header-form">
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
<!--                <div class="col-lg-3">
                    <label class="control-label col-sm-3" for="inputSuccess3">Type</label>
                    <div class="col-sm-9">
                        <?php //echo
//                        $form->field($model, 'transtype')->dropDownList(
//                                ArrayHelper::map($act, 'recid', 'activityname')
//                                , ['options' => [$acttype => ['selected' => true]]]
//                        )->label(false)
                        ?>
                    </div>
                </div>-->
                <div class="col-lg-4">
                    <label class="control-label col-sm-4" for="inputSuccess3">Trans No.</label>
                    <div class="col-sm-8">
                        <?= $form->field($model, 'transno')->textInput(['maxlength' => true,'value'=>$model->isNewRecord?$runno:$model->transno,'readonly'=>'readonly'])->label(false) ?>

                    </div>
                </div>
                <div class="col-lg-4">
                    <label class="control-label col-sm-3" for="inputSuccess3">Date</label>
                    <div class="col-sm-9">
                             <?= $form->field($model, 'transdate')->widget(DatePicker::className(),[ 'pluginOptions' => [
                        'format' => 'dd-mm-yyyy',
                        'autoclose'=>true,
                        'todayHighlight' => true
                    ]])->label(false);?>
                       
                        <?php
//                        echo DatePicker::widget([
//                            'name' => 'transdate',
//                            'model' => $model,
//                            'attribute' => 'transdate',
//                            'value' => date('d-m-Y', strtotime('+2 days')),
//                           'type' => DatePicker::TYPE_COMPONENT_APPEND,
//                           // 'options' => ['value' => date('d-m-Y'),],
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
                    <label class="control-label col-sm-2" for="inputSuccess3">Status</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" readonly="readonly" value="<?= $model->status == 100?"Posted":"Open"?>">
                    </div>
                </div>

            </div>
            <div class="row">
                <div class="col-lg-6">
                    <label class="control-label col-sm-2" for="inputSuccess3">Detail</label>
                    <div class="col-sm-10">
                        <?= $form->field($model, 'deatail')->textInput()->label(false) ?>
                    </div>
                </div>
                 
            </div>
            <div class="form-group">
                <?php if($model->status != 100):?>
                <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary', 'id' => 'btnsubmit']) ?>
                <?php endif;?>
            </div>
        </div>



        <?php //echo $form->field($model, 'docref')->textInput(['maxlength' => true]) ?>

        <?php //echo $form->field($model, 'transdate')->textInput() ?>

        <?php //echo $form->field($model, 'createdate')->textInput()  ?>



        <?php ActiveForm::end(); ?>
    </div>
        <div class="box" id="pidetail">
            <div class="box-header">
                <div class="box-title">
                    <!--                <b style="color: #979797">Detail</b> -->
                    Total
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
                        <div class="btn btn-success saveline"><i class="fa fa-save"></i> Save line</div>
                        <div class="btn btn-primary postline"><i class="fa fa-upload"></i> Post</div>

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
                            <th width="100px" style="text-align: right">QTY</th>
                            <th width="100px" style="text-align: center">UNIT</th>
                            <th width="100px" style="text-align: right">WH</th>
                            <th width="150px" style="text-align: right">LOC</th>
                            <th width="150px" style="text-align: right">LOT</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!$model->isNewRecord && count($modelline) > 0): ?>
                            <?php foreach ($modelline as $data): ?>
                                <tr id="<?= $data->recid ?>">
                                    <td style="vertical-align: middle;text-align: left;" class="tdgroup">
                                        <input id="xix" list="dl" type="text" class="form-control prodcode" autocomplete="off" value="<?= $data->product->prodcode ?>">
                                        <datalist id="dl">
                                            <?php foreach ($prod as $item): ?>
                                                <option value="<?= $item->prodcode ?>"/>
                                            <?php endforeach; ?>
                                        </datalist>

                                    </td>
                                    <td style="text-align: left;" class="prodname2">
                                        <input type="text" class="form-control prodname" style="border: none;width: 100%;" name="prodname" value="<?= $data->product->prodname ?>">
                                    </td>
                                    <td style="vertical-align: middle;" class="tdname">
                                        <input type="text" class="form-control transqty" style="border: none;width: 100%;text-align: right;" name="transqty"  value="<?= $data->qty ?>" autocomplete="off">
                                    </td>

                                    <td style="vertical-align: middle;">
                                        <input type="text"  style="border: none;text-align: center;" class="form-control transunit" name="transunit" value="<?= $data->units->unitname ?>">                         
                                    </td>
                                    <td style="vertical-align: middle;">
                                        <input id="xix" list="dl2" type="text" class="form-control wh" value="<?= $data->warhouseid==null?'': $data->wh->warehousename?>" autocomplete="off">
                                        <datalist id="dl2">
                                            <?php foreach ($wh as $item): ?>
                                                <option value="<?= $item->warehousename ?>"/>
                                            <?php endforeach; ?>
                                        </datalist>
                                        <?php ?>                       
                                    </td>
                                    <td style="vertical-align: middle;">
                                        <select class="form-control loc">
                                            <option value="<?=$data->locationid?>"><?= $data->locationid==null?'':$data->loc->locationname?></option>
                                        </select>
                                    </td>
                                    <td style="vertical-align: middle;">
                                        <select class="form-control lot">
                                             <option value="<?=$data->lotid?>"><?=$data->lotid==null?'':$data->lot->lotnumbercode?></option>
                                        </select>
                                    </td>

                                </tr>
                            <?php endforeach; ?>


                        <?php elseif (!$model->isNewRecord): ?>

                            <tr id="1">
                                <td style="vertical-align: middle;text-align: left;" class="tdgroup">
                                    <input id="xix" list="dl" type="text" class="form-control prodcode" autocomplete="off">
                                    <datalist id="dl">
                                        <?php foreach ($prod as $item): ?>
                                            <option value="<?= $item->prodcode ?>"/>
                                        <?php endforeach; ?>
                                    </datalist>
                                    <?php ?>
                                </td>
                                <td style="text-align: left;" class="prodname2">
                                    <input type="text" class="form-control prodname" style="border: none;width: 100%;" name="prodname" value="">
                                </td>
                                <td style="vertical-align: middle;" class="tdname">
                                    <input type="text" class="form-control transqty" style="border: none;width: 100%;text-align: right;" name="transqty" autocomplete="off" value="">
                                </td>
                                <td style="vertical-align: middle;">
                                    <input type="text" class="form-control transunit" style="border: none;width: 100%;text-align: right;" name="transunit"  value="">
                                </td>

                                <td style="vertical-align: middle;">
                                    <input id="xix" list="dl2" type="text" class="form-control wh" autocomplete="off">
                                    <datalist id="dl2">
                                        <?php foreach ($wh as $item): ?>
                                            <option value="<?= $item->warehousename ?>"/>
                                        <?php endforeach; ?>
                                    </datalist>
                                    <?php
                                    ?>                       
                                </td>
                                <td style="vertical-align: middle;">
                                    <select class="form-control loc">

                                    </select>
                                </td>
                                <td style="vertical-align: middle;">
                                    <select class="form-control lot">

                                    </select>
                                </td>

                            </tr>

                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>

<?php
        Modal::begin([
            'header' => '',
            'id' => 'modal',
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
                      
                    $("#header-form").find("input[type=text]").keypress(function(e){
                        if(e.which === 13){
                            e.preventDefault();
                        }
                    });
                    
                     if($(".salestatus").attr("id") == 100 || $(".salenoid").attr("id") == "" ){
                        $(".saveline").hide();
                        $(".postline").hide();
                     }
                      rowindex = 0;
                     $("table tbody>tr").each(function(){
                        $(this).click(function(){ 
                            rowindex = $(this).index();
                        });
                      });
                      
                      // KEYPRESS
                      
                       $("table tbody>tr .transqty").keypress(function(e){
                       //alert();return;
                          if(e.which != 8 && e.which != 0 && (e.which >=48 && e.which <=57)){
                            //alert(e.which);
                            }else{
                            e.preventDefault();
                            }
                        });
                    
                    //SELECT PROD
                    
                     $(".prodcode").change(function(){
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
                               crow.find(".saleqty").val(data[1]);
                               crow.find(".transunit").val(data[2]);
                              
                            }
                            ,
                            error:function(data){
                                alert(" Could not enything");
                            }
                        });
                        
                            var lot = $(this).closest("tr").find(".lot");
                             var xurl = "' . \yii::$app->getUrlManager()->createUrl('transadjust/getlot') . '";
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
                        
                        
                         $("table tbody>tr:last").clone(true).insertAfter("table tbody>tr:last");
                           $("table tbody>tr:last").each(function() {
                                
                                $(this).attr("id","2000");
                                $(this).find(".prodcode").val("");
                                $(this).find(".prodname").val("");
                                $(this).find(".transqty").val("");
                                $(this).find(".transunit").val("");
                                $(this).find(".wh").val("");
                                $(this).find(".loc").val("");
                                $(this).find(".lot").val("");
                        
                           }); 


                     });
                     
                  

                     $(".addline").click(function(){
                         var rowid = 0;
                         $("table tbody>tr:last").clone(true).insertAfter("table tbody>tr:last");
                           $("table tbody>tr:last").each(function() {
                                
                                $(this).attr("id","2000");
                                $(this).find(".prodcode").val("");
                                $(this).find(".prodname").val("");
                                $(this).find(".transqty").val("0");
                                $(this).find(".transunit").val("");
                                $(this).find(".wh").val("");
                                $(this).find(".loc").val("");
                                $(this).find(".lot").val("");
                              
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
                             tr.find(".saleqty").val("");
                             tr.find(".saleunit").val("");
                             tr.find(".wh").val("");
                             tr.find(".loc").val("");
                          
                         }else{ 
                            $("table tbody>tr:eq("+ rowindex +")").remove();
                         }
                     
                         
                     });
                     
                 /// GET LOC
                 
                    $("table tbody>tr").each(function(){
                    
                        $(this).find(".wh").change(function(){
                        var loc = $(this).closest("tr").find(".loc");
                             var xurl = "' . \yii::$app->getUrlManager()->createUrl('transadjust/getloc') . '";
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
                
                // UPDATE LINE
                
                $(".saveline").click(function(e){
                
                    var rowcount = 0;  //$("table tbody>tr").length;
                    
                    $("table tbody>tr").each(function(){
                        var prod = $(this).find(".prodcode").val();
                        if(prod !=""){rowcount +=1;}
                    });

                   // alert(rowcount);
                    if(rowcount <= 0){
                      e.preventDefault();
                         alert("อย่างน้อยคุณต้องมี 1 รายการสำหรับการบันทึกข้อมูล");
                         return;
                    }
                          var transid = $(".salenoid").attr("id");
                          var id = [];
                          var prodcode = [];
                          var qty = [];
                          var wh = [];
                          var loc = [];
                          var lot = [];
                         var unit = [];
                          
                          var i = 0;
                          $("tr").find(".tdgroup").find(".prodcode").each(function(){
                              if($(this).closest("tr").find(".prodcode").val() ==""){
                                return true;
                              }
                                id[i] =$(this).closest("tr").attr("id") ;
                                prodcode[i] =$(this).closest("tr").find(".prodcode").val();
                                qty[i] = $(this).closest("tr").find(".transqty").val();
                                wh[i] = $(this).closest("tr").find(".wh").val();
                                loc[i] = $(this).closest("tr").find(".loc").val();
                                lot[i] = $(this).closest("tr").find(".lot").val();
                                unit[i] = $(this).closest("tr").find(".transunit").val();
                                i++;
                            });
                        
                        //  alert(id);return;  
                       var Urls = "' . \yii::$app->getUrlManager()->createUrl('transadjust/updateline') . '";
                        run_waitme("#transadjust");
                        $.ajax({
                            type:"post",
                            dataType: "html",
                            url: Urls,
                            data:{transid: transid,id: id,prodcode: prodcode,qty: qty,wh: wh,loc: loc,lot: lot,unit: unit},
                            success: function(data){
                                    alert("Data save successfull"); 
                                    window.location.reload();
                                    //$("#pkdetail").waitMe("hide");
                                },
                            error:function(data){
                                alert(" Could not enything");
                                window.location.reload();
                            }
                        });
                });
                
                $(".postline").click(function(){
                   var transid = $(".salenoid").attr("id");
                    var Urls = "' . \yii::$app->getUrlManager()->createUrl('transadjust/postline') . '";
                      run_waitme("#transadjust");
                        $.ajax({
                            type:"post",
                            dataType: "html",
                            url: Urls,
                            data:{transid: transid},
                            success: function(data){
                                  if(data == 1){
                                    alert("Data posted");
                                    window.location.reload();
                                  }else{
                                    alert("No Adjustment line. Please save line before!");
                                   // window.location.reload();
                                   $("#transadjust").waitMe("hide");
                                  }
                                   //window.location.reload();
                                    //$("#transadjust").waitMe("hide");
                                },
                            error:function(data){
                                alert(" Could not enything");
                                window.location.reload();
                            }
                        });
                });
                
                    $("table tbody>tr").dblclick(function(){
              
                        var prodid = $(this).find(".prodcode").val();
                          var xurl = "' . \yii::$app->getUrlManager()->createUrl('productonhand/onhandline') . '";
                          $("#modal").modal("show")
                          .find("#showmodal")
                          .load(xurl+"&id="+ prodid);
                    });
                     
            });
        '
    );
    ?>