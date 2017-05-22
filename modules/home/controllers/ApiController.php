<?php
/**
 * 内容接口类
 * @return string
 * @Obelisk
 */
namespace app\modules\home\controllers;


use app\modules\home\models\Module;
use app\modules\home\models\ModuleFlower;
use yii;
use app\libs\ApiControl;

class ApiController extends ApiControl {
    public $enableCsrfValidation = false;
    /**
     * 获取所有在用分类
     * @Obelisk
     */
    public function actionAddModuleFlower()
    {
        $moduleId = Yii::$app->request->post('moduleId');
        $flowerId = Yii::$app->request->post('flowerId');
        $model = new ModuleFlower();
        $model->moduleId = $moduleId;
        $model->flowerId = $flowerId;
        $re = $model->save();
        if($re){
            die(json_encode(['code' =>1]));
        }else{
            die(json_encode(['code' =>0]));
        }

    }

    public function actionDeleteModuleFlower()
    {
        $id = Yii::$app->request->post('id');
        $re = ModuleFlower::findOne($id)->delete();
        if($re){
            die(json_encode(['code' =>1]));
        }else{
            die(json_encode(['code' =>0]));
        }

    }

    public function actionModuleCategory()
    {
        $id = Yii::$app->request->get('id');
        $model = new Module();
        $relateCategory = $model->getRelateCategory($id);
        return json_encode($relateCategory);
    }

    public function actionChangeSort()
    {
        $id = Yii::$app->request->post('id');
        $table = Yii::$app->request->post('table');
        $sort = Yii::$app->request->post('sort');
        $sql = "UPDATE {{%$table}} SET sort = '$sort' WHERE id = $id";
        $re = Yii::$app->db->createCommand($sql)->query();
        if($re){
            die(json_encode(['code' =>1]));
        }else{
            die(json_encode(['code' =>0]));
        }
    }

}