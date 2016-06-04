<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Productgroup */

$this->title = 'Update Productgroup: ' . ' ' . $model->groupname;
$this->params['breadcrumbs'][] = ['label' => 'Productgroups', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->groupname, 'url' => ['view', 'id' => $model->recid]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="productgroup-update">

    <h1><?php //echo Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
