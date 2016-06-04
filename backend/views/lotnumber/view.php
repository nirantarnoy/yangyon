<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Lotnumber */

$this->title = $model->recid;
$this->params['breadcrumbs'][] = ['label' => 'Lotnumbers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lotnumber-view">

    <h1><?php //echo Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'recid' => $model->recid, 'prodid' => $model->prodid], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'recid' => $model->recid, 'prodid' => $model->prodid], [
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
            'prodid',
            'lotnumbercode',
            'detail',
            'startdate',
            'enddate',
            'createdate',
        ],
    ]) ?>

</div>
