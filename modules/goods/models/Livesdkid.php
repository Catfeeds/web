<?php
namespace app\modules\goods\models;
use yii\db\ActiveRecord;
class Livesdkid extends ActiveRecord {
    public $cateData;

    public static function tableName(){
        return '{{%livesdkid}}';
    }

}