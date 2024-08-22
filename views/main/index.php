<?php

/** @var yii\web\View $this */

$this->title = 'My Yii Application';
?>
<div class="site-index">

    <div class="jumbotron text-center bg-transparent mt-5 mb-5">
        <h1 class="display-4">To-do List APP</h1>

        <p class="lead">Create and manage your tasks</p>

        <p><a class="btn btn-lg btn-success" href="<?php echo Yii::$app->user->isGuest ? 'main/login': 'task/index' ?>">I need to manage my tasks</a></p>
    </div>

</div>
