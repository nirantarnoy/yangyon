<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Warehouse */

$this->title = 'Update Warehouse: ' . ' ' . $model->warehousename;
$this->params['breadcrumbs'][] = ['label' => 'Warehouses', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->warehousename, 'url' => ['view', 'id' => $model->recid]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="warehouse-update">

    <h1><?php //echo Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
