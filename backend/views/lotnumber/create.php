<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Lotnumber */

$this->title = 'Create Lot number';
$this->params['breadcrumbs'][] = ['label' => 'Lotnumbers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lotnumber-create">

    <h1><?php //echo Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
