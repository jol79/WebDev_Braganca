<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "profile".
 *
 * @property int $id
 * @property int $user_id
 * @property string|null $created_at
 * @property string|null $updated_at
 * @property string|null $full_name
 * @property string|null $timezone
 *
 * @property Follower[] $followers
 * @property Follower[] $followers0
 * @property Profile[] $profiles
 * @property Profile[] $followers1
 * @property User $user
 */
class Profile extends \yii\db\ActiveRecord
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
            [['full_name', 'timezone'], 'string', 'max' => 255],
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
            'full_name' => 'Full Name',
            'timezone' => 'Timezone',
        ];
    }

    /**
     * Gets query for [[Followers]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFollowers()
    {
        return $this->hasMany(Follower::className(), ['follower_id' => 'id']);
    }

    /**
     * Gets query for [[Followers0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFollowers0()
    {
        return $this->hasMany(Follower::className(), ['profile_id' => 'id']);
    }

    /**
     * Gets query for [[Profiles]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProfiles()
    {
        return $this->hasMany(Profile::className(), ['id' => 'profile_id'])->viaTable('follower', ['follower_id' => 'id']);
    }

    /**
     * Gets query for [[Followers1]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFollowers1()
    {
        return $this->hasMany(Profile::className(), ['id' => 'follower_id'])->viaTable('follower', ['profile_id' => 'id']);
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
