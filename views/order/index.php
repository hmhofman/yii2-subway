<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Orders';
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="order-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?php if ($meal): ?>
        <?= Html::a('Create Order', ['create'], ['class' => 'btn btn-success']) ?>
        <?php else : ?>
        No open meals (yet).
        <?php endif; ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'meal',
            //'user',
            'subway',
            'bread',
            //'topping',
            //'veggies',
            //'finish',
            //'drink',
            //'breadsize',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
