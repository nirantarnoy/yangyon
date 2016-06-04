<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Transissue */

$this->title = 'Create Issue';
$this->params['breadcrumbs'][] = ['label' => 'Transissues', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="transissue-create">

   <!--    <h1><?php //echo Html::encode($this->title) ?></h1>-->

    <?= $this->render('_form', [
        'model' => $model,
        'runno'=>$runno,
    ]) ?>

</div>
