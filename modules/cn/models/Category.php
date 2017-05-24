<?php 
namespace app\modules\cn\models;
use yii\db\ActiveRecord;
class Category extends ActiveRecord {
    public $category;
    public static function tableName(){
            return '{{%category}}';
    }

    public function getNavigationCategory(){
        $data = $this->find()->asArray()->where('head=1')->orderBy('sort ASC')->all();
        foreach($data as $k=>$v){
            $data[$k]['child'] = $this->find()->asArray()->where('pid='.$v['id'])->orderBy('sort ASC')->all();
        }
        return $data;
    }

    public function getRelateAllCategory($catId){
        $this->getParentCategory($catId);
        $this->category = array_reverse($this->category);
        $this->getChildCategory($catId);
        return $this->category;
    }

    public function getParentCategory($id){
        $data = $this->find()->asArray()->where("id=$id")->one();
        $category = $this->find()->asArray()->where("pid={$data['pid']} AND type={$data['type']}")->all();
        foreach($category as $k => $v){
            if($id == $v['id']){
                $category[$k]['checked'] = 1;
            }else{
                $category[$k]['checked'] = 0;
            }
        };
        $this->category[] = $category;
        if($data['pid'] >0){
            $this->getParentCategory($data['pid']);
        }
    }

    public function getChildCategory($id){
        $category = $this->find()->asArray()->where("pid=$id")->all();
        if(count($category)>0){
            $this->category[] = $category;
        }
    }
}
