<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Meals';
$this->params['breadcrumbs'][] = $this->title;

$columns = [
    //['class' => 'yii\grid\SerialColumn'],

    'id',
    'date',
    'opened_at',
    'opened_by',
    'closed_at',
    'closed_by',
];


if (Yii::$app->user->identity->isAdmin()) {
    $columns[] = ['class' => 'yii\grid\ActionColumn'];
}
?>
<div class="meal-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php if (Yii::$app->user->identity->isAdmin()) : ?>
    <p>
        <?= Html::a('Create Meal', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?php endif; ?>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => $columns,
    ]); ?>


</div>
