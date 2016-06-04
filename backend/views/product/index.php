<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\ProductSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Products';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-index">

<!--   <h1><?php //echo Html::encode($this->title) ?></h1>-->
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <div style="width: 100%;height: 50px;background-color: #ffffff">
        <?= Html::a('Create Product', ['create'], ['class' => 'btn btn-success']) ?>
    </div>
        
  
<?php Pjax::begin(); ?>    
<?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'recid',
            'prodcode',
            'prodname',
            'prodename',
           // 'detail',
            //'prodgroupid',
            [
              'attribute'=>'prodgroupid',
                'value'=>function($model){
                    return isset($model->prodgroupid)?$model->groups->groupname:'';
                }
            ],
             //'prodcategoryid',
                     [
              'attribute'=>'prodcategoryid',
                'value'=>function($model){
                    return isset($model->prodcategoryid)?$model->category->categoryname:'';
                }
            ],
            // 'planid',
            // 'inventunit',
                       [
              'attribute'=>'inventunit',
                'value'=>function($model){
                    return isset($model->inventunit)?$model->unit->unitname:'';
                }
            ],
            // 'purchaseunit',
            // 'saleunit',
            // 'bomunit',
            // 'isactive',
            // 'photo',
            // 'netweight',
            // 'tareweight',
            // 'grossweight',
            // 'height',
            // 'width',
            // 'dept',
            // 'density',
            // 'minstock',
            // 'maxstock',
            // 'minorder',
            // 'maxorder',
            // 'multiple',
            // 'prodtype',
//                    [
//                        'attribute'=>'prodtype',
//                        'value'=>function($model){
//                            return $model->prodtype ==0?"Parent":"Child";
//                        }
//                    ],
            // 'cost',,
            // 'costdate',
            // 'packing',
            // 'createby',
            // 'createdate',
            // 'modifydate',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
