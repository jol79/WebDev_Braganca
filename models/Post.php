<?php

namespace app\models;



use yii\db\ActiveRecord;

/**
 * This is the model class for table "post".
 *
 * @property int $post_id
 * @property string $date
 * @property int|null $rating
 * @property string $code
 * @property string|null $status
 * @property int $user_id
 * @property int $category_id
 * @property string|null $topic
 *
 * @property Category $category
 * @property User $user
 */
class Post extends ActiveRecord
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
            [['date', 'code', 'user_id', 'category_id'], 'required'],
            [['date'], 'safe'],
            [['rating', 'user_id', 'category_id'], 'integer'],
            [['code'], 'string'],
            [['status', 'topic'], 'string', 'max' => 45],
            [['category_id'], 'integer'],
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
            'rating' => 'Rating',
            'code' => 'Code',
            'status' => 'Status',
            'user_id' => 'User ID',
            'category_id' => 'Category ID',
            'topic' => 'Topic',
        ];
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

    public function getPosts($category){
        $query = (new \yii\db\Query())
            ->select(['post.rating', 'post.topic', 'post.code', 'user.username', 'category.category_name'])
            ->from('post')
            ->innerJoin('user', 'post.user_id = user.id')
            ->innerJoin( 'category', 'post.category_id = category.category_id')
            ->where(['category.category_name' => $category])->all();
        return $query;
    }
}
