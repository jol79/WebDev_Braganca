<?php

namespace app\models;

use Yii;
use amnah\yii2\user\models\User;

/**
 * This is the model class for table "post".
 *
 * @property int $post_id
 * @property string $date
 * @property string $topic
 * @property string $description
 * @property string $body
 * @property int|null $rating
 * @property string|null $status
 * @property int $user_id
 * @property int $category_id
 *
 * @property Comment[] $comments
 * @property Category $category
 * @property User $user
 */
class Post extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'post';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['date', 'topic', 'description', 'body', 'user_id', 'category_id'], 'required'],
            [['date'], 'safe'],
            [['body'], 'string'],
            [['rating', 'user_id', 'category_id'], 'integer'],
            [['topic'], 'string', 'max' => 50],
            [['description'], 'string', 'max' => 300],
            [['status'], 'string', 'max' => 45],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Category::className(), 'targetAttribute' => ['category_id' => 'category_id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'post_id' => 'Post ID',
            'date' => 'Date',
            'topic' => 'Topic',
            'description' => 'Description',
            'body' => 'Body',
            'rating' => 'Rating',
            'status' => 'Status',
            'user_id' => 'User ID',
            'category_id' => 'Category ID',
        ];
    }

    /**
     * Gets query for [[Comments]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getComments()
    {
        return $this->hasMany(Comment::className(), ['post_id' => 'post_id']);
    }

    /**
     * Gets query for [[Category]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['category_id' => 'category_id']);
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

    public static function getPosts($category)
    {
        $result = Post::find()
            ->joinWith(['category', 'user'])
            ->where(['category.category_name' => $category])
            ->orderBy(['post.rating' => SORT_DESC]);
        return $result;
    }

    public static function createPost()
    {
        $post = new Post;
        $post->date = date("Y-m-d");
        $post->rating = 0;
        $post->status = 'active';
        $post->user_id = Yii::$app->user->id;
        return $post;

    }
}
