<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Meal */

$this->title = "Meal ({$model->id}): {$model->date}";
$this->params['breadcrumbs'][] = ['label' => 'Meals', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);

$openedBy = null;
$closedBy = null;
if ($model->opened_by) {
    if ($model->opened_by == Yii::$app->user->identity->id) {
        $openedBy = Yii::$app->user->identity;
    } else {
        $openedBy = \app\models\User::find($model->opened_by)->one();
    }
}
if ($model->closed_by) {
    if ($model->closed_by == Yii::$app->user->identity->id) {
        $closedBy = Yii::$app->user->identity;
    } elseif ($model->closed_by == $model->opened_by) {
        $closedBy = $opened_by;
    } else {
        $closedBy = \app\models\User::find($model->closed_by)->one();
    }
}
?>
<div class="meal-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php if (Yii::$app->user->identity->isAdmin()) : ?>
    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>
    <?php endif; ?>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'date', // ['label' => 'date', 'value' => date($model->date)
            ['label' => 'Opened By', 'value' => $openedBy ? $openedBy->username : null], //'opened_by',
            'opened_at',
            ['label' => 'Closed By', 'value' => $closedBy ? $closedBy->username : null], //'closed_by',
            'closed_at',
        ],
    ]) ?>

</div>
