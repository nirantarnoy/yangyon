<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\BomlistSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Bomlists';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bomlist-index">

    <h1><?php //echo Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Bomlist', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

           // 'recid',
            'bomname',
            'detail',
            'productid',
            'createby',
            // 'active',
            // 'approve',
            // 'fromdate',
            // 'todate',
            // 'createdate',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
