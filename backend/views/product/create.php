<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Product */

$this->title = 'Create Product';
$this->params['breadcrumbs'][] = ['label' => 'Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-create">

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
