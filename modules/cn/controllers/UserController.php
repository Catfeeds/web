<?php
namespace app\modules\cn\controllers;
use yii;
use yii\web\Controller;
use app\modules\cn\models\User;
use app\modules\cn\models\Post;
use app\modules\cn\models\Gossip;
use app\modules\cn\models\Reply;
class UserController extends Controller
{
    function init (){
        parent::init();
        include_once($_SERVER['DOCUMENT_ROOT'].'/../libs/ucenter/ucenter.php');
    }
    public $enableCsrfValidation = false;
    public $layout = false;

    public function actionIndex(){
        $userId  = Yii::$app->session->get('uid');
        if($userId){
            $modelp = new Post();
            $modelg = new Gossip();
            $leidou = uc_user_integral1($userId);
            $userData = User::find()->asArray()->where('uid='.$userId)->one();  //用户详情
            $userPost = $modelp->getUserPost($userId,1,6);  //用户帖子
            $postNum = count(Post::find()->asArray()->where('uid='.$userId)->all());  //用户发表总文章
            $gossipNum = count(Gossip::find()->asArray()->where('uid='.$userId)->all());  //用户发表八卦总数
            $total = $postNum+$gossipNum;
            $userGossip = $modelg->getUserGossip($userId,1,6);  //用户八卦
//                    var_dump($userGossip);die;
            return $this->renderPartial('index',['userData'=>$userData,'total'=>$total,'userGossip'=>$userGossip,'userPost'=>$userPost,'leidou'=>$leidou]);
        } else {
            echo "<script>alert('请先登录')</script>";
            header("location:http://login.gmatonline.cn/cn/index?source=8&url=http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
        }
    }
}