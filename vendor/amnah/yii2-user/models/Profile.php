<?php

namespace amnah\yii2\user\models;

use app\models\Follower;
use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "tbl_profile".
 *
 * @property integer $id
 * @property integer $user_id
 * @property string $created_at
 * @property string $updated_at
 * @property string $full_name
 * @property string $timezone
 * @property string $status
 * @property string $about
 * @property string $image_name
 *
 *
 * @property User $user
 */
class Profile extends ActiveRecord
{
    /**
     * @var \amnah\yii2\user\Module
     */
    public $module;

    /**
     * @inheritdoc
     */
    public function init()
    {
        if (!$this->module) {
            $this->module = Yii::$app->getModule("user");
        }
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['full_name'], 'string', 'max' => 255],
            [['timezone'], 'string', 'max' => 255],
            [['status'], 'string', 'max' => 255],
            [['about'], 'string', 'max' => 255],
            [['image_name'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('user', 'ID'),
            'user_id' => Yii::t('user', 'User ID'),
            'created_at' => Yii::t('user', 'Created At'),
            'updated_at' => Yii::t('user', 'Updated At'),
            'full_name' => Yii::t('user', 'Full Name'),
            'timezone' => Yii::t('user', 'Time zone'),
            'status' => Yii::t('user', 'Status'),
            'about' => Yii::t('user', 'About')
        ];
    }

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'timestamp' => [
                'class' => 'yii\behaviors\TimestampBehavior',
                'value' => function ($event) {
                    return gmdate("Y-m-d H:i:s");
                },
            ],
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        $user = $this->module->model("User");
        return $this->hasOne($user::className(), ['id' => 'user_id']);
    }

    /**
     * Set user id
     * @param int $userId
     * @return static
     */
    public function setUser($userId)
    {
        $this->user_id = $userId;
        return $this;
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