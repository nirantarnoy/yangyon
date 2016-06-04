<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Transadjust */

$this->title = 'Update Transadjust: ' . ' ' . $model->transno;
$this->params['breadcrumbs'][] = ['label' => 'Transadjusts', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->transno, 'url' => ['view', 'id' => $model->recid]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="transadjust-update">

    <!--    <h1><?php //echo Html::encode($this->title) ?></h1>-->

    <?= $this->render('_form', [
        'model' => $model,
        'modelline'=>$modelline,
    ]) ?>

</div>
