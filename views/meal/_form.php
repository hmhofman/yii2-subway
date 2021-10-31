<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;


/* @var $this yii\web\View */
/* @var $model app\models\Meal */
/* @var $form yii\widgets\ActiveForm */

$users = [];
$users[Yii::$app->user->id] = Yii::$app->user->identity->username;
//if ($model->user_id !== Yii::$app->user->id) {
//    $user = \app\models\User::find($model->user_id)->one();
//    $users[$user->id] = $user->username;
//}
//if (Yii::$app->user->identity->isAdmin()) {
    $dummy = app\models\User::find()->all();
    foreach ($dummy as $record) {
        $users[$record->id] = $record->username;
    }
//}
if (!$model->date) {
    $model->date = new DateTime();
    if (intval(date('H')) > 13) {
        $model->date->modify('+1 day');
    }
    while (in_array($model->date->format('w'), [0,6])) {
        $model->date->modify('+1 day');
    }
    $model->opened_at = new DateTime();
    $model->opened_by = Yii::$app->user->id;
}

?>

<div class="meal-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php // echo $form->field($model, 'date')->textInput() ?>

    <?= $form->field($model, 'date')->widget(\yii\jui\DatePicker::classname(), ['options' => ['class' => 'form-control']]) ?>

    <?= $form->field($model, 'opened_at')->widget(\yii\jui\DatePicker::classname(), ['options' => ['class' => 'form-control']]) ?>
    <?= $form->field($model, 'opened_by')->dropDownList($users, ['prompt' => ''])->label('Opened by') ?>

    <?= $form->field($model, 'closed_at')->widget(\yii\jui\DatePicker::classname(), ['options' => ['class' => 'form-control']]) ?>
    <?= $form->field($model, 'closed_by')->dropDownList($users, ['prompt' => ''])->label('Closed by') ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
