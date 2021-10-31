<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Order */

$this->title = "Meal of {$model->meal0->date} for {$model->user0->username}";
$this->params['breadcrumbs'][] = ['label' => 'Orders', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="order-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'meal_id' => $model->meal_id, 'user_id' => $model->user_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'meal_id' => $model->meal_id, 'user_id' => $model->user_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>
    <?php
    //$model->meal0;
    //die('<pre>'.print_r(['$model' => $model], true)).'</pre>';?>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            ['label'=> 'Meal',      'value' => $model->meal0    ? $model->meal0->date : null],
            ['label'=> 'User',      'value' => $model->user0    ? $model->user0->username : null],
            ['label'=> 'Subway',    'value' => $model->subway0  ? $model->subway0->name : null],
            ['label'=> 'Bread',     'value' => $model->bread0   ? $model->bread0->name : null],
            ['label'=> 'Size (cm)', 'value' => $model->breadsize],
            ['label'=> 'Topping',   'value' => $model->topping0 ? $model->topping0->name : null],
            ['label'=> 'Veggies',   'value' => $model->veggies0 ? $model->veggies0->name : null],
            ['label'=> 'Finish',    'value' => $model->finish0  ? $model->finish0->name : null],
            ['label'=> 'Drink',     'value' => $model->drink0   ? $model->drink0->name : null],
        ],
    ]) ?>

</div>
