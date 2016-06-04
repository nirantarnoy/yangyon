<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Lotnumber */

$this->title = 'Update Lot number: ' . ' ' . $model->recid;
$this->params['breadcrumbs'][] = ['label' => 'Lotnumbers', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->recid, 'url' => ['view', 'recid' => $model->recid, 'prodid' => $model->prodid]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="lotnumber-update">

   <h1><?php //echo Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
