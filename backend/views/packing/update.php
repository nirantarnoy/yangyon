<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Packing */

$this->title = 'Update Packing: ' . ' ' . $model->recid;
$this->params['breadcrumbs'][] = ['label' => 'Packings', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->recid, 'url' => ['view', 'id' => $model->recid]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="packing-update">

    <h1><?php //echo Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
