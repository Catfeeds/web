<?php 
namespace app\modules\collection\models;
use yii\db\ActiveRecord;
class Category extends ActiveRecord {
    public $cateData;
    public $parent = [];

    public static function tableName(){
            return '{{%category}}';
    }

    public function getParentCategory($id){
        $data = $this->find()->asArray()->where("id=$id")->one();
        $category = $this->find()->asArray()->where("pid={$data['pid']}")->all();
        foreach($category as $k => $v){
            if($id == $v['id']){
                $category[$k]['checked'] = 1;
            }else{
                $category[$k]['checked'] = 0;
            }
        };
        $this->parent[] = $category;
        if($data['pid'] >0){
            $this->getParentCategory($data['pid']);
        }
        return array_reverse($this->parent);
    }
}
