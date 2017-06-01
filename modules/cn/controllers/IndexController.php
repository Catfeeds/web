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
        $recording = $model->getContentExtend(188);  //获取直播课
        $playback = $model->getContentExtend(190);  //获取回放课
        $lgwIelts= $model->getContentExtend(203);  //获取雷哥网雅思
        $catIds = [191,193];
        $lgwGmat = $model->getCategoryContent($catIds);  //获取雷哥网GMAT
        $lgwToefl = $model->getContentExtend(192);  //获取雷哥网托福
        $lgwLiuxue = $model->getSmatContent(194);  //获取雷哥网留学
        $lgwEnglish = $model->getEnglishContent(196);  //获取雷哥网英语
        $lgwBook = $model->getBookContent(198);  //获取雷哥网书籍
        $lgwVip = $model->getVipContent(200);  //获取vip课程
        $banner = Banner::find()->asArray()->all();
        $hot = HotSell::find()->asArray()->orderBy("sort ASC")->limit(4)->all();
        $openClass = file_get_contents("http://smartapply.gmatonline.cn/cn/api/class");
        $openClass = json_decode($openClass,true);
        foreach($openClass as $k=>$v){
            $openClass[$k]['cnName'] = strtotime($v['cnName']);
            $res[$k] = strtotime($v['cnName']);
        }
        array_multisort($res,$openClass);
        return $this->renderPartial('index',['hot' => $hot,'category' => $category,'banner' => $banner,'openClass'=>$openClass,'playback'=>$playback,'lgwIelts'=>$lgwIelts,'recording'=>$recording,'lgwGmat'=>$lgwGmat,'lgwToefl'=>$lgwToefl,'lgwLiuxue'=>$lgwLiuxue,'lgwEnglish'=>$lgwEnglish,'lgwBook'=>$lgwBook,'lgwVip'=>$lgwVip]);
    }



}