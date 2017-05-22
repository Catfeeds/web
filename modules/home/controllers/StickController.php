<?php
/**
 * 全局模块管理
 * Created by PhpStorm.
 * User: obelisk
 * Date: 15-6-17
 * Time: 下午2:37
 */
namespace app\modules\home\controllers;

use app\modules\home\models\Stick;
use yii;
use app\libs\AppControl;
class StickController extends AppControl {
    public $enableCsrfValidation = false;
    /**
     * 首页banner图
     * @return string
     */
    public function actionIndex()
    {
        if($_POST){
            $data = Yii::$app->request->post('data');
            Stick::updateAll($data,"id=1");
            $this->redirect('/home/stick/index');
        }else{
            $data = Stick::find()->asArray()->where("id=1")->one();
            return $this->render('index',['data' => $data]);
        }
    }

    public function actionAdd(){
        if($_POST){
            $data = Yii::$app->request->post('data');
            $model = new Navigation();
            $model->name = $data['name'];
            $model->url = $data['url'];
            $model->createTime = time();
            $model->save();
            $this->redirect('/home/navigation/index');
        }else{
            return $this->render('add');
        }
    }

    public function actionUpdate(){
        if($_POST){
            $id = Yii::$app->request->post('id');
            $data = Yii::$app->request->post('data');
            Navigation::updateAll($data,"id=$id");
            $this->redirect('/home/navigation/index');
        }else{
            $id = Yii::$app->request->get('id');
            $data = Navigation::find()->asArray()->where("id=$id")->one();
            return $this->render('update',['data' => $data,'id' => $id]);
        }
    }

    public function actionDelete(){
        $id = Yii::$app->request->get('id');
        Navigation::findOne($id)->delete();
        return $this->redirect('/home/navigation/index');
    }


}