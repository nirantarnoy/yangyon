<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Unitconversion */

$this->title = 'Update Unitconversion: ' . ' ' . $model->recid;
$this->params['breadcrumbs'][] = ['label' => 'Unitconversions', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->recid, 'url' => ['view', 'id' => $model->recid]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="unitconversion-update">

    <h1><?php //echo Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
