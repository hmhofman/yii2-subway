<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Order */

$this->title = $model->meal;
$this->params['breadcrumbs'][] = ['label' => 'Orders', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="order-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'meal' => $model->meal, 'user' => $model->user], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'meal' => $model->meal, 'user' => $model->user], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'meal',
            'user',
            'subway',
            'bread',
            'topping',
            'veggies',
            'finish',
            'drink',
            'breadsize',
        ],
    ]) ?>

</div>
