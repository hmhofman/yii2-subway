<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Order */

$this->title = 'Create Order';
$this->params['breadcrumbs'][] = ['label' => 'Orders', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

if (!$meal) : ?>
There is NO ative meal. Activate a meal first.
<?php else :
    //echo '<pre >'.print_r(['$meal' => $meal, 'user' => Yii::$app->user], true);
    //die();
    $model->meal_id = $meal->id;
    $model->user_id = Yii::$app->user->id;
?>
<div class="order-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'meal' => $meal
    ]) ?>

</div>
<?php endif;
