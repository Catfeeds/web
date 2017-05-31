<?php 
namespace app\modules\cn\models;
use app\modules\cn\models\Book;
use app\modules\cn\models\Course;
use app\modules\cn\models\En;
use app\modules\cn\models\Smart;
use app\modules\cn\models\Vip;
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

    public function getParentCategoryArr($id){
        $data = $this->find()->asArray()->where("id=$id")->one();
        $this->category[] = $data;
        if($data['pid'] >0){
            $this->getParentCategoryArr($data['pid']);
        }
        return $this->category;
    }

    public function getChildCategory($id){
        $category = $this->find()->asArray()->where("pid=$id")->all();
        if(count($category)>0){
            $this->category[] = $category;
        }
    }
    /**
     * 获取内容属性值
     * by  yanni
     */
    public function getContentExtend($catId){
        $model = new Goods();
        $cat = $model->getChild($catId);
        $data = Course::find()->asArray()->where(['in' , 'catId' , $cat])->orderBy('startTime desc')->limit(4)->all();
        return $data;
    }

    /**
     * 获取分类内容
     * by  yanni
     */
    public function getCategoryContent($catIds){
        $cats = array();
        foreach($catIds as $v) {
            $model = new Goods();
            $cats[] = $model->getChild($v);
        }
        $cat = $this->arrToOne($cats);
        $data = Course::find()->asArray()->where(['in' , 'catId' , $cat])->orderBy('startTime desc')->limit(4)->all();
        return $data;
    }

    /**
     * 获取留学分类内容
     * by  yanni
     */
    public function getSmatContent($catId){
        $model = new Goods();
        $cat = $model->getChild($catId);
        $data = Smart::find()->asArray()->where(['in' , 'catId' , $cat])->orderBy('createTime desc')->limit(4)->all();
        return $data;
    }
    /**
     * 获取英语分类内容
     * by  yanni
     */
    public function getEnglishContent($catId){
        $model = new Goods();
        $cat = $model->getChild($catId);
        $data = En::find()->asArray()->where(['in' , 'catId' , $cat])->orderBy('createTime desc')->limit(4)->all();
        return $data;
    }

    /**
     * 获取书籍分类内容
     * by  yanni
     */
    public function getBookContent($catId){
        $model = new Goods();
        $cat = $model->getChild($catId);
        $data = Book::find()->asArray()->where(['in' , 'catId' , $cat])->orderBy('createTime desc')->limit(10)->all();
        return $data;
    }

    /**
     * 获取vip分类内容
     * by  yanni
     */
    public function getVipContent($catId){
        $model = new Goods();
        $cat = $model->getChild($catId);
        $data = Vip::find()->asArray()->where(['in' , 'catId' , $cat])->orderBy('createTime desc')->limit(4)->all();
        return $data;
    }
    /**
     * 多维数组转换成一维数组
     * by  yanni
     */
    public function arrToOne($arr) {
        $data = array();
        foreach ($arr as $key => $val) {
            if( is_array($val) ) {
                $data = array_merge($data, $this->arrToOne($val));
            } else {
                $data[] = $val;
            }
        }
        return $data;
    }
}
