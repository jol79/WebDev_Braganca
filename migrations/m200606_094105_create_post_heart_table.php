<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%post_heart}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%post}}`
 * - `{{%user}}`
 */
class m200606_094105_create_post_heart_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%post_heart}}', [
            'id' => $this->primaryKey(),
            'post_id' => $this->integer(11)->notNull(),
            'user_id' => $this->integer(11)->notNull(),
        ]);

        // creates index for column `post_id`
        $this->createIndex(
            '{{%idx-post_heart-post_id}}',
            '{{%post_heart}}',
            'post_id'
        );

        // add foreign key for table `{{%post}}`
        $this->addForeignKey(
            '{{%fk-post_heart-post_id}}',
            '{{%post_heart}}',
            'post_id',
            '{{%post}}',
            'post_id',
            'CASCADE'
        );

        // creates index for column `user_id`
        $this->createIndex(
            '{{%idx-post_heart-user_id}}',
            '{{%post_heart}}',
            'user_id'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-post_heart-user_id}}',
            '{{%post_heart}}',
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
        // drops foreign key for table `{{%post}}`
        $this->dropForeignKey(
            '{{%fk-post_heart-post_id}}',
            '{{%post_heart}}'
        );

        // drops index for column `post_id`
        $this->dropIndex(
            '{{%idx-post_heart-post_id}}',
            '{{%post_heart}}'
        );

        // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-post_heart-user_id}}',
            '{{%post_heart}}'
        );

        // drops index for column `user_id`
        $this->dropIndex(
            '{{%idx-post_heart-user_id}}',
            '{{%post_heart}}'
        );

        $this->dropTable('{{%post_heart}}');
    }
}
