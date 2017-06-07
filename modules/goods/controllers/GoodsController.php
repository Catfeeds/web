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
use app\modules\goods\models\Livesdkid;
use app\modules\goods\models\Video;
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

    /**
     * 视频课程
     * @return string
     * by yanni
     */
    public function actionVideo(){
        if($_POST){
            $contentId = Yii::$app->request->post('contentId');
            $kidId = Yii::$app->request->post('kidId');
            $teacherKey = Yii::$app->request->post('teacherKey');
            $assistantKey = Yii::$app->request->post('assistantKey');
            $webKey = Yii::$app->request->post('webKey');
            $clientKey = Yii::$app->request->post('clientKey');
            $sign = Livesdkid::find()->where('contentId='.$contentId)->one();
            if(empty($sign)){
                $model = new Livesdkid();
                $model->contentId = $contentId;
                $model->livesdkid = $kidId;
                $model->teacherKey = $teacherKey;
                $model->assistantKey = $assistantKey;
                $model->webKey = $webKey;
                $model->clientKey = $clientKey;
                $model->createTime = time();
                $res = $model->save();
            } else {
                $model = Livesdkid::findOne($sign['id']);
                $model->contentId = $contentId;
                $model->livesdkid = $kidId;
                $model->teacherKey = $teacherKey;
                $model->assistantKey = $assistantKey;
                $model->webKey = $webKey;
                $model->clientKey = $clientKey;
                $model->createTime = time();
                $res = $model->save();
            }
            if($res>0){
                die('<script>alert("操作成功");history.go(-1);</script>');
            } else {
                die('<script>alert("操作失败");history.go(-1);</script>');
            }
        } else {
            $contentId = Yii::$app->request->get('id');
            $data = Livesdkid::find()->where('contentId='.$contentId)->one();
            $video = Video::find()->where('cid='.$contentId)->all();
            return $this->render('video',['data'=>$data,'video'=>$video]);
        }
    }

    /**
     * 提交视频课程
     * by yanni
     */

    public function actionFileVideo(){
        $id = Yii::$app->request->post('id');
        $cid = Yii::$app->request->post('cid');
        $name = Yii::$app->request->post('kname');
        $pwd = Yii::$app->request->post('pwd');
//        $files = Yii::$app->request->post('files');
        $sdk = Yii::$app->request->post('sdk');
        if($name && $cid && $pwd && $sdk){
            $model = new Video();
            if($id){
                $re = $model->findOne($id);
                $re->cid = $cid;
                $re->name = $name;
                $re->pwd = $pwd;
                $re->sdk = $sdk;
                $res = $re->save();
            } else {
                $model->cid = $cid;
                $model->name = $name;
                $model->pwd = $pwd;
                $model->sdk = $sdk;
                $model->createTime = time();
                $res = $model->save();
            }
            if($res>0){
                die('<script>alert("提交成功");history.go(-1);</script>');
            } else {
                die('<script>alert("提交失败；请重试");history.go(-1);</script>');
            }
        } else {
            die('<script>alert("提交失败；请检查填写内容");history.go(-1);</script>');
        }
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