<?php


namespace app\models;

use Codeception\PHPUnit\ResultPrinter\HTML;
use Yii;
use Yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * Class Feedback
 * @package app\models
 *
 * @property string $created_at
 * @property string $current_time
 * @property string $local_time
 */

class Feedback extends \yii\db\ActiveRecord
{

    /**
     * function to print all from table
     */
    public static function getAllComments()
    {
        $query = Feedback::find()->all();

        // exception if data that we fetch from DB will be empty:
        $exception = "Unfortunatelly, the DB of this resource if empty, you can
         be the first person who leave the comment";

        if (empty($query)){

            Yii::$app->session->setFlash('info', 'Unfortunatelly there is no comments, its your chance to be the first user who leave the comment');

        } else {
            return $query;
        }
    }

    /**
     * function to get data with limit of 2 comments:
     */
    public static function getLimitComments()
    {
        $query = Feedback::find()->limit(2);

        if (empty($query)){

            Yii::$app->session->setFlash('info', 'Unfortunatelly there is no comments, its your chance to be the first user who leave the comment');

        } else {
            return $query;
        }
    }

    /**
     * @inheritdoc
     */
    public function rules(){

        return [
            ['message', 'required'],
            ['created_at', 'string'],
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
                'updatedAtAttribute' => false,
                'value' => function ($event) {
                    return gmdate("Y-m-d H:i:s");
                },
            ],
        ];
    }

    /**
     * getting the current date/time of the comments:
     *
     */
    public function comment_date()
    {

        $model->created_at = gmdate("Y-m-d H:i:s");
        $model->current_time = gmdate("Y-m-d H:i:s");

    }

    /**
     * function to print difference between server time and posted feedback
     *
     */
//    public function diff_time()
//    {
////        $diff = strtotime('current_time')-strtotime('created_at');
//        $diff = strtotime($this->created_at)-strtotime($this->current_time);
//
//        $hours = floor($diff/(60*60));                  // formula for hours
//        $mins = floor(($diff - ($hours*60*60)) / 60);   // formula for minutes
//
//        $local_time = $hours. ':'.sprintf("%02d", $mins);
////        return $local_time;
//        return parent::diff_time();
//    }

    public function search($params){
        $query = Feedback::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 2
            ]
        ]);

        $this->load($params);

        if(!$this->validate()){
            return $dataProvider;
        }

        $query->andFilterWhere(['like', 'id_feedback', $this->id_feedback])
            ->andFilterWhere(['like', 'message', $this->created_at])
            ->andFilterWhere(['like', 'created_at', $this->created_at]);

        return $dataProvider;

    }
}