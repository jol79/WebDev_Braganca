<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%feedback}}`.
 */
class m200529_211107_create_feedback_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%feedback}}', [
            'id_feedback' => $this->primaryKey()->unique(),
            'created_at' => $this->dateTime(),
            'message' => $this->string(280)->notNull(),
            'local_time' => $this->dateTime()
        ]);
        $this->alterColumn('{{%feedback}}', 'id_feedback', $this->primaryKey().'AUTO_INCREMENT');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%feedback}}', [
            'id_feedback' => $this->primaryKey()->unique().'NOT NULL AUTO_INCREMENT',
            'created_at' => $this->dateTime(),
            'message' => $this->string(280)->notNull(),
            'local_time' => $this->dateTime()
        ]);
    }
}