<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Task $model */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Tasks', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="task-view">

    <h1><?= Html::encode($model->title) ?>  (<?= Html::encode($model->priority) ?>)</h1>
    
    <p class="text-muted">
        <small>Created At: <b><?php echo Yii::$app->formatter->asRelativeTime($model->created_at); ?></b>
    
        By: <b><?php echo $model->createdBy->username ?></b>
    </small>
    </p>

    <p><?= Html::encode($model->description) ?></p>

    <p>
        <?= Html::a('Edit', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Remove', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

</div>
