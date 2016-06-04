<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Vendorgroup */

$this->title = 'Create Vendorgroup';
$this->params['breadcrumbs'][] = ['label' => 'Vendorgroups', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="vendorgroup-create">

   <h1><?php //echo Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
