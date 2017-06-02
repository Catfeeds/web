<?php 
namespace app\modules\cn\models;
use app\libs\Pager;
use app\modules\cn\models\DiscussPlat;
use yii\db\ActiveRecord;
class UserEvaluate extends ActiveRecord {
    public static function tableName(){
            return '{{%user_evaluate}}';
    }

}
