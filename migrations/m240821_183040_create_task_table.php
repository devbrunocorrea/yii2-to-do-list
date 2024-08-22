<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%task}}`.
 */
class m240821_183040_create_task_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%task}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string()->notNull(),
            'description' => $this->text()->notNull(),
            'status' => $this->string()->notNull(),
            'priority' => $this->string()->notNull(),
            'due_date' => $this->date()->notNull(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
            'created_by' => $this->integer()->notNull(),
        ]);
        
        $this->addForeignKey(
            'fk-task-created_by',
            'task',
            'created_by',
            'user',
            'id',
            'CASCADE',
            'CASCADE'   
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey(
            'fk-task-created_by',
            'task'
        );
        $this->dropTable('{{%task}}');
    }
}
