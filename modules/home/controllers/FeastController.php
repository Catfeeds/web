<?php
/**
 * 全局模块管理
 * Created by PhpStorm.
 * User: obelisk
 * Date: 15-6-17
 * Time: 下午2:37
 */
namespace app\modules\home\controllers;

use app\modules\home\models\Feast;
use yii;
use app\libs\AppControl;
class FeastController extends AppControl {
    public $enableCsrfValidation = false;
    /**
     * 首页banner图
     * @return string
     */
    public function actionIndex()
    {
        $data = Feast::find()->asArray()->all();
        return $this->render('index',['feast' => $data]);
    }

    public function actionAdd(){
        if($_POST){
            $data = Yii::$app->request->post('data');
            $model = new Feast();
            $model->name = $data['name'];
            $model->percent = $data['percent'];
            $model->startTime = strtotime($data['startTime']);
            $model->endTime = strtotime($data['endTime']);
            $model->type = $data['type'];
            $model->createTime = time();
            $model->save();
            $this->redirect('/home/feast/index');
        }else{
            return $this->render('add');
        }
    }

    public function actionUpdate(){
        if($_POST){
            $id = Yii::$app->request->post('id');
            $data = Yii::$app->request->post('data');
            Feast::updateAll($data,"id=$id");
            $this->redirect('/home/feast/index');
        }else{
            $id = Yii::$app->request->get('id');
            $data = feast::find()->asArray()->where("id=$id")->one();
            return $this->render('update',['data' => $data,'id' => $id]);
        }
    }

    public function actionDelete(){
        $id = Yii::$app->request->get('id');
        Feast::findOne($id)->delete();
        return $this->redirect('/home/feast/index');
    }


}