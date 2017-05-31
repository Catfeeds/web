<?php
/**
 * 全局模块管理
 * Created by PhpStorm.
 * User: obelisk
 * Date: 15-6-17
 * Time: 下午2:37
 */
namespace app\modules\home\controllers;

use app\modules\home\models\Love;
use yii;
use app\libs\AppControl;
class LoveController extends AppControl {
    public $enableCsrfValidation = false;
    /**
     * 首页banner图
     * @return string
     */
    public function actionIndex()
    {
        $love = Love::find()->asArray()->all();
        return $this->render('index',['love' => $love]);
    }

    public function actionAdd(){
        if($_POST){
            $data = Yii::$app->request->post('data');
            $model = new Love();
            $model->goodsId = $data['goodsId'];
            $model->type = $data['type'];
            $model->createTime = time();
            $model->save();
            $this->redirect('/home/love/index');
        }else{
            return $this->render('add');
        }
    }

    public function actionUpdate(){
        if($_POST){
            $id = Yii::$app->request->post('id');
            $data = Yii::$app->request->post('data');
            Love::updateAll($data,"id=$id");
            $this->redirect('/home/love/index');
        }else{
            $id = Yii::$app->request->get('id');
            $data = Love::find()->asArray()->where("id=$id")->one();
            return $this->render('update',['data' => $data,'id' => $id]);
        }
    }

    public function actionDelete(){
        $id = Yii::$app->request->get('id');
        Love::findOne($id)->delete();
        return $this->redirect('/home/love/index');
    }


}