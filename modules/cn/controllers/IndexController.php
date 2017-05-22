<?php
/**
 * 首页
 * Created by PhpStorm.
 * User: obelisk
 */
namespace app\modules\cn\controllers;
use app\modules\cn\models\Category;
use app\modules\cn\models\Gossip;
use app\modules\cn\models\Post;
use app\modules\cn\models\Banner;
use app\modules\cn\models\User;
use app\modules\cn\models\Topic;
use yii;
use yii\web\Controller;
use app\libs\Jpush;

class IndexController extends Controller {
    function init (){
        parent::init();
        include_once($_SERVER['DOCUMENT_ROOT'].'/../libs/ucenter/ucenter.php');
    }
    public $enableCsrfValidation = false;
    public $layout=false;

    /**
     * 帖子展示
     * @Obelisk
     */
    public function actionIndex()
    {
        $selectId = Yii::$app->request->get('selectId', 0);
        $uid = Yii::$app->session->get('uid');
        $user = User::findOne($uid);
        $sign = Category::findOne($selectId);
        if ($sign->keyTag == 2 && !$uid) {
            header("Location:http://login.gmatonline.cn/cn/index?source=8&url=http://gossip.gmatonline.cn/post/$selectId.html");
            die;
        }
        if (($sign->keyTag == 1) || ($sign->keyTag == 2 && $sign->passKey < $user->roleId)) {
            if($sign->keyTag == 2){
                $integral = uc_user_integral1($uid);
                $integral = $integral['totalIntegral'];
                if($integral>500){
                    User::updateAll(['roleId' => 3],"uid=$uid");
                }else{
                    return $this->redirect("/lock/$selectId.html");
                }
            }else{
                $sign = Yii::$app->session->get('category'.$selectId);
                if(!$sign ) {
                    return $this->redirect("/lock/$selectId.html");
                }
            }
        }
        if ($selectId) {
            $sign = Category::findOne($selectId);
            if ($sign->gossipType) {
                header("Location:/gossip/$selectId.html");
                die;
            }
            if ($sign->pid == 0) {
                $pid = $selectId;
                $catId = 0;
                $secondCategory = Category::find()->asArray()->where("pid=$selectId")->orderBy("sort ASC")->all();
            } else {
                $pid = $sign->pid;
                $catId = $selectId;
                $secondCategory = Category::find()->asArray()->where("pid=$sign->pid")->orderBy("sort ASC")->all();
            }
        } else {
            $pid = 0;
            $catId = 0;
            $secondCategory = [];
        }
        $firstCategory = Category::find()->asArray()->where("pid=0")->orderBy("sort DESC")->all();
        $banner = Banner::find()->asArray()->limit(4)->all();  //页面banner图
        $model = new Post();
        $gossip = Gossip::find()->asArray()->orderBy("createTime DESC")->limit(4)->all();  //最新八卦
        $newTopic = Topic::find()->asArray()->orderBy("createTime DESC")->limit(10)->all();  //最新话题
        $count = Post::find()->count();  //总话题
        $today = date("Y-m-d");
        $today = Post::find()->where("dateTime='$today'")->count();
        $lastDay = date("Y-m-d",time()-86400);
        $lastDay = Post::find()->where("dateTime='$lastDay'")->count();
        $data = $model->getPost(1, 10, $selectId);
        $data = $data['data'];
        return $this->renderPartial('index', ['count' => $count,'today' => $today,'lastDay' => $lastDay,'selectId' => $selectId, 'data' => $data, 'pid' => $pid, 'catId' => $catId, 'firstCategory' => $firstCategory, 'secondCategory' => $secondCategory, 'gossip' => $gossip, 'newTopic' => $newTopic, 'banner' => $banner]);

    }

    /**
     * 备考八卦展示
     * @Obelisk
     */
    public function actionGossip(){

        $selectId = Yii::$app->request->get('selectId',0);
        if($selectId){
            $sign = Category::findOne($selectId);
            if($sign->pid == 0){
                $pid =  $selectId;
                $catId = 0;
                $secondCategory = Category::find()->asArray()->where("pid=$selectId")->orderBy("sort ASC")->all();
            }else{
                $pid = $sign->pid;
                $catId = $selectId;
                $secondCategory = Category::find()->asArray()->where("pid=$sign->pid")->orderBy("sort ASC")->all();
            }
        }else{
            $pid = 0;
            $catId = 0;
            $secondCategory = [];
        }
        $firstCategory = Category::find()->asArray()->where("pid=0")->orderBy("sort DESC")->all();
        $model = new Gossip();
        $data = $model->getGossip(1,10,$sign->gossipType);
        $model = new Post();
        $gossip = Gossip::find()->asArray()->orderBy("createTime DESC")->limit(4)->all();  //最新八卦
        $newTopic = Topic::find()->asArray()->orderBy("createTime DESC")->limit(10)->all();  //最新话题
        $banner = Banner::find()->asArray()->limit(4)->all();  //页面banner图
        return $this->renderPartial('gossip',['selectId' => $selectId,'data' => $data,'pid' => $pid,'catId' => $catId,'firstCategory' => $firstCategory,'secondCategory' => $secondCategory,'gossip'=>$gossip,'newTopic'=>$newTopic,'banner'=>$banner]);
    }

    /**
     * 帖子列表页
     * by  obelisk
     */
    public function actionPostList(){
        $catId = Yii::$app->request->get('catId');
        $page = Yii::$app->request->get('page',1);
        $sign = Category::findOne($catId);
        $uid = Yii::$app->session->get('uid');
        $user = User::findOne($uid);
        if ($sign->keyTag == 2 && !$uid) {
            header("Location:http://login.gmatonline.cn/cn/index?source=8&url=http://gossip.gmatonline.cn/post/$catId.html");
            die;
        }
        if (($sign->keyTag == 1) || ($sign->keyTag == 2 && $sign->passKey < $user->roleId)) {
            if($sign->keyTag == 2){
                $integral = uc_user_integral1($uid);
                $integral = $integral['totalIntegral'];
                if($integral>500){
                    User::updateAll(['roleId' => 3],"uid=$uid");
                }else{
                    return $this->redirect("/lock/$catId.html");
                }
            }else{
                $sign = Yii::$app->session->get('category'.$catId);
                if(!$sign ) {
                    return $this->redirect("/lock/$catId.html");
                }
            }
        }
        if($sign->gossipType){
            header("Location:/gossip/list/$catId.html");die;
        }
        $model = new  Post();
        $data = $model->getPost($page,10,$catId);
        $count = $data['count'];
        $data = $data['data'];
        $pageStr = $model->getPage($page,10,$catId);
        $catModel = new Category();
        $category = Category::find()->asArray()->where("id=$catId")->one();
        $today = date("Y-m-d");
        $today = Post::find()->where("dateTime='$today' AND catId=$catId")->count();
        $parent = $catModel->getCategory($catId);
        return $this->renderPartial('postList',['today' => $today,'count' => $count,'category' => $category,'parent' =>$parent,'catId' => $catId,'data' => $data,'category' => $sign,'pageStr' => $pageStr]);
    }

    public function actionLock(){
        $catId = Yii::$app->request->get('catId');
        $data = Category::find()->asArray()->where("id=$catId")->one();
        if($data['keyTag'] == 2){
            $uid = Yii::$app->session->get('uid');
            $integral = uc_user_integral1($uid);
            return $this->renderPartial('lock',['data' => $data,'integral' => $integral['integral']]);
        }else{
            return $this->renderPartial('lock',['data' => $data]);
        }
    }

    /**
     * 帖子列表页
     * by  obelisk
     */
    public function actionSearchList(){
        $keywords = Yii::$app->request->get('keywords');
        $page = Yii::$app->request->get('page',1);
        $model = new  Post();
        $data = $model->searchPost($page,10,$keywords);
        $pageStr = $model->searchPage($page,10,$keywords);
        return $this->renderPartial('searchList',['keywords' => $keywords,'data' => $data,'pageStr' => $pageStr]);
    }

    /**
     * 八卦列表页
     * by  obelisk
     */
    public function actionGossipList(){
        $catId = Yii::$app->request->get('catId');
        $page = Yii::$app->request->get('page',1);
        if($catId){
            $category = Category::findOne($catId);
            $model = new Gossip();
            $data = $model->getGossip($page,10,$category->gossipType);
            $pageStr = $model->getPage($page,10,$category->gossipType);
        } else {
            $model = new Gossip();
            $data = $model->getGossip($page,10,'');
            $pageStr = $model->getPage($page,10,'');
        }
        return $this->renderPartial('gossipList',['catId' => $catId,'data' => $data,'category' => $category,'pageStr' => $pageStr]);
    }
}