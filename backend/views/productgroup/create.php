<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Productgroup */

$this->title = 'Create Product group';
$this->params['breadcrumbs'][] = ['label' => 'Productgroups', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="productgroup-create">

    <h1><?php //echo Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
