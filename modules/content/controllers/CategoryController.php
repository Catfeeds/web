<?php
namespace app\modules\content\controllers;


use yii;
use yii\web\Controller;
use app\libs\ApiControl;
use app\modules\content\models\Category;
use app\modules\basic\models\Role;

class CategoryController extends ApiControl
{
    public $enableCsrfValidation = false;
    public function actionIndex()
    {
        $model = new Category();
        $category = $model->getCategory();
        return $this->render('index',['category'=>$category]);
    }

    /**
     * 添加分类和修改
     * by Yanni
     */
    public function actionAdd(){
        $session  = Yii::$app->session;
        $userId = $session->get('adminId');
        $model = new Category();
        if($_POST){
            $id = Yii::$app->request->post('id','');
            $uid = Yii::$app->request->post('uid','');
            $pid = Yii::$app->request->post('pid','');
            $name = Yii::$app->request->post('name','');
            $img = Yii::$app->request->post('img','');
            $sort = Yii::$app->request->post('sort','');
            $gossip = Yii::$app->request->post('gossip','');
            if($id){
                $res = $model->findOne($id);
                $res->pid = $pid;
                $res->name = $name;
                $res->image = $img;
                $res->sort = $sort;
                $res->uid = $uid;
                $res->gossipType = $gossip;
                $re = $res->save();
            } else {
                $model->pid = $pid;
                $model->name = $name;
                $model->image = $img;
                $model->createTime = time();
                $model->sort = $sort;
                $model->uid = $uid;
                $model->gossipType = $gossip;
                $re = $model->save();
            }

            if($re){
                echo '<script>alert("操作成功")</script>';
                return $this->redirect('/content/category/index');
            }
        } else{
            return $this->render('add',['uid'=>$userId]);
        }
    }

    /**
     * 修改分类展示
     * by Yanni
     */
    public function actionUpdate(){
        $pid = Yii::$app->request->get('id');
        $userId = Yii::$app->session->get('adminId');
        $model = new Category();
        $res = $model->findOne($pid);
        $parent = $model->find()->asArray()->where('id='.$res['pid'])->one();
        return $this->render('add',['uid'=>$userId,'parent'=>$parent,'data'=>$res]);
    }
    /**
     * 修改锁
     * by Yanni
     */
    public function actionLock(){
        if($_POST){
            $id = Yii::$app->request->post('id');
            $encryptionMode = Yii::$app->request->post('encryptionMode');
            $passKey = Yii::$app->request->post('passKey');
            $roleKey = Yii::$app->request->post('roleKey');
            if(preg_match("/[\x7f-\xff]/",$passKey)){
                die('<script>alert("密码中不能含有中文");history.go(-1);</script>');
            }
            $model = new Category();
            if($encryptionMode==1){
                $res = $model->findOne($id);
                $res->passKey = $passKey;
                $res->keyTag = 1;
                $re = $res->save();
            } elseif($encryptionMode==2){
                $res = $model->findOne($id);
                $res->passKey = $roleKey;
                $res->keyTag = 2;
                $re = $res->save();
            } else{
                $res = $model->findOne($id);
                $res->passKey = null;
                $res->keyTag = 0;
                $re = $res->save();
            }
            if($re>0) {
                echo '<script>alert("操作成功")</script>';
                return $this->redirect('/content/category/index');
            }
        } else {
            $pid = Yii::$app->request->get('id');
            $userId = Yii::$app->session->get('adminId');
            $model = new Category();
            $res = $model->findOne($pid);
            $model_r = new Role;
            $role = $model_r->find()->asArray()->all();
            return $this->render('lock',['uid'=>$userId,'data'=>$res,'role'=>$role]);
        }
    }
    /**
     * 删除分类
     * by Yanni
     */
    public function actionDelete(){
        $id = Yii::$app->request->get('id');
        $model = new Category();
        $re = $model->findOne($id)->delete();
        if($re){
            die( '<script>alert("删除成功");history.go(-1);</script>');
        } else {
            die( '<script>alert("失败，请重试");history.go(-1);</script>');
        }
    }
}