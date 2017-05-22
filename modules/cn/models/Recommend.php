<?php 
namespace app\modules\cn\models;
use app\libs\Pager;
use app\modules\cn\models\DiscussPlat;
use yii\db\ActiveRecord;
class Recommend extends ActiveRecord {
    public static function tableName(){
            return '{{%recommend}}';
    }

    public function getAllRecommend(){
        $sql = "select f.* from {{%recommend}} r LEFT JOIN {{%flower}} f on r.flowerId=f.id limit 4";
        $data = \Yii::$app->db->createCommand($sql)->queryAll();
        return $data;
    }
}
