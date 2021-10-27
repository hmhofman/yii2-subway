<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Order */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="order-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'meal')->textInput(['readOnly' => 'readOnly', 'disabled' => 'disabled', 'title' => 'Only the open meal is available'])->label('Meal date') ?>

    <?= $form->field($model, 'user')->dropDownList([], ['readOnly' => 'readOnly', 'disabled' => 'disabled', 'title' => 'You can only enter an order for yourself']) ?>

    <?= $form->field($model, 'subway')->textInput() ?>

    <?= $form->field($model, 'bread')->textInput() ?>

    <?= $form->field($model, 'breadsize')->dropDownList([ 15 => '15', 30 => '30', ], ['prompt' => ''])->label('Size (in cm)') ?>

    <?= $form->field($model, 'topping')->textInput() ?>

    <?= $form->field($model, 'veggies')->textInput() ?>

    <?= $form->field($model, 'finish')->textInput() ?>

    <?= $form->field($model, 'drink')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
