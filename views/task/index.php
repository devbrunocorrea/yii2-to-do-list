<?php

use app\models\Task;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\TaskSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Tasks';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="task-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Task', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <div class="task-search">
        <h2>Filter:</h2>

        <?php $form = ActiveForm::begin([
            'method' => 'get',
        ]); ?>

        <?= $form->field($searchModel, 'due_date')->input('date') ?> 

        <?= $form->field($searchModel, 'status')->dropDownList([
            '' => 'All',
            'pending' => 'Pending',
            'doing' => 'Doing',
            'done' => 'Done',
        ]) ?>

        <div class="form-group">
            <?= Html::submitButton('Filter', ['class' => 'btn btn-primary']) ?>
            <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
        </div>

        <?php ActiveForm::end(); ?>
    </div>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        // 'filterModel' => $searchModel,
        'columns' => [
            'title',
            [
                'attribute' => 'description',
                'format' => 'raw', 
                'value' => function ($model) {
                    return substr($model->description, 0, 50)  . '...';
                },
            ],
            'priority',
            'status',
            'due_date',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Task $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
