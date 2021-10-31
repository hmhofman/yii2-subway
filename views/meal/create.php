<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Meal */

$this->title = 'Create Meal';
$this->params['breadcrumbs'][] = ['label' => 'Meals', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="meal-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php if (Yii::$app->user->identity->isAdmin()) : ?>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

    <?php else : ?>
    <div class="alert alert-danger" role="alert">
        Only Admins can create meals
    </div>

    <?php endif; ?>

</div>
