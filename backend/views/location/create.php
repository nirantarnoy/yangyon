<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Location */

$this->title = 'Create Location';
$this->params['breadcrumbs'][] = ['label' => 'Locations', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="location-create">

    <h1><?php //echo Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'modelwh' => $modelwh,
    ]) ?>

</div>
