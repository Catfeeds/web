<?php
namespace app\modules\goods\models;
use yii\db\ActiveRecord;
class Video extends ActiveRecord {
    public $cateData;

    public static function tableName(){
        return '{{%video}}';
    }

}