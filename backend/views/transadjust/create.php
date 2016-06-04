<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Transadjust */

$this->title = 'Create Adjust';
$this->params['breadcrumbs'][] = ['label' => 'Transadjusts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="transadjust-create">

    <!--    <h1><?php //echo Html::encode($this->title) ?></h1>-->

    <?= $this->render('_form', [
        'model' => $model,
        'runno'=>$runno,
    ]) ?>

</div>
