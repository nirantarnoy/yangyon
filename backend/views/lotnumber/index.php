<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\LotnumberSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Lot numbers';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lotnumber-index">

<!--    <h1><?php //echo Html::encode($this->title) ?></h1>-->
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Lotnumber', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

           // 'recid',
            [
                'attribute'=>'prodid',
                'value'=>function($model){
                    return $model->prodid?$model->products->prodcode:'';
                }
            ],
            'lotnumbercode',
            'detail',
            //'startdate',
            // 'enddate',
             'createdate',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
