<?php

namespace app\services;

use app\models\Task;
use yii\web\NotFoundHttpException;

class TaskService
{
    public function createTask($data)
    {
        $task = new Task();
        $task->load($data);

        if ($task->validate() && $task->save()) {
            return $task;
        }

        return null;
    }

    public function updateTask($id, $data)
    {
        $task = $this->findTask($id);
        $task->load($data);

        if ($task->validate() && $task->save()) {
            return $task;
        }

        return null;
    }

    public function deleteTask($id)
    {
        $task = $this->findTask($id);
        return $task->delete();
    }

    public function findTask($id)
    {
        if (($task = Task::findOne($id)) !== null) {
            return $task;
        }

        throw new NotFoundHttpException('The requested task does not exist.');
    }
}
