<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\UnitconversionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Unitconversions';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="unitconversion-index">

    <h1><?php //echo Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Unitconversion', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

        //    'recid',
            'prodid',
            'fromunit',
            'tounit',
            'fromfactor',
            // 'tofactor',
            // 'createdate',
            // 'updatedate',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
