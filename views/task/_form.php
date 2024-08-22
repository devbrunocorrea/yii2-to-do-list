<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\datetime\DateTimePicker;

/** @var yii\web\View $this */
/** @var app\models\Task $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="task-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'status')->dropDownList([
        'pending' => 'Pending',
        'doing' => 'Doing',
        'done' => 'Done',
    ]) ?>

    <?= $form->field($model, 'priority')->dropDownList([
        'low' => 'Low',
        'medium' => 'Medium',
        'high' => 'High',
    ]) ?>

    <?= $form->field($model, 'due_date')->input('date', [
        'placeholder' => 'Select due date'
    ]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
