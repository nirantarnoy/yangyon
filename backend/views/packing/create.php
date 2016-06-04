<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Packing */

$this->title = 'Create Packing';
$this->params['breadcrumbs'][] = ['label' => 'Packings', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="packing-create">

     <h1><?php //echo Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
