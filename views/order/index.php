<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Orders';
$this->params['breadcrumbs'][] = $this->title;

if (!Yii::$app->user->identity) {
    Yii::$app->response->redirect('/index.php?r=site/login');
}
//die('<pre>'.print_r(['Yii::$app->user' => get_class_methods(Yii::$app->user)], true));


$columns = [
    ['class' => 'yii\grid\SerialColumn'],
    ['label' => 'Meal', 'value' => function($data) {return $data->meal0 ? $data->meal0->date : null;}], //'meal',
    ['label' => 'User', 'value' => function($data) {return $data->user0 ? $data->user0->username : null;}], //'user',
    ['label' => 'Subway', 'value' => function($data) {return $data->user0 ? $data->subway0->name : null;}], //'user',
    ['label' => 'Bread', 'value' => function($data) {return $data->bread0 ? $data->bread0->name : null;}], //'user',
    //'topping',
    //'veggies',
    //'finish',
    //'drink',
    //'breadsize',

    ['class' => 'yii\grid\ActionColumn'],
];
if (!Yii::$app->user->identity || !Yii::$app->user->identity->isAdmin()) {
    unset($columns[2]);
}
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
        'columns' => $columns
    ]); ?>


</div>
