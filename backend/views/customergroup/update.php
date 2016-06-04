<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Customergroup */

$this->title = 'Update Customergroup: ' . ' ' . $model->recid;
$this->params['breadcrumbs'][] = ['label' => 'Customergroups', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->recid, 'url' => ['view', 'id' => $model->recid]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="customergroup-update">

   <!--    <h1><?php //echo Html::encode($this->title) ?></h1>-->

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
