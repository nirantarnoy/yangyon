<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Productarias */

$this->title = 'Create Product alias';
$this->params['breadcrumbs'][] = ['label' => 'Product alias', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="productarias-create">

<!--    <h1><?php //echo Html::encode($this->title) ?></h1>-->

    <?= $this->render('_form', [
        'model' => $model,
         'modelprod'=>$modelprod,
                'modelvendor'=>$modelvendor,
    ]) ?>

</div>
