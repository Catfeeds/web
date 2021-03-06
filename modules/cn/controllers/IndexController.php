<?php
/**
 * 首页
 * Created by PhpStorm.
 * User: obelisk
 */
namespace app\modules\cn\controllers;
use app\modules\cn\models\Banner;
use app\modules\cn\models\Basket;
use app\modules\cn\models\Cart;
use app\modules\cn\models\Category;
use app\modules\cn\models\Especially;
use app\modules\cn\models\Keywords;
use app\modules\cn\models\Modules;
use app\modules\cn\models\Recommend;
use app\modules\cn\models\Stick;
use app\modules\cn\models\Cake;
use app\modules\cn\models\Top;
use app\modules\home\models\HotSell;
use yii;
use app\libs\ToeflController;

class IndexController extends ToeflController {
    public $enableCsrfValidation = false;
    /**
     * 网校首页
     * @Obelisk
     */
    public function actionIndex(){
        $model = new Category();
        $category = $model->getNavigationCategory();
        $banner = Banner::find()->asArray()->all();
        $hot = HotSell::find()->asArray()->orderBy("sort ASC")->limit(6)->all();
        $openClass = file_get_contents("http://open.viplgw.cn/cn/api/class");
        $openClass = json_decode($openClass,true);
        foreach($openClass as $k=>$v){
            $openClass[$k]['cnName'] = strtotime($v['cnName']);
            $res[$k] = strtotime($v['cnName']);
        }
        array_multisort($res,$openClass);
        $title = '雷哥网网校_出国留学考试在线课程中心_海量优质网络课程！';
        $keywords = '网校,雷哥网校,雷哥网校首页,雷哥,网络课程,在线学习,在线学习平台,网络课程在线学习，出国留学考试，留学考试在线学习';
        $description = '雷哥网校采取互联网一站式智能学习模式，雷哥网校开设GMAT、托福、雅思等网校课程，用户可自主在网校自行购买课程学习。通过雷哥网校在线学习，高效高速出分，快人一步申请心仪offer，走入理想校园。';
        return $this->renderPartial('index', [
            'title'=>$title,
            'keywords'=>$keywords,
            'description'=>$description,
            'hot' => $hot,
            'category' => $category,
            'banner' => $banner,
            'openClass'=>$openClass,
            'playback'=>$model->getContentExtend(190,5), //获取回放课
            'lgwIelts'=>$model->getContentExtend(209), //获取雷哥网雅思
            'recording'=>$model->getContentExtend(188), //获取直播课
            'lgwGmat'=>$model->getCategoryContent([191,193]),  //获取雷哥网GMAT
            'lgwSat'=>$model->getContentExtend(267),  //获取雷哥网SAT
            'lgwToefl'=>$model->getContentExtend(192),   //获取雷哥网托福
            'lgwLiuxue'=>$model->getContentExtend(194),   //获取雷哥网留学
            'lgwEnglish'=>$model->getContentExtend(196),  //获取雷哥网英语
            'lgwBook'=>$model->getContentExtend(198,10),   //获取雷哥网书籍
            'lgwVip'=>$model->getContentExtend(200)   //获取vip课程
        ]);
    }



}