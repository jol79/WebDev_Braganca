<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * Class CommentForm needs for comment part on the home page
 * @package app\models
 *
 */
class CommentForm extends Model
{

    /* Initializing variables for our form */
    public $text;
    public $username;
    /*  */
    public $message;

    /**
     * @return string[]
     * @inheritdoc
     */
    public function tablename()
    {
        return [
            'text' => 'Comment',
        ];
    }

    /**
     * @return array the validation rules.
     */
    public function rules(){
        return [
            /* informs user that text form required */
            [ 'text', 'required', 'message' => 'this form cannot be empty' ],
        ];
    }

    /**
     * @return array|\yii\db\ActiveRecord[]
     */
    public static function getAllComments()
    {
        $query = Feedback::find()->all();
        return $query;
    }

    /**
     * validating data from user
     */
    public function validateInput(){

        /* If user input is empty information that its cannot be empty */
        if (empty($this->text)){
            $this->addError('text', 'Cannot be empty');

        }else{
//            Yii::app->
        }
    }

    /**
     * function to submit data from input form and put in the DB:
     * @return bool                     informs in comment passed validation process or not
     * @return string $data_feedback    varible for data that we will get from input form
     */
//    public function submit($data){
//        Yii::$app
//    }

}