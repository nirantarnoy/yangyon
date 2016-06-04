<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Vendor */

$this->title = 'Update Vendor: ' . ' ' . $model->recid;
$this->params['breadcrumbs'][] = ['label' => 'Vendors', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->recid, 'url' => ['view', 'id' => $model->recid]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="vendor-update">

<!--    <h1><?php //echo Html::encode($this->title) ?></h1>-->

    <?= $this->render('_form', [
        'model' => $model,
        'modelgroup'=>$modelgroup,
    ]) ?>

</div>
