<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\ProductonhandSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Productonhands';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="productonhand-index">

     <!--    <h1><?php //echo Html::encode($this->title) ?></h1>-->
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

   
        <?php //echo Html::a('Create Productonhand', ['create'], ['class' => 'btn btn-success']) ?>
    
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'recid',
            'prodid',
            'warehouseid',
            'locationid',
            'lotid',
             'serialid',
             'realqty',
             'reservqty',
             'qty',
            // 'status',
            // 'createdate',

           // ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
