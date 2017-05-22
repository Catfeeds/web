<?php
/**
 * 全局模块管理
 * Created by PhpStorm.
 * User: obelisk
 * Date: 15-6-17
 * Time: 下午2:37
 */
namespace app\modules\home\controllers;

use app\modules\home\models\Picture;
use yii;
use app\libs\AppControl;
class PictureController extends AppControl {
    public $enableCsrfValidation = false;
    /**
     * 首页banner图
     * @return string
     */
    public function actionPicture()
    {
        $picture = Picture::find()->asArray()->all();
        return $this->render('picture',['picture' => $picture]);
    }

    public function actionAdd(){
        if($_POST){
            $data = Yii::$app->request->post('data');
            $model = new Picture();
            $model->image = $data['image'];
            $model->url = $data['url'];
            $model->createTime = time();
            $model->save();
            $this->redirect('/home/picture/picture');
        }else{
            return $this->render('add');
        }
    }

    public function actionUpdate(){
        if($_POST){
            $id = Yii::$app->request->post('id');
            $data = Yii::$app->request->post('data');
            Picture::updateAll($data,"id=$id");
            $this->redirect('/home/picture/picture');
        }else{
            $id = Yii::$app->request->get('id');
            $data = Picture::find()->asArray()->where("id=$id")->one();
            return $this->render('update',['data' => $data,'id' => $id]);
        }
    }

    public function actionDelete(){
        $id = Yii::$app->request->get('id');
        Picture::findOne($id)->delete();
        return $this->redirect('/home/picture/picture');
    }

}