<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Productcategory */

$this->title = 'Update Productcategory: ' . ' ' . $model->categoryname;
$this->params['breadcrumbs'][] = ['label' => 'Productcategories', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->categoryname, 'url' => ['view', 'id' => $model->recid]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="productcategory-update">

    <h1><?php //echo Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
