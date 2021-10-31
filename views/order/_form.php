<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Order */
/* @var $form yii\widgets\ActiveForm */
$meals = [];
if (!isset($meal) || !$meal) {
    $meal = $model->meal0;
}
if ($meal) {
    $meals[$meal->id] = $meal->date;
}
if ($model->meal_id && $meal && $meal->id !== $model->meal_id) {
    $meal = Meal::find($model->meal_id);
    if ($meal) {
        $meals[$meal->id] = $meal->date;
    }

}

$users = [];
$users[Yii::$app->user->id] = Yii::$app->user->identity->username;
if ($model->user_id !== Yii::$app->user->id) {
    $user = \app\models\User::find($model->user_id)->one();
    $users[$user->id] = $user->username;
}
// Here's room to add more users, but only the admin should be allowed to do so...
if (Yii::$app->user->identity->isAdmin()) {
    $dummy = app\models\User::find()->all();
    foreach ($dummy as $record) {
        $users[$record->id] = $record->username;
    }
}

$subway = [];
$dummy = app\models\subway\Subway::find()->all();
foreach ($dummy as $record) {
    $subway[$record->id] = $record->name;
}

$bread = [];
$dummy = app\models\subway\Bread::find()->all();
foreach ($dummy as $record) {
    $bread[$record->id] = $record->name;
}

$topping = [];
$dummy = app\models\subway\Topping::find()->all();
foreach ($dummy as $record) {
    $topping[$record->id] = $record->name;
}

$veggies = [];
$dummy = app\models\subway\Veggy::find()->all();
foreach ($dummy as $record) {
    $veggies[$record->id] = $record->name;
}

$finish = [];
$dummy = app\models\subway\Finish::find()->all();
foreach ($dummy as $record) {
    $finish[$record->id] = $record->name;
}

$drink = [];
$dummy = app\models\subway\Drink::find()->all();
foreach ($dummy as $record) {
    $drink[$record->id] = $record->name;
}


$fieldProperties = [];
if ($meal->closed_at || $model->user_id != Yii::$app->user->id) {
    $fieldProperties['readOnly'] = 'readOnly';
    $fieldProperties['disabled'] = 'disabled';
}

//die('<pre>'.print_r(['$model' => $model, '$dummy' => $dummy, '$meal' => $meal, '$model->meal0' => $model->meal0], true));

?>
<div class="order-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'meal_id')->dropDownList(
            $meals,
            array_merge($fieldProperties, ['readOnly' => 'readOnly', 'title' => 'Only the open meal is available'])
        )->label('Meal date') ?>

    <?= $form->field($model, 'user_id')->dropDownList($users, array_merge($fieldProperties, ['title' => 'You can only enter an order for yourself'])) ?>

    <?= $form->field($model, 'subway_id')->dropDownList($subway, array_merge($fieldProperties, ['prompt' => ''])) ?>

    <?= $form->field($model, 'bread_id')->dropDownList($bread, array_merge($fieldProperties, ['prompt' => ''])) ?>

    <?= $form->field($model, 'breadsize')->dropDownList([ 15 => '15', 30 => '30'], array_merge($fieldProperties, ['prompt' => '']))->label('Size (in cm)') ?>

    <?= $form->field($model, 'topping_id')->dropDownList($topping, array_merge($fieldProperties, ['prompt' => ''])) ?>

    <?= $form->field($model, 'veggies_id')->dropDownList($veggies, array_merge($fieldProperties, ['prompt' => ''])) ?>

    <?= $form->field($model, 'finish_id')->dropDownList($finish, array_merge($fieldProperties, ['prompt' => ''])) ?>

    <?= $form->field($model, 'drink_id')->dropDownList($drink, array_merge($fieldProperties, ['prompt' => ''])) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>