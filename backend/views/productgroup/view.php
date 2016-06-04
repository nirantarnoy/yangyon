<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Productgroup */

$this->title = $model->groupname;
$this->params['breadcrumbs'][] = ['label' => 'Productgroups', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="productgroup-view">

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
            'groupname',
            'detail',
            'createdate',
        ],
    ]) ?>

</div>
