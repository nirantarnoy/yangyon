<?php
use yii\grid\GridView;
use yii\bootstrap\Modal;

$this->title = "Inventory Onhand";
?>
<?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'recid',
            'prodcode',
            'prodname',
           // 'realqty',
          //  'reserv',
            'qty',
            'minstock',
 //           'prodename',
//           // 'detail',
//            //'prodgroupid',
//            [
//              'attribute'=>'prodgroupid',
//                'value'=>function($model){
//                    return $model->group->groupname;
//                }
//            ],
//             //'prodcategoryid',
//                     [
//              'attribute'=>'prodcategoryid',
//                'value'=>function($model){
//                    return $model->category->categoryname;
//                }
//            ],
//            // 'planid',
//            // 'inventunit',
//                       [
//              'attribute'=>'inventunit',
//                'value'=>function($model){
//                    return $model->unit->unitname;
//                }
//            ],
//            // 'purchaseunit',
//            // 'saleunit',
//            // 'bomunit',
//            // 'isactive',
//            // 'photo',
//            // 'netweight',
//            // 'tareweight',
//            // 'grossweight',
//            // 'height',
//            // 'width',
//            // 'dept',
//            // 'density',
//            // 'minstock',
//            // 'maxstock',
//            // 'minorder',
//            // 'maxorder',
//            // 'multiple',
//            // 'prodtype',
//                    [
//                        'attribute'=>'prodtype',
//                        'value'=>function($model){
//                            return $model->prodtype ==0?"Parent":"Child";
//                        }
//                    ],
//            // 'cost',,
//            // 'costdate',
//            // 'packing',
//            // 'createby',
//            // 'createdate',
//            // 'modifydate',

          //  ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php
        Modal::begin([
            'header' => '<h3>Ohnand Details</h3>',
            'id' => 'modal',
            // 'data-backdrop'=>false,
            'size' => 'modal-lg',
            'headerOptions'=>[],
            'options' => ['data-backdrop' => 'static',
            ],
            'footer' => '<a href="#" class="btn btn-danger" data-dismiss="modal">ยกเลิก</a>',
        ]);
        echo "<div id='showmodal'></div>";
    
?>
<?php Modal::end();?>   
<?php $this->registerJs(
        ' 
            $(function(){
                $("table tbody>tr").each(function(){
                    var onhand = $(this).find("td:nth-child(4)").text().trim();
                    var min = $(this).find("td:nth-child(5)").text().trim();
                    if(parseInt(onhand) < parseInt(min)){
                        $(this).find("td:nth-child(4)").css("background-color","#F4A460");
                    }
                    $(this).dblclick(function(){
                   
                         var prodid = $(this).find("td:nth-child(2)").text().trim();
                          var xurl = "' . \yii::$app->getUrlManager()->createUrl('productonhand/onhandline') . '";
                          $("#modal").modal("show")
                          .find("#showmodal")
                          .load(xurl+"&id="+ prodid);
                    });
                   
                });
            });
        ' 
);?>