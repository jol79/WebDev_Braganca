<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "category".
 *
 * @property int $category_id
 * @property string $category_name
 * @property string|null $category_icon_class
 */
class Category extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'category';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['category_name'], 'required'],
            [['category_name', 'category_icon_class'], 'string', 'max' => 45],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'category_id' => 'Category ID',
            'category_name' => 'Category Name',
            'category_icon_class' => 'Category Icon Class',
        ];
    }

    public static function getIcons(){
        return Category::find()->select(['category_icon_class', 'category_name'])->all();
    }


    //Getting all names of existing categories and structure them as the associative
    //array to in order pass to a dropDown menu, assigning keys of the array to a value
    //attribute and values a visible for a user options
    public static function getAllAsArray(){
        $query = Category::find()->asArray()->all();
        $structured_data = ArrayHelper::map($query, 'category_id', 'category_name');
        return $structured_data;

    }
}
