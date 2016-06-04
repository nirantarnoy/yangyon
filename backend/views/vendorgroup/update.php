<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Vendorgroup */

$this->title = 'Update Vendorgroup: ' . ' ' . $model->recid;
$this->params['breadcrumbs'][] = ['label' => 'Vendorgroups', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->recid, 'url' => ['view', 'id' => $model->recid]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="vendorgroup-update">

    <h1><?php //echo Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
