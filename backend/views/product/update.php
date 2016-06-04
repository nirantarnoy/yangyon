<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Product */

$this->title = 'Update Product: ' . ' ' . $model->prodcode;
$this->params['breadcrumbs'][] = ['label' => 'Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->prodcode, 'url' => ['view', 'id' => $model->recid]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="product-update">

    <h1><?php //echo Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'modelplan' => $modelplan,
        'modelprodgroup' => $modelprodgroup,
        'modelprodcategory' => $modelprodcategory,
        'modelunit'=>$modelunit,
        'modelpacking'=>$modelpacking,
        'modelmodel'=>$modelmodel,
    ]) ?>

</div>
