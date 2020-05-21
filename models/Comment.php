<?php

namespace app\models;

use amnah\yii2\user\models\User;
use Yii;

/**
 * This is the model class for table "comment".
 *
 * @property int $id
 * @property string $created_at
 * @property string $text
 * @property int $user_id
 * @property int $post_id
 * @property int|null $upvote
 * @property int|null $downvote
 *
 * @property Post $post
 * @property User $user
 */
class Comment extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'comment';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['created_at'], 'safe'],
            [['text', 'user_id'], 'required'],
            [['user_id', 'post_id', 'upvote', 'downvote'], 'integer'],
            [['text'], 'string', 'max' => 512],
            [['post_id'], 'exist', 'skipOnError' => true, 'targetClass' => Post::className(), 'targetAttribute' => ['post_id' => 'post_id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'created_at' => 'Created At',
            'text' => 'Text',
            'user_id' => 'User ID',
            'post_id' => 'Post ID',
            'upvote' => 'Upvote',
            'downvote' => 'Downvote',
        ];
    }

    /**
     * Gets query for [[Post]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPost()
    {
        return $this->hasOne(Post::className(), ['post_id' => 'post_id']);
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

}
