<?php
/**
 * 全局模块管理
 * Created by PhpStorm.
 * User: obelisk
 * Date: 15-6-17
 * Time: 下午2:37
 */
namespace app\modules\goods\controllers;

use app\modules\goods\models\Basket;
use app\modules\goods\models\Book;
use app\modules\goods\models\Category;
use app\modules\goods\models\Course;
use app\modules\goods\models\En;
use app\modules\goods\models\Extend;
use app\modules\goods\models\Goods;
use app\modules\goods\models\FlowerCategory;
use app\modules\goods\models\Smart;
use app\modules\goods\models\Vip;
use yii;
use app\libs\AppControl;
class GoodsController extends AppControl {
    function init(){
        parent::init();
    }
    public $enableCsrfValidation = false;
    public $purpose;
    public $flower;
    public $object;
    public $flowerNum;
    public $priceCategory;
    public $classification;
    public $colour;
    /**
     * 用途
     * @return string
     */
    public function actionIndex()
    {
        $beginTime  = Yii::$app->request->get('beginTime','');
        $page  = Yii::$app->request->get('page',1);
        $type  = Yii::$app->request->get('type');
        if($type){
            Yii::$app->session->set('goodsType',$type);
        }
        $endTime  = Yii::$app->request->get('endTime','');
        $id  = Yii::$app->request->get('id','');
        $goodsNumber  = Yii::$app->request->get('goodsNumber','');
        $purpose  = Yii::$app->request->get('purpose','');//用途
        $flower  = Yii::$app->request->get('flower','');//花材
        $object  = Yii::$app->request->get('object','');//对象
        $flowerNum  = Yii::$app->request->get('flowerNum','');//支数
        $priceCategory  = Yii::$app->request->get('priceCategory','');//价格分类
        $status  = Yii::$app->request->get('status','');//状态
        $where = "1=1";
        if($beginTime){
            $where .= " AND DATEDIFF(f.createTime,'$beginTime')>0";
        }
        if($endTime){
            $where .= " AND DATEDIFF(f.createTime,'$endTime')<0";
        }
        if($goodsNumber){
            $where .= " AND f.goodsNumber = $goodsNumber";
        }
        if($flower){
            $where .= " AND f.flower = $flower";
        }
        if($purpose){
            $where .= " AND f.purpose = $purpose";
        }
        if($object){
            $where .= " AND f.object = $object";
        }
        if($flowerNum){
            $where .= " AND f.flowerNum = $flowerNum";
        }
        if($priceCategory){
            $where .= " AND f.priceCategory = $priceCategory";
        }
        if($status){
            $where .= " AND f.status = $status";
        }
        if($id){
            $where .= " AND f.id = $id";
        }
        $model = new Goods();
        $data = $model->getList($page,$where);
        $table = $this->getTable();
        $data['table'] = $table;
        return $this->render('index',$data);
    }

    public function actionAdd(){
        if($_POST){
            $type = Yii::$app->session->get('goodsType');
            $extend = Extend::find()->asArray()->where("type = $type")->all();
            $data = Yii::$app->request->post('data');
            $model = $this->getModel();
            $model->name = $data['name'];
            $model->price = $data['price'];
            $model->createTime = time();
            $model->sales = $data['sales'];
            $model->description =  $data['description'];
            $model->url =  $data['url'];
            $model->catId =  $data['catId'];
            foreach($extend as $v) {
                $model->$v['value'] = $data[$v['value']];
            }
            $model->image =  $data['image'];
            $model->view =  $data['view'];
            $model->save();
            $this->redirect('/goods/goods/index');
        }else{
            $type = Yii::$app->session->get('goodsType');
            $category = Category::find()->asArray()->where("pid=0 AND type = $type")->all();
            $extend = Extend::find()->asArray()->where("type = $type")->all();
            return $this->render('add',['category' => $category,'extend' => $extend]);
        }
    }

    public function actionUpdate(){
        if($_POST){
            $id = Yii::$app->request->post('id');
            $data = Yii::$app->request->post('data');
            $model = $this->getModel();
            $model->updateAll($data,"id=$id");
            $this->redirect('/goods/goods/index');
        }else{
            $type = Yii::$app->session->get('goodsType');
            $id = Yii::$app->request->get('id');
            $model = $this->getModel();
            $data = $model->find()->asArray()->where("id=$id")->one();
            $model = new Category();
            $extend = Extend::find()->asArray()->where("type = $type")->all();
            $category = $model->getParentCategory($data['catId']);
            return $this->render('update',['extend' => $extend,'data' => $data,'id' => $id,'category' => $category]);
        }
    }

    public function actionGoodsStatus(){
        $id = Yii::$app->request->get('id');
        $type = Yii::$app->session->get('goodsType');
        $model = $this->getModel();
        $sign = $model->findOne($id);
        if($sign->status == 1){
            $model->updateAll(['status' => 2],"id=$id");
        }else{
            $model->updateAll(['status' => 1],"id=$id");
        }
        $this->redirect('/goods/goods/index?type='.$type);
    }

    private function getModel(){
        $type = Yii::$app->session->get('goodsType');
        switch ($type){
            case 1: $model = new Course();break;
            case 2: $model = new Smart();break;
            case 3: $model = new En();break;
            case 4: $model = new Book();break;
            case 5: $model = new Vip();break;
        }
        return $model;
    }

    private function getTable(){
        $type = Yii::$app->session->get('goodsType');
        switch ($type){
            case 1: $table = 'course';break;
            case 2: $table = 'smart';break;
            case 3: $table = 'en';break;
            case 4: $table = 'book';break;
            case 5: $table = 'vip';break;
        }
        return $table;
    }

}