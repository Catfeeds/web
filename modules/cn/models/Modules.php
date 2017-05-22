<?php 
namespace app\modules\cn\models;
use app\libs\Pager;
use app\modules\cn\models\DiscussPlat;
use yii\db\ActiveRecord;
class Modules extends ActiveRecord {
    public static function tableName(){
            return '{{%modules}}';
    }

    public function getAllModules($location){
        $data = $this->find()->asArray()->where('status =1 and location='.$location)->all();
        foreach($data as $k => $v){
            if($v['relateCategory']){
                $data[$k]['category'] = Category::find()->asArray()->where("id in ({$v['relateCategory']})")->all();
            }else{
                $data[$k]['category'] = [];
            }
            $sql = "select f.* from {{%flower}} f left join {{%modules_flower}} mf ON f.id=mf.flowerId WHERE mf.moduleId = {$v['id']} ORDER BY f.sort ASC";
            $data[$k]['flower'] = \Yii::$app->db->createCommand($sql)->queryAll();
        }
        return $data;
    }
}
