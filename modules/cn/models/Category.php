<?php 
namespace app\modules\cn\models;
use yii\db\ActiveRecord;
class Category extends ActiveRecord {
    public static function tableName(){
            return '{{%category}}';
    }

    public function getNavigationCategory(){
        $data = $this->find()->asArray()->where('head=1')->orderBy('sort ASC')->all();
        foreach($data as $k=>$v){
            $data[$k]['child'] = $this->find()->asArray()->where('pid='.$v['id'])->orderBy('sort ASC')->limit(5)->all();
        }
        return $data;
    }

    public function getAllCategory(){
        $data = $this->find()->asArray()->where("type = 1 AND pid =0")->orderBy('sort ASC')->all();
        foreach($data as $k => $v){
            $child = $this->find()->asArray()->where("pid={$v['id']}")->orderBy('sort ASC')->all();
            array_unshift($child,['name' => '全部','id' => $v['id']]);
            $data[$k]['child']=$child;
        }
        return $data;
    }
}
