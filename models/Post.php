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
 * @property string|null $body
 * @property int|null $rating
 * @property string|null $status
 * @property int $category_id
 * @property int $profile_id
 *
 * @property Bookmark[] $bookmarks
 * @property Comment[] $comments
 * @property Category $category
 * @property Profile $profile
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
            [['date', 'topic', 'description', 'category_id', 'profile_id'], 'required'],
            [['date'], 'safe'],
            [['body'], 'string'],
            [['rating', 'category_id', 'profile_id'], 'integer'],
            [['topic'], 'string', 'max' => 50],
            [['description'], 'string', 'max' => 300],
            [['status'], 'string', 'max' => 45],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Category::className(), 'targetAttribute' => ['category_id' => 'category_id']],
            [['profile_id'], 'exist', 'skipOnError' => true, 'targetClass' => Profile::className(), 'targetAttribute' => ['profile_id' => 'id']],
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
            'category_id' => 'Category ID',
            'profile_id' => 'Profile ID',
        ];
    }

    /**
     * Gets query for [[Bookmarks]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBookmarks()
    {
        return $this->hasMany(Bookmark::className(), ['post_id' => 'post_id']);
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
     * Gets query for [[Profile]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProfile()
    {
        return $this->hasOne(Profile::className(), ['id' => 'profile_id']);
    }

    public static function getPostByPostId($post_id){
        return Post::find()->where(['post_id' => $post_id])->one();
    }


    public static function getPostsbyCategory($category)
    {
        $result = Post::find()
            ->joinWith(['category'])
            ->andWhere(['category.category_name' => $category])
            ->andWhere(['post.status' => 'unfrozen'])
            ->orderBy(['post.rating' => SORT_DESC]);
        return $result;
    }

    public static function getPostsbyProfileId($profile_id){
        $result = Post::find()
            ->joinWith(['category'])
            ->andWhere(['post.profile_id' => $profile_id])
            ->orderBy(['post.rating' => SORT_DESC]);
        return $result;
    }

    public static function test(){
        return Post::find()->joinWith(['profile'])->one();
    }
    //Getting followed posts in order to generate user's  feed with the latest
    //published articles created by authors he is subscribed on.
    //Using sub query ('getFollowedUsersAsArray') and using 'IN' operator
    //retrieving all posts made by authors.
    public static function getFollowedPosts($follower_id){
        $followed_users = Follower::getFollowedUsersAsArray($follower_id);
        $result = Post::find()
            ->andWhere(['profile_id' => $followed_users])
            ->andWhere(['status' => 'unfrozen'])
            ->orderBy(['date' => SORT_DESC]);
        return $result;
    }

    public static function getBookmarkedPosts($profile_id){
        $bookmarked_posts = Bookmark::getBookmarksAsArray($profile_id);
        $result = Post::find()
            ->where(['post_id' => $bookmarked_posts])
            ->orderBy(['date' => SORT_DESC]);
        return $result;
    }

    //posts of the current month
    public static function getPostsOfMonth($follower_id){
        $followed_posts = Post::getFollowedPosts($follower_id);
        return $followed_posts->andWhere(["MONTH(date)" => date('m')])->orderBy(['date' => SORT_DESC]);
    }


    //filters posts in order to make up a feed
    public static function getPostsOfInterval($follower_id, $condition){
        return Post::getPostsOfMonth($follower_id)->andWhere($condition);
    }

    //return associative array consisting of four parts (today's posts, yesterday's  , 'week's, 'month's)
    public static function getSortedPostsOfMonth($follower_id){
        $models = Post::getPostsOfMonth($follower_id)->all();
        $conds = [
            'Today' => "DATEDIFF(sysdate(), date) = 0",
            'Yesterday' => "DATEDIFF(sysdate(), date) = 1",
            'Week' => "DATEDIFF(sysdate(), date) <= 7",
            'Month' => "DATEDIFF(sysdate(), date) <= DAY(LAST_DAY(sysdate()))"
        ];
        $blocks = [];
        $start = 0;
        foreach ($conds as $key => $condition){
            $interval = Post::getPostsOfInterval($follower_id, $condition)->count();
            if ($interval != 0 && $start != count($models)){
                $blocks[$key] = array_slice($models, $start, $interval);
                $start += $interval;
            }
        }
        return $blocks;
    }

//    public static function getPostsByMonth
    //Return 'Post' object with the default values in order to insert
    //new possible entry
    public static function createPost()
    {
        $post = new Post;
        $post->date = date("Y-m-d");
        $post->rating = 0;
        $post->status = 'unfrozen';
        $post->profile_id = Yii::$app->user->identity->profile->id;
        return $post;
    }

    public function frozePost(){
        $this->status = 'frozen';
        return $this->save();
    }

    public function unfrozePost(){
        $this->status = 'unfrozen';
        return $this->save();
    }

    public function isBookmarked(){
        if (Bookmark::getBookmark($this->post_id)){
            return true;
        }
        return false;
    }

    public function add_bookmark($profile_id){
        $bookmark = new Bookmark();
        $bookmark->profile_id = $profile_id;
        $bookmark->post_id = $this->post_id;
        return $bookmark->save();
    }

    public function delete_bookmark($profile_id){
        return Bookmark::deleteAll(['profile_id' => $profile_id, 'post_id' => $this->post_id]);
    }

    public static function _addBookmarkDelete(){
        if (Yii::$app->request->isPost){
            $post_id = Yii::$app->request->post('post_id');
            $post = Post::getPostByPostId($post_id);
            if ($post){
                $profile_id = Yii::$app->user->identity->profile->id;
                $action = Yii::$app->request->post('action');
                if ($action == 'add_bookmark'){
                    if ($post->add_bookmark($profile_id)){
                        Yii::$app->session->addFlash("success", "Bookmarked");
                    }
                    else{
                        Yii::$app->session->addFlash("danger", "Can't add a new bookmark");
                    }
                }
                else{
                    if ($post->delete_bookmark($profile_id)){
                        Yii::$app->session->addFlash("success", "Bookmark was removed successfully");
                    }
                    else{
                        Yii::$app->session->addFlash("danger", "Can't remove bookmark");
                    }
                }
            }
            else{
                Yii::$app->session->addFlash("danger", "Post Doesn't exist");
            }
        }
    }

    public function getPostHeart(){
        return PostHeart::find()
            ->andWhere(['user_id' => Yii::$app->user->id])
            ->andWhere(['post_id' => $this->post_id])->one();
    }

    public function getHearts(){
        return $this->hasMany(PostHeart::class, ['post_id' => 'post_id']);
    }
}
