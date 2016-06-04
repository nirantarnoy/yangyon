<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\bootstrap\Modal;
use kartik\date\DatePicker;
use yii\web\UrlManager;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\CalendarSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Calendars';
$this->params['breadcrumbs'][] = $this->title;


?>
<div class="calendar-index">

<!--    <h1><?php //echo Html::encode($this->title)   ?></h1>-->
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= Html::a('Create Calendar', ['create'], ['class' => 'btn btn-success']) ?>
    
    <div class="btn btn-default" id="btngenday"><i class="fa fa-calendar-o"></i> Generate Working Day</div>

    <?php
    Modal::begin([
        'header' => '<h4><b>Generate Work Time</b></h4>',
        'id' => 'modal',
        // 'data-backdrop'=>false,
        'size' => 'modal-sm',
        'options' => ['data-backdrop' => 'static',
        ],
        'footer' => '<a href="#" class="btn btn-primary" data-dismiss="modal">OK</a><a href="#" class="btn btn-danger" data-dismiss="modal">Cancel</a>',
    ]);
    echo "<div id='showmodal'></div>";
    ?>
<?php Modal::end() ?>
    

    <?php Pjax::begin(); ?>    
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            // 'recid',
            'calendarname',
            'detail',
            'createdate',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]);
    ?>
    <?php Pjax::end(); ?>
</div>

    

<?php $this->registerJs(
        ' 
            $(function(){
                $("#btngenday").click(function(){
                 var xurl = "' . \yii::$app->getUrlManager()->createUrl('calendar/showpop') . '";
                    $("#modal").modal("show")
                    .find("#showmodal")
                    .load(xurl);
                });
            });
        '
)?>