<?php
/**
 * 全局模块管理
 * Created by PhpStorm.
 * User: obelisk
 * Date: 15-6-17
 * Time: 下午2:37
 */
namespace app\modules\home\controllers;

use app\modules\home\models\Especially;
use yii;
use app\libs\AppControl;
class EspeciallyController extends AppControl {
    public $enableCsrfValidation = false;
    /**
     * 首页banner图
     * @return string
     */
    public function actionIndex()
    {
        $especially = Especially::find()->asArray()->all();
        return $this->render('index',['especially' => $especially]);
    }

    public function actionAdd(){
        if($_POST){
            $data = Yii::$app->request->post('data');
            $model = new Especially();
            $model->name = $data['name'];
            $model->url = $data['url'];
            $model->image = $data['image'];
            $model->createTime = time();
            $model->save();
            $this->redirect('/home/especially/index');
        }else{
            return $this->render('add');
        }
    }

    public function actionUpdate(){
        if($_POST){
            $id = Yii::$app->request->post('id');
            $data = Yii::$app->request->post('data');
            Especially::updateAll($data,"id=$id");
            $this->redirect('/home/especially/index');
        }else{
            $id = Yii::$app->request->get('id');
            $data = Especially::find()->asArray()->where("id=$id")->one();
            return $this->render('update',['data' => $data,'id' => $id]);
        }
    }

    public function actionDelete(){
        $id = Yii::$app->request->get('id');
        Especially::findOne($id)->delete();
        return $this->redirect('/home/especially/index');
    }


}