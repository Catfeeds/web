<?php 
namespace app\modules\content\models;
use yii\db\ActiveRecord;
class Extend extends ActiveRecord {
    public $cateData;

    public static function tableName(){
            return '{{%extend}}';
    }

}
