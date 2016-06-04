<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\SaletableSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Sales Order';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="saletable-index">

    <!--    <h1><?php //echo Html::encode($this->title) ?></h1>-->
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

   
        <?= Html::a('Create Saletable', ['create'], ['class' => 'btn btn-success']) ?>
   
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

           // 'recid',
            'saleno',
            //'deliverydate',
            //'shipdate',
           // 'customerid',
            [
              'attribute'=>'customerid',
               'value'=>function($data){
                    return isset($data->customerid)?$data->customer->customername:'';
               }
            ],
             //'discount',
            // 'discountper',
            // 'vat',
            // 'discountamt',
            // 'discountperamt',
            // 'vatamt',
            // 'totalamt',
             'createdate',
            //'status',
                    [
                        'attribute'=>'status',
                        'value'=>function($data){
                            return $data->status == 0? 'Open':'Closed';
                        }
                    ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
