<?php
namespace app\models;

use Yii;
use yii\base\Model;
use yii\web\UploadedFile;

class UploadForm extends Model
{
    /**
     * @var UploadedFile
     */
    public $imageFile;
    //'skipOnEmpty' makes image uploading optional
    public function rules()
    {
        return [
            [['imageFile'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg'],
        ];
    }

    public function upload($user_id, $model)
    {
//        $this->imageFile->extension;
        if ($this->validate()) {
            $uploadDir = Yii::getAlias('@webroot/avatars/');
            $image_name = "user$user_id." . 'png';
            $this->imageFile->saveAs($uploadDir . $image_name);
            $model->image_name = $image_name;
            if ($model->save()){
                return true;
            }
        } else {
            return false;
        }

    }
}