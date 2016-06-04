<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Productarias */

$this->title = 'Update Productarias: ' . ' ' . $model->recid;
$this->params['breadcrumbs'][] = ['label' => 'Productarias', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->recid, 'url' => ['view', 'id' => $model->recid]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="productarias-update">

    <h1><?php //echo Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
         'modelprod'=>$modelprod,
                'modelvendor'=>$modelvendor,
    ]) ?>

</div>
