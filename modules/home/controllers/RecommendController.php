<?php
/**
 * 全局模块管理
 * Created by PhpStorm.
 * User: obelisk
 * Date: 15-6-17
 * Time: 下午2:37
 */
namespace app\modules\home\controllers;

use app\modules\cn\models\Category;
use app\modules\home\models\HeadBottom;
use app\modules\home\models\Picture;
use app\modules\home\models\Recommend;
use yii;
use app\libs\AppControl;
class RecommendController extends AppControl {
    public $enableCsrfValidation = false;
    /**
     * 限时推荐
     * @return string
     */
    public function actionIndex()
    {
        $sql = "select r.*,f.name from {{%recommend}} r LEFT JOIN {{%flower}} f ON r.flowerId=f.id";
        $recommend = Yii::$app->db->createCommand($sql)->queryAll();
        return $this->render('index',['recommend' => $recommend]);
    }

    public function actionAdd(){
        if($_POST){
            $flowerId = Yii::$app->request->post('flowerId');
            $model = new Recommend();
            $model->flowerId = $flowerId;
            $model->save();
            $this->redirect('/home/recommend/index');
        }else{
            return $this->render('add');
        }
    }

    public function actionUpdate(){
        if($_POST){
            $id = Yii::$app->request->post('id');
            $flowerId = Yii::$app->request->post('flowerId');
            Recommend::updateAll(['flowerId' => $flowerId],"id=$id");
            $this->redirect('/home/recommend/index');
        }else{
            $id = Yii::$app->request->get('id');
            $data = Recommend::find()->asArray()->where("id=$id")->one();
            return $this->render('update',['data' => $data,'id' => $id]);
        }
    }

    public function actionDelete(){
        $id = Yii::$app->request->get('id');
        Recommend::findOne($id)->delete();
        $this->redirect('/home/recommend/index');
    }

}