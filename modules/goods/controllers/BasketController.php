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
use app\modules\goods\models\BasketCategory;
use app\modules\goods\models\Category;
use app\modules\goods\models\FlowerCategory;
use yii;
use app\libs\AppControl;
class BasketController extends AppControl {
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
        $model = new Basket();
        $data = $model->getList($page,$where);
        return $this->render('index',$data);
    }

    public function actionAdd(){
        if($_POST){
            $data = Yii::$app->request->post('data');
            $catId = $data['catId'];
            $model = new Basket();
            $model->name = $data['name'];
            $model->goodsNumber = 'zp'.time();
            $model->price = $data['price'];
            $model->createTime = time();
            $model->createTimeStr = date("Y-m-d");
            $model->description =  $data['description'];
            $model->flowerLanguage =  $data['flowerLanguage'];
            $model->defaultImage =  $data['defaultImage'];
            $model->imageStr =  $data['imageStr'];
            $model->save();
            foreach($catId as $v){
                $model1 = new BasketCategory();
                $model1->basketId = $model->primaryKey;
                $model1->catId = $v;
                $model1->save();
            }
            $this->redirect('/goods/basket/index');
        }else{
            $model = new Category();
            $category = $model->getAllCate(0,2);
            return $this->render('add',['category' => $category]);
        }
    }

    public function actionUpdate(){
        if($_POST){
            $id = Yii::$app->request->post('id');
            $data = Yii::$app->request->post('data');
            $catId = $data['catId'];
            BasketCategory::deleteAll("basketId=$id");
            unset($data['catId']);
            foreach($catId as $v){
                $model1 = new BasketCategory();
                $model1->basketId = $id;
                $model1->catId = $v;
                $model1->save();
            }
            Basket::updateAll($data,"id=$id");
            $this->redirect('/goods/basket/index');
        }else{
            $id = Yii::$app->request->get('id');
            $data = Basket::find()->asArray()->where("id=$id")->one();
            $data['imageArr'] = explode("-",$data['imageStr']);
            $catStr = "SELECT GROUP_CONCAT(fc.catId) catStr  FROM {{%basket_category}} fc WHERE basketId = $id GROUP BY fc.basketId";
            $catStr = Yii::$app->db->createCommand($catStr)->queryOne();
            $catStr = $catStr['catStr'];
            $model = new Category();
            $category = $model->getAllCate(0,2);
            return $this->render('update',['data' => $data,'id' => $id,'catStr' => $catStr,'category' => $category]);
        }
    }

    public function actionBasketStatus(){
        $id = Yii::$app->request->get('id');
        $sign = Basket::findOne($id);
        if($sign->status == 1){
            Basket::updateAll(['status' => 2],"id=$id");
        }else{
            Basket::updateAll(['status' => 1],"id=$id");
        }
        $this->redirect('/goods/basket/index');
    }

    public function actionBasketIndex(){
        $id = Yii::$app->request->get('id');
        $sign = Basket::findOne($id);
        if($sign->isIndex == 1){
            Basket::updateAll(['isIndex' => 2],"id=$id");
        }else{
            Basket::updateAll(['isIndex' => 1],"id=$id");
        }
        $this->redirect('/goods/basket/index');
    }

}