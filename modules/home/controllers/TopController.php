<?php
/**
 * 全局模块管理
 * Created by PhpStorm.
 * User: obelisk
 * Date: 15-6-17
 * Time: 下午2:37
 */
namespace app\modules\home\controllers;

use app\modules\home\models\Top;
use yii;
use app\libs\AppControl;
class TopController extends AppControl {
    public $enableCsrfValidation = false;
    /**
     * 首页banner图
     * @return string
     */
    public function actionIndex()
    {
        $top = Top::find()->asArray()->all();
        return $this->render('index',['top' => $top]);
    }

    public function actionAdd(){
        if($_POST){
            $data = Yii::$app->request->post('data');
            $model = new Top();
            $model->image = $data['image'];
            $model->name = $data['name'];
            $model->url = $data['url'];
            $model->number = $data['number'];
            $model->price = $data['price'];
            $model->flowerId = $data['flowerId'];
            $model->createTime = time();
            $model->save();
            $this->redirect('/home/top/index');
        }else{
            return $this->render('add');
        }
    }

    public function actionUpdate(){
        if($_POST){
            $id = Yii::$app->request->post('id');
            $data = Yii::$app->request->post('data');
            Top::updateAll($data,"id=$id");
            $this->redirect('/home/top/index');
        }else{
            $id = Yii::$app->request->get('id');
            $data = Top::find()->asArray()->where("id=$id")->one();
            return $this->render('update',['data' => $data,'id' => $id]);
        }
    }

    public function actionDelete(){
        $id = Yii::$app->request->get('id');
        Top::findOne($id)->delete();
        return $this->redirect('/home/top/index');
    }


}