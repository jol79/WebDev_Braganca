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

    public static function getPosterId($comment_id)
    {
        $comment = Comment::findOne($comment_id);
        if($comment)
            return $comment->user_id;
        else
            return null;
    }

    public static function deleteComment($comment_id)
    {
        $comment = Comment::findOne($comment_id);
        return $comment->delete();
    }

    public static function getPostId($comment_id)
    {
        $comment = Comment::findOne($comment_id);
        if($comment)
            return $comment->post_id;
        else
            return null;
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
            [['downvote', 'upvote'], 'default', 'value' => 0]
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

    public function isUpvotedBy($userId){
        $commentVote = CommentVote::findByUserCommentUp($userId, $this->id);

        if($commentVote){
            return true;
        } else {
            return false;
        }
    }

    public function isDownvotedBy($userId){
        $commentVote = CommentVote::findByUserCommentDown($userId, $this->id);

        if($commentVote){
            return true;
        } else {
            return false;
        }
    }

    public function getUpvotes(){
        return $this->hasMany(CommentVote::class, ['comment_id' => 'id'])
            ->andWhere(['type' => CommentVote::TYPE_UPVOTE]);
    }

    public function getDownvotes(){
        return $this->hasMany(CommentVote::class, ['comment_id' => 'id'])
            ->andWhere(['type' => CommentVote::TYPE_DOWNVOTE]);
    }

}
