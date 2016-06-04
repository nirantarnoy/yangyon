<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Productmodel */

$this->title = 'Update Model: ' . ' ' . $model->recid;
$this->params['breadcrumbs'][] = ['label' => 'Productmodels', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->recid, 'url' => ['view', 'id' => $model->recid]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="productmodel-update">

    <h1><?php //echo Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
