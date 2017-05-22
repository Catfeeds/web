<?php
namespace app\modules\hot\controllers;


use yii;
use app\libs\ApiControl;
use app\modules\hot\models\Banner;
use app\modules\basic\models\Role;
class BannerController extends ApiControl
{
    public $enableCsrfValidation = false;

    public function actionIndex()
    {
        $model = new Banner();
        $data = $model->getBanner();
        return $this->render('index', ['data' => $data]);
    }

    public function actionBannerAdd(){
        if($_POST){
            $session  = Yii::$app->session;
            $userId = $session->get('adminId');
            $model = new Banner();
            $id = Yii::$app->request->post('id','');
            $title = Yii::$app->request->post('title','');
            $img = Yii::$app->request->post('img','');
            $url = Yii::$app->request->post('url','');
            if($id){
                $res = $model->findOne($id);
                $res->title = $title;
                $res->image = $img;
                $res->url = $url;
                $re = $res->save();
            } else {
                $model->title = $title;
                $model->image = $img;
                $model->uid = $userId;
                $model->url = $url;
                $re = $model->save();
            }

            if($re){
                echo '<script>alert("操作成功")</script>';
                return $this->redirect('/hot/banner/index');
            }
        } else {
            return $this->render('banner_add');
        }
    }

    public function actionUpdateBanner(){
        $id = Yii::$app->request->get('id');
        $model = new Banner();
        $data = $model->findOne($id);
        return $this->render('banner_add',['data'=>$data]);
    }
    public function actionDelete(){
        $id = Yii::$app->request->get('id');
        $model = new Banner();
        $re = $model->findOne($id)->delete();
        if($re){
            die( '<script>alert("删除成功");history.go(-1);</script>');
        } else {
            die( '<script>alert("失败，请重试");history.go(-1);</script>');
        }
    }
}