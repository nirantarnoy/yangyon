<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Product */

$this->title = $model->prodcode;
$this->params['breadcrumbs'][] = ['label' => 'Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-view">

    <h1><?php //echo Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->recid], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->recid], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'recid',
            'prodname',
            'prodename',
            'detail',
            'prodgroupid',
            'prodcategoryid',
            'planid',
            'inventunit',
            'purchaseunit',
            'saleunit',
            'bomunit',
            'isactive',
            'photo',
            'netweight',
            'tareweight',
            'grossweight',
            'height',
            'width',
            'dept',
            'density',
            'minstock',
            'maxstock',
            'minorder',
            'maxorder',
            'multiple',
            'prodtype',
            'cost',
            'costdate',
            'packing',
            'createby',
            'createdate',
            'modifydate',
        ],
    ]) ?>

</div>
