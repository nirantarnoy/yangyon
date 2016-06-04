<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Worktime */

$this->title = 'Update Worktime: ' . ' ' . $model->worktimename;
$this->params['breadcrumbs'][] = ['label' => 'Worktimes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->worktimename, 'url' => ['view', 'id' => $model->recid]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="worktime-update">

   <!--    <h1><?php //echo Html::encode($this->title) ?></h1>-->

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
