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
        $openClass = file_get_contents("http://www.smartapply.cn/cn/api/class");
        $openClass = json_decode($openClass,true);
        foreach($openClass as $k=>$v){
            $openClass[$k]['cnName'] = strtotime($v['cnName']);
            $res[$k] = strtotime($v['cnName']);
        }
        array_multisort($res,$openClass);
        $title = '雷哥网网校_出国留学考试在线课程中心_海量优质网络课程！';
        $keywords = '雷哥网、雷哥培训、GMAT网课、GMAT培训、托福网课、托福培训、雅思培训、雅思网课、美国留学、英国留学、留学申请';
        $description = '雷哥网开设留学在线课程、留学申请服务、GMAT在线课程、托福雅思在线课程，网络课程随时随地上课，更高效！';
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
            'lgwToefl'=>$model->getContentExtend(192),   //获取雷哥网托福
            'lgwLiuxue'=>$model->getContentExtend(194),   //获取雷哥网留学
            'lgwEnglish'=>$model->getContentExtend(196),  //获取雷哥网英语
            'lgwBook'=>$model->getContentExtend(198,10),   //获取雷哥网书籍
            'lgwVip'=>$model->getContentExtend(200)   //获取vip课程
        ]);
    }



}