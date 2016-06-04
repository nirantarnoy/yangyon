<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Productonhand */

$this->title = 'Create Productonhand';
$this->params['breadcrumbs'][] = ['label' => 'Productonhands', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="productonhand-create">

     <!--    <h1><?php //echo Html::encode($this->title) ?></h1>-->

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
