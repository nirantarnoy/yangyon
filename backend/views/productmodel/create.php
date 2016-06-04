<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Productmodel */

$this->title = 'Create Model';
$this->params['breadcrumbs'][] = ['label' => 'Productmodels', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="productmodel-create">

<!--    <h1><?php //echo Html::encode($this->title) ?></h1>-->

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
