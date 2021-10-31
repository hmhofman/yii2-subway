<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Order */

$this->title = 'Update Order at ' . ($model->meal0 ? $model->meal0->date : '(not set)').' for user '.($model->user0 ? $model->user0->username : '(not set)');
$this->params['breadcrumbs'][] = ['label' => 'Orders', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->meal0->date, 'url' => ['view', 'meal_id' => $model->meal_id, 'user_id' => $model->user_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="order-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'meal' => null,
    ]) ?>

</div>
