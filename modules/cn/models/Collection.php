<?php 
namespace app\modules\cn\models;
use app\libs\Pager;
use app\modules\cn\models\DiscussPlat;
use yii\db\ActiveRecord;
class Collection extends ActiveRecord {
    public static function tableName(){
            return '{{%collection}}';
    }

}
