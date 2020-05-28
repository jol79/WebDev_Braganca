<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%comment_vote}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%comment}}`
 * - `{{%user}}`
 */
class m200527_182120_create_comment_vote_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%comment_vote}}', [
            'id' => $this->primaryKey(),
            'comment_id' => $this->integer(11)->notNull(),
            'user_id' => $this->integer(11)->notNull(),
            'type' => $this->integer(1),
        ]);

        // creates index for column `comment_id`
        $this->createIndex(
            '{{%idx-comment_vote-comment_id}}',
            '{{%comment_vote}}',
            'comment_id'
        );

        // add foreign key for table `{{%comment}}`
        $this->addForeignKey(
            '{{%fk-comment_vote-comment_id}}',
            '{{%comment_vote}}',
            'comment_id',
            '{{%comment}}',
            'id',
            'CASCADE'
        );

        // creates index for column `user_id`
        $this->createIndex(
            '{{%idx-comment_vote-user_id}}',
            '{{%comment_vote}}',
            'user_id'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-comment_vote-user_id}}',
            '{{%comment_vote}}',
            'user_id',
            '{{%user}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%comment}}`
        $this->dropForeignKey(
            '{{%fk-comment_vote-comment_id}}',
            '{{%comment_vote}}'
        );

        // drops index for column `comment_id`
        $this->dropIndex(
            '{{%idx-comment_vote-comment_id}}',
            '{{%comment_vote}}'
        );

        // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-comment_vote-user_id}}',
            '{{%comment_vote}}'
        );

        // drops index for column `user_id`
        $this->dropIndex(
            '{{%idx-comment_vote-user_id}}',
            '{{%comment_vote}}'
        );

        $this->dropTable('{{%comment_vote}}');
    }
}
