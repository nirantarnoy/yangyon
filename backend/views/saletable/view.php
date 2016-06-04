<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Saletable */

$this->title = $model->saleno;
$this->params['breadcrumbs'][] = ['label' => 'Saletables', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="saletable-view">

<!--    <h1><?php //echo Html::encode($this->title) ?></h1>-->

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
            'saleno',
            'deliverydate',
            'shipdate',
            'customerid',
            'discount',
            'discountper',
            'vat',
            'discountamt',
            'discountperamt',
            'vatamt',
            'totalamt',
            'createdate',
        ],
    ]) ?>

</div>
