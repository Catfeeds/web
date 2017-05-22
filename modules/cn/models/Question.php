<?php
namespace app\modules\cn\models;
use yii\db\ActiveRecord;
use app\modules\cn\models\Content;
class Question extends ActiveRecord {
    public static function tableName(){
        return '{{%question}}';
    }
}
