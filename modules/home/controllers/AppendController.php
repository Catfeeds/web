<?php
/**
 * 全局模块管理
 * Created by PhpStorm.
 * User: obelisk
 * Date: 15-6-17
 * Time: 下午2:37
 */
namespace app\modules\home\controllers;

use app\modules\home\models\Append;
use app\modules\home\models\AppendDetails;
use yii;
use app\libs\AppControl;
class AppendController extends AppControl {
    public $enableCsrfValidation = false;
    /**
     * 首页banner图
     * @return string
     */
    public function actionIndex()
    {
        $append = Append::find()->asArray()->all();
        return $this->render('index',['append' => $append]);
    }

    public function actionAdd(){
        if($_POST){
            $data = Yii::$app->request->post('data');
            $model = new Append();
            $model->name = $data['name'];
            $model->unit = $data['unit'];
            $model->createTime = time();
            $model->save();
            $this->redirect('/home/append/index');
        }else{
            return $this->render('add');
        }
    }

    public function actionUpdate(){
        if($_POST){
            $id = Yii::$app->request->post('id');
            $data = Yii::$app->request->post('data');
            Append::updateAll($data,"id=$id");
            $this->redirect('/home/append/index');
        }else{
            $id = Yii::$app->request->get('id');
            $data = Append::find()->asArray()->where("id=$id")->one();
            return $this->render('update',['data' => $data,'id' => $id]);
        }
    }

    public function actionDelete(){
        $id = Yii::$app->request->get('id');
        Append::findOne($id)->delete();
        return $this->redirect('/home/append/index');
    }

    public function actionDetails()
    {
        $id = Yii::$app->request->get('id');
        $appendDetails = AppendDetails::find()->asArray()->where('appendId='.$id)->all();
        return $this->render('details',['id' => $id,'appendDetails' => $appendDetails]);
    }

    public function actionAddDetails(){
        if($_POST){
            $data = Yii::$app->request->post('data');
            $model = new AppendDetails();
            $model->name = $data['name'];
            $model->price = $data['price'];
            $model->appendId = $data['appendId'];
            $model->createTime = time();
            $model->save();
            $this->redirect('/home/append/details?id='.$data['appendId']);
        }else{
            $id = Yii::$app->request->get('id');
            return $this->render('addDetails',['id' => $id]);
        }
    }

    public function actionUpdateDetails(){
        if($_POST){
            $id = Yii::$app->request->post('id');
            $data = Yii::$app->request->post('data');
            AppendDetails::updateAll($data,"id=$id");
            $this->redirect('/home/append/details?id='.$data['appendId']);
        }else{
            $id = Yii::$app->request->get('id');
            $data = AppendDetails::find()->asArray()->where("id=$id")->one();
            return $this->render('updateDetails',['data' => $data,'id' => $id]);
        }
    }

    public function actionDeleteDetails(){
        $id = Yii::$app->request->get('id');
        $sign = AppendDetails::findOne($id);
        AppendDetails::findOne($id)->delete();
        return $this->redirect('/home/append/details?id='.$sign->appendId);
    }


}