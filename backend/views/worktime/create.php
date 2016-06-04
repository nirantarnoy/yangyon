<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Worktime */

$this->title = 'Create Worktime';
$this->params['breadcrumbs'][] = ['label' => 'Worktimes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="worktime-create">

    <!--    <h1><?php //echo Html::encode($this->title) ?></h1>-->

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
