<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Bomlist */

$this->title = 'Update Bomlist: ' . ' ' . $model->bomname;
$this->params['breadcrumbs'][] = ['label' => 'Bomlists', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->bomname, 'url' => ['view', 'id' => $model->recid]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="bomlist-update">

    <h1><?php //echo Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
