<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Calendar */

$this->title = 'Update Calendar: ' . ' ' . $model->calendarname;
$this->params['breadcrumbs'][] = ['label' => 'Calendars', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->calendarname, 'url' => ['view', 'id' => $model->recid]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="calendar-update">

   <h1><?php //echo Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
