<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Bomlist */

$this->title = 'Create Bomlist';
$this->params['breadcrumbs'][] = ['label' => 'Bomlists', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bomlist-create">

    <h1><?php //echo Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
