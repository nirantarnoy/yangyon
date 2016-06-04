<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Saletable */

$this->title = 'Create Saletable';
$this->params['breadcrumbs'][] = ['label' => 'Saletables', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="saletable-create">

    <!--    <h1><?php //echo Html::encode($this->title) ?></h1>-->

    <?= $this->render('_form', [
        'model' => $model,
        'modelcust'=>$modelcust,
        'modelpayment'=>$modelpayment,
         'runno'=>$runno,
    ]) ?>

</div>
