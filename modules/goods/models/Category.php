<?php 
namespace app\modules\goods\models;
use yii\db\ActiveRecord;
class Category extends ActiveRecord {
    public $cateData;
    public $childCat = [];
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

    /**
     * 获取子Id
     * @param $selectId
     * @Obelisk
     */
    public function getChild($catId){
        $sign = Category::find()->asArray()->where("pid=$catId")->all();
        if(count($sign)>0){
            $this->childCat[] = $catId;
            foreach($sign as $v){
                $this->getChild($v['id']);
            }
        }else{
            $this->childCat[] = $catId;
        }
        return $this->childCat;
    }
}
