<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\SequenceSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Sequences';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sequence-index">

   <h1><?php //echo Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Sequence', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

           // 'recid',
            'activitytype',
            'activitysubtype',
            'prefix',
            'startno',
            // 'endno',
            // 'createdate',
            // 'createby',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
