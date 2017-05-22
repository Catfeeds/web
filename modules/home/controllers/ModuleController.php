<?php
/**
 * 全局模块管理
 * Created by PhpStorm.
 * User: obelisk
 * Date: 15-6-17
 * Time: 下午2:37
 */
namespace app\modules\home\controllers;

use app\modules\cn\models\Category;
use app\modules\home\models\Flower;
use app\modules\home\models\Module;
use app\modules\home\models\ModuleCategory;
use app\modules\home\models\ModuleFlower;
use app\modules\home\models\Picture;
use yii;
use app\libs\AppControl;
class ModuleController extends AppControl {
    public $enableCsrfValidation = false;
    /**
     * 用途
     * @return string
     */
    public function actionIndex()
    {
        $data = Module::find()->asArray()->all();
        return $this->render('index',['data' => $data]);
    }

    public function actionAdd(){
        if($_POST){
            $data = Yii::$app->request->post('data');
            $data['left'] = serialize($data['left']);
            $data['middle'] = serialize($data['middle']);
            $data['right'] = serialize($data['right']);
            $data['createTime'] = time();
            Yii::$app->db->createCommand()->insert("{{%modules}}",$data)->execute();
            $this->redirect('/home/module/index');
        }else{
            return $this->render('add');
        }
    }

    public function actionUpdate(){
        if($_POST){
            $data = Yii::$app->request->post('data');
            $id = Yii::$app->request->post('id');
            $data['left'] = serialize($data['left']);
            $data['middle'] = serialize($data['middle']);
            $data['right'] = serialize($data['right']);
            Module::updateAll($data,"id=$id");
            $this->redirect('/home/module/index');
        }else {
            $id = Yii::$app->request->get('id');
            $data = Module::find()->asArray()->where("id=$id")->one();
            return $this->render('update', ['data' => $data, 'id' => $id]);
        }
    }

    public function actionAddFlower(){
        $id = Yii::$app->request->get('id');
        $model = new ModuleFlower();
        $data = $model->getModuleFlower($id);
        $beginTime  = strtotime(Yii::$app->request->get('beginTime',''));
        $endTime  = strtotime(Yii::$app->request->get('endTime',''));
        $flowerId  = Yii::$app->request->get('flowerId','');
        $name  = Yii::$app->request->get('name','');
        $page  = Yii::$app->request->get('page',1);
        $where="f.status = 2";
        if($beginTime){
            $where .= " AND f.createTime>$beginTime";
        }
        if($endTime){
            $where .= " AND f.createTime<$endTime";
        }
        if($flowerId){
            $where .= " AND f.id = $flowerId";
        }

        if($name){
            $where .= " AND f.name like '%$name%'";
        }

        if(count($data)>0){
            $arr = [];
            foreach($data as $v){
                $arr[] = $v['id'];
            }
            $str = implode(",",$arr);
            $where .= " AND f.id not in ($str)";
        }
        $model = new Flower();
        $allFlower = $model->getList($page,$where,5);
        $pageStr = $allFlower['pageStr'];
        $allFlower = $allFlower['data'];
        return $this->render('addFlower', ['pageStr' => $pageStr,'allFlower' =>$allFlower,'data' => $data, 'id' => $id]);
    }

    public function actionAddCategory(){
        if($_POST){
            $id = Yii::$app->request->post('id');
            $relateCategory = Yii::$app->request->post('relateCategory');
            Module::updateAll(['relateCategory' => $relateCategory],"id=$id");
            $this->redirect('/home/module/index');
        }else{
            $id = Yii::$app->request->get('id');
            $data = Module::findOne($id);
            $relateCategory = $data['relateCategory'];
            return $this->render('addCategory', ['relateCategory' => $relateCategory, 'id' => $id]);
        }
    }

    public function actionDelete(){
        $id = Yii::$app->request->get('id');
        Module::findOne($id)->delete();
        ModuleCategory::deleteAll("moduleId = $id");
        ModuleFlower::deleteAll("moduleId = $id");
        $this->redirect('/home/module/index');
    }

    public function actionStatus(){
        $id = Yii::$app->request->get('id');
        $sign = Module::findOne($id);
        if($sign->status == 1){
            Module::updateAll(['status' => 0],"id=$id");
        }else{
            Module::updateAll(['status' => 1],"id=$id");
        }
        $this->redirect('/home/module/index');
    }

}