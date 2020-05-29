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
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    public static function getProfileByUserId($user_id){
        return Profile::find()->where(['user_id' => $user_id])->one();
    }

    public function subscribe($user_id){
        $model = new Follower();
        $model->follower_id = $user_id;
        $model->followed_id = $this->user_id;
        return $model->save();
    }

    public function unSubscribe($user_id){
        return Follower::deleteAll(['follower_id' => $user_id, 'followed_id' => $this->user_id]);
    }

    public function isSubscribed(){
        $user_id = Yii::$app->user->id;
        return Follower::find()
            ->where(['follower_id' => $user_id, "followed_id" => $this->user_id])->one();
    }
}
