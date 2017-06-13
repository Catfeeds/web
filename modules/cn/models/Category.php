<?php 
namespace app\modules\cn\models;
use app\modules\cn\models\Book;
use app\modules\cn\models\Course;
use app\modules\cn\models\En;
use app\modules\cn\models\Smart;
use app\modules\cn\models\Vip;
use app\libs\Pager;
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
     * 获取内容
     * by  yanni
     */
    public function getContentExtend($catId,$limit=4){
        $model = new Goods();
        $cat = $model->getChild($catId);
        $where = " status=2 and catId in (".implode(",",$cat).")";
        $sign = Category::findOne($catId);
        $models = $this->getModel($sign['type']);
        $data = $models->find()->asArray()->where($where)->orderBy('createTime desc')->limit($limit)->all();
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
        $data = Course::find()->asArray()->where(['in' , 'catId' , $cat])->where("status=2")->orderBy('startTime desc')->limit(4)->all();
        return $data;
    }

    /**
     * 搜索内容
     * by  yanni
     */
    public function getSelectContent($where,$page,$pageSize){
        $limit = " limit ".($page-1)*$pageSize.",$pageSize";
        $sql = "select a.* from (select co.id,co.name,co.catId from {{%course}} as co union all select en.id,en.name,en.catId from {{%en}} as en union all select s.id,s.name,s.catId from {{%smart}} as s union all select v.id,v.name,v.catId from {{%vip}} as v union all select b.id,b.name,b.catId from {{%book}} as b) as a where $where";
        $count = count(\Yii::$app->db->createCommand($sql)->queryAll());
        $sql .= " $limit";
        $data = \Yii::$app->db->createCommand($sql)->queryAll();
        foreach($data as $k=>$v){
            $res = Category::find()->asArray()->where("id=".$v['catId'])->one();
            $models = $this->getModel($res['type']);
            $value = $models->find()->asArray()->where("id=".$v['id'])->one();
            $extend = Extend::find()->asArray()->where("type=".$res['type'])->orderBy(" id asc ")->limit(2)->all();
            $data[$k]['type'] = $res['type'];
            $data[$k]['image'] = $value['image'];
            $data[$k]['price'] = $value['price'];
            $data[$k]['sales'] = $value['sales'];
            $data[$k]['url'] = $value['url'];
            $data[$k]['extendOne'] = '';
            $data[$k]['extendOneName'] = '';
            $data[$k]['extendTwo'] = '';
            $data[$k]['extendTwoName'] = '';
            if(!empty($extend)){
                $data[$k]['extendOne'] = $value[$extend[0]['value']];
                $data[$k]['extendOneName'] = $extend[0]['name'];
                $data[$k]['extendTwo'] = $value[$extend[1]['value']];
                $data[$k]['extendTwoName'] =$extend[1]['name'];
            }
        }
        $pageModel = new Pager($count,$page,$pageSize);
        $pageStr = $pageModel->GetPagerContent();
        return ['data' => $data,'pageStr' => $pageStr];
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
    /**
     * @param $type
     * @return Book|Course|En|Smart|Vip
     * @Obelisk
     */
    private function getModel($type){
        switch ($type){
            case 1: $model = new Course();break;
            case 2: $model = new Smart();break;
            case 3: $model = new En();break;
            case 4: $model = new Book();break;
            case 5: $model = new Vip();break;
        }
        return $model;
    }
}
