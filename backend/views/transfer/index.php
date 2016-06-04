<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\TransferSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Transfers';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="transfer-index">

     <!--    <h1><?php //echo Html::encode($this->title) ?></h1>-->
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    
        <?= Html::a('Create Transfer', ['create'], ['class' => 'btn btn-success']) ?>
   
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

           // 'recid',
            //'transtype',
            'transno',
            'deatail',
            //'docref',
            'transdate',
             [
                        'attribute'=>'status',
                        'value'=>function($data){
                            return $data->status == 0? 'Open':'Closed';
                        }
                    ],
            // 'createdate',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
