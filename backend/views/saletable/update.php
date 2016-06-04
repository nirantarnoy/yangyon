<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Saletable */

$this->title = 'Update Sales Order: ' . ' ' . $model->saleno;
$this->params['breadcrumbs'][] = ['label' => 'Saletables', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->saleno, 'url' => ['view', 'id' => $model->recid]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="saletable-update">

  <!--    <h1><?php //echo Html::encode($this->title) ?></h1>-->

    <?= $this->render('_form', [
        'model' => $model,
        'modelline'=>$modelline,
        'modelcust'=>$modelcust,
                'modelpayment'=>$modelpayment,
    ]) ?>

</div>
