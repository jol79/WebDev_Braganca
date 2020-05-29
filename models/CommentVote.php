<?php

namespace app\models;

use amnah\yii2\user\models\User;
use Yii;

/**
 * This is the model class for table "comment_vote".
 *
 * @property int $id
 * @property int $comment_id
 * @property int $user_id
 * @property int|null $type
 *
 * @property Comment $comment
 * @property User $user
 */
class CommentVote extends \yii\db\ActiveRecord
{
    const TYPE_UPVOTE = 1;
    const TYPE_DOWNVOTE = 0;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'comment_vote';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['comment_id', 'user_id'], 'required'],
            [['comment_id', 'user_id', 'type'], 'integer'],
            [['comment_id'], 'exist', 'skipOnError' => true, 'targetClass' => Comment::className(), 'targetAttribute' => ['comment_id' => 'id']],
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
            'comment_id' => 'Comment ID',
            'user_id' => 'User ID',
            'type' => 'Type',
        ];
    }

    /**
     * Gets query for [[Comment]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getComment()
    {
        return $this->hasOne(Comment::className(), ['id' => 'comment_id']);
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

    static public function saveCommentVote($userId, $commentId, $type){
        $commentVote = new CommentVote();
        $commentVote->user_id = $userId;
        $commentVote->comment_id = $commentId;
        $commentVote->type = $type;
        $commentVote->save();
        return $commentVote;
    }

    static public function findByUserCommentUp($userId, $commentId){
        return CommentVote::find()
            ->andWhere([
                'comment_id' => $commentId,
                'user_id' => $userId,
                'type' => CommentVote::TYPE_UPVOTE
            ])->one();
    }

    static public function findByUserCommentDown($userId, $commentId){
        return CommentVote::find()
            ->andWhere([
                'comment_id' => $commentId,
                'user_id' => $userId,
                'type' => CommentVote::TYPE_DOWNVOTE
            ])->one();
    }
}
