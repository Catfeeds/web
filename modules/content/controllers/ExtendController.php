<?php
/**
 * 全局模块管理
 * Created by PhpStorm.
 * User: obelisk
 * Date: 15-6-17
 * Time: 下午2:37
 */
namespace app\modules\content\controllers;

use app\modules\content\models\Extend;
use yii;
use app\libs\AppControl;
class ExtendController extends AppControl {
    public $enableCsrfValidation = false;
    /**
     * 首页banner图
     * @return string
     */
    public function actionIndex()
    {
        $extend = Extend::find()->asArray()->all();
        return $this->render('index',['extend' => $extend]);
    }

    public function actionAdd(){
        if($_POST){
            $data = Yii::$app->request->post('data');
            $model = new Extend();
            $model->name = $data['name'];
            $model->type = $data['type'];
            $model->value = $data['value'];
            $model->style = $data['style'];
            $model->save();
            $this->redirect('/content/extend/index');
        }else{
            return $this->render('add');
        }
    }

    public function actionUpdate(){
        if($_POST){
            $id = Yii::$app->request->post('id');
            $data = Yii::$app->request->post('data');
            Extend::updateAll($data,"id=$id");
            $this->redirect('/content/extend/index');
        }else{
            $id = Yii::$app->request->get('id');
            $data = Extend::find()->asArray()->where("id=$id")->one();
            return $this->render('update',['data' => $data,'id' => $id]);
        }
    }

    public function actionDelete(){
        $id = Yii::$app->request->get('id');
        Extend::findOne($id)->delete();
        return $this->redirect('/content/extend/index');
    }

}