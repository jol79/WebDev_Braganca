<?php

namespace app\models;

use SebastianBergmann\Comparator\Book;
use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "bookmark".
 *
 * @property int $id
 * @property int $profile_id
 * @property int $post_id
 *
 * @property Profile $profile
 */
class Bookmark extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'bookmark';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['profile_id', 'post_id'], 'required'],
            [['profile_id', 'post_id'], 'integer'],
            [['profile_id'], 'exist', 'skipOnError' => true, 'targetClass' => Profile::className(), 'targetAttribute' => ['profile_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'profile_id' => 'Profile ID',
            'post_id' => 'Post ID',
        ];
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

    public static function getBookmark($post_id){
        $profile_id = Yii::$app->user->identity->profile->id;
        return Bookmark::find()
            ->andWhere(['profile_id' => $profile_id])
            ->andWhere(['post_id' => $post_id])
            ->one();
    }

    public function removeBookmak($profile_id){
        return Bookmark::deleteAll(['profile_id' => $profile_id, 'post_id' => $this->post_id]);
    }

    public static function addBookmark($profile_id, $post_id){
        $bookmark = new Bookmark();
        $bookmark->profile_id = $profile_id;
        $bookmark->post_id = $post_id;
        return $bookmark->save();
    }

    public static function getBookmarksAsArray($profile_id){
        $result = Bookmark::find()
            ->where(['profile_id' => $profile_id])
            ->asArray()
            ->all();
        return ArrayHelper::getColumn($result, 'post_id');
    }
}
