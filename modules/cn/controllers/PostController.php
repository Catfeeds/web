<?php
/**
 * 首页
 * Created by PhpStorm.
 * User: obelisk
 */
namespace app\modules\cn\controllers;
use app\libs\Method;
use app\modules\cn\models\Category;
use app\modules\cn\models\Post;
use app\modules\cn\models\PostReply;
use yii;
use yii\web\Controller;
use app\libs\Jpush;

class PostController extends Controller {
    public $enableCsrfValidation = false;
    public $layout=false;

    /**
     * 帖子详情
     * @Obelisk
     */
    public function actionIndex(){
        $id = Yii::$app->request->get('id');
        $model = new Post();
        $data = $model->getPostDetails($id);
        $cat = $model->findOne($id);
        $catModel = new Category();
        $parent = $catModel->getCategory($cat['catId']);
        $data['parent'] = $parent;
        $uid = Yii::$app->session->get('uid');
        if($uid){
            $sign = PostReply::find()->where("postId = $id AND uid = $uid")->one();
            if($sign || $uid == $data['data']['uid']){
                $sign = 1;
            }else{
                $sign = 0;
            }
        }else{
            $sign = 0;
        }
        $data['sign'] = $sign;
        return $this->renderPartial('details',$data);
    }
    /**
     * 帖子详情
     * @Obelisk
     */
    public function actionAddPost(){
        if($_POST){
            $data = Yii::$app->request->post('data');
            $cnContent = strip_tags($data['content']);
            $sign1 = Method::sensitiveWords($cnContent);
            $sign2 = Method::sensitiveWords($data['title']);
            if($sign1['code'] == 0 || $sign2['code' ==0]){

            }
            $imageContent = Method::getStrImage($data['content']);
            $model = new Post();
            $model->title = $data['title'];
            $model->content = $data['content'];
            $model->cnContent = $cnContent;
            $model->imageContent = serialize($imageContent);
            $model->datum = serialize($data['datum']);
            $model->radio = serialize($data['radio']);
            $model->createTime = time();
            $model->dateTime = date("Y-m-d");
            $model->hot = 0;
            $model->catId = $data['catId'];
            $model->viewCount = 0;
            $model->save();
        }else{
            $model = new Category();
            $firstCategory = $model->getAllCatArr(0);
            //var_dump($firstCategory);die;
            return $this->renderPartial('add',['firstCategory' => $firstCategory]);
        }
    }
}