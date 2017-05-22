<?php
/**
 * 全局模块管理
 * Created by PhpStorm.
 * User: obelisk
 * Date: 15-6-17
 * Time: 下午2:37
 */
namespace app\modules\home\controllers;

use app\modules\home\models\Keywords;
use yii;
use app\libs\AppControl;
class KeywordsController extends AppControl {
    public $enableCsrfValidation = false;
    /**
     * 首页banner图
     * @return string
     */
    public function actionIndex()
    {
        $data = Keywords::find()->asArray()->all();
        return $this->render('index',['data' => $data]);
    }

    public function actionAdd(){
        if($_POST){
            $data = Yii::$app->request->post('data');
            $model = new Keywords();
            $model->name = $data['name'];
            $model->url = $data['url'];
            $model->type = $data['type'];
            $model->createTime = time();
            $model->save();
            $this->redirect('/home/keywords/index');
        }else{
            return $this->render('add');
        }
    }

    public function actionUpdate(){
        if($_POST){
            $id = Yii::$app->request->post('id');
            $data = Yii::$app->request->post('data');
            Keywords::updateAll($data,"id=$id");
            $this->redirect('/home/keywords/index');
        }else{
            $id = Yii::$app->request->get('id');
            $data = Keywords::find()->asArray()->where("id=$id")->one();
            return $this->render('update',['data' => $data,'id' => $id]);
        }
    }

    public function actionDelete(){
        $id = Yii::$app->request->get('id');
        Keywords::findOne($id)->delete();
        return $this->redirect('/home/keywords/index');
    }


}