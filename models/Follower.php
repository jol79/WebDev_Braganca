<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "follower".
 *
 * @property int $id
 * @property int $follower_id
 * @property int $followed_id
 *
 * @property Profile $follower
 * @property Profile $followed
 */
class Follower extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'follower';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['follower_id', 'followed_id'], 'required'],
            [['follower_id', 'followed_id'], 'integer'],
            [['follower_id'], 'exist', 'skipOnError' => true, 'targetClass' => Profile::className(), 'targetAttribute' => ['follower_id' => 'id']],
            [['followed_id'], 'exist', 'skipOnError' => true, 'targetClass' => Profile::className(), 'targetAttribute' => ['followed_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'follower_id' => 'Follower ID',
            'followed_id' => 'Followed ID',
        ];
    }

    /**
     * Gets query for [[Follower]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFollower()
    {
        return $this->hasOne(Profile::className(), ['id' => 'follower_id']);
    }

    /**
     * Gets query for [[Followed]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFollowed()
    {
        return $this->hasOne(Profile::className(), ['id' => 'followed_id']);
    }

    public static function getFollowedUsersAsArray($follower_id){
        $result = Follower::find()
            ->where(['follower_id' => $follower_id])
            ->asArray()
            ->all();
        return ArrayHelper::getColumn($result, 'followed_id');
    }
}
