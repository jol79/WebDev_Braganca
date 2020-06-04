<?php

namespace app\models;

use Yii;
use amnah\yii2\user\models\User;

/**
 * This is the model class for table "profile".
 *
 * @property int $id
 * @property int $user_id
 * @property string|null $created_at
 * @property string|null $updated_at
 * @property string|null $timezone
 * @property string|null $full_name
 * @property string|null $status
 * @property string|null $about
 * @property string|null $image_name
 *
 * @property Bookmark[] $bookmarks
 * @property Post[] $posts
 * @property User $user
 */
class Profile extends \amnah\yii2\user\models\Profile
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'profile';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id'], 'required'],
            [['user_id'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['timezone', 'full_name', 'status', 'about', 'image_name'], 'string', 'max' => 255],
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
            'user_id' => 'User ID',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'timezone' => 'Timezone',
            'full_name' => 'Full Name',
            'status' => 'Status',
            'about' => 'About',
            'image_name' => 'Image Name',
        ];
    }

    /**
     * Gets query for [[Bookmarks]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBookmarks()
    {
        return $this->hasMany(Bookmark::className(), ['profile_id' => 'id']);
    }

    /**
     * Gets query for [[Posts]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPosts()
    {
        return $this->hasMany(Post::className(), ['profile_id' => 'id']);
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


    public static function getProfileByProfileId($profile_id){
        return Profile::find()->where(['id' => $profile_id])->one();
    }

    public function subscribe($profile_id){
        $model = new Follower();
        $model->follower_id = $profile_id;
        $model->followed_id = $this->id;
        return $model->save();
    }

    public function unSubscribe($profile_id){
        return Follower::deleteAll(['follower_id' => $profile_id, 'followed_id' => $this->id]);
    }

    public function isSubscribed(){
        $profile_id = Yii::$app->user->identity->profile->id;
        return Follower::find()
            ->where(['follower_id' => $profile_id, "followed_id" => $this->id])->one();
    }

}
