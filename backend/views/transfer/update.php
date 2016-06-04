<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Transfer */

$this->title = 'Update Transfer: ' . ' ' . $model->transno;
$this->params['breadcrumbs'][] = ['label' => 'Transfers', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->transno, 'url' => ['view', 'id' => $model->recid]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="transfer-update">

    <!--    <h1><?php //echo Html::encode($this->title) ?></h1>-->

    <?= $this->render('_form', [
        'model' => $model,
        'modelline'=>$modelline,
    ]) ?>

</div>
