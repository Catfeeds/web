<?php
/**
 * 首页
 * Created by PhpStorm.
 * User: obelisk
 */
namespace app\modules\cn\controllers;
use app\modules\cn\models\Banner;
use app\modules\cn\models\Basket;
use app\modules\cn\models\Category;
use app\modules\cn\models\Especially;
use app\modules\cn\models\Keywords;
use app\modules\cn\models\Modules;
use app\modules\cn\models\Recommend;
use app\modules\cn\models\Stick;
use app\modules\cn\models\Cake;
use app\modules\cn\models\Top;
use yii;
use app\libs\ToeflController;

class IndexController extends ToeflController {
    public $enableCsrfValidation = false;
    /**
     * 托福首页
     * @Obelisk
     */
    public function actionIndex(){
        $model = new Category();
        $category = $model->getNavigationCategory();
        $banner = Banner::find()->asArray()->all();
        $sick = Stick::findOne(1);
        $model = new Recommend();
        $recommend = $model->getAllRecommend();
        $model = new Modules();
        $head = $model->getAllModules(1);
        $foot = $model->getAllModules(2);
        $middle = $model->getAllModules(3);
        $keywords = Keywords::find()->asArray()->all();
        $especially = Especially::find()->asArray()->all();
        $top = Top::find()->asArray()->orderBy("sort ASC")->all();
        $basket = Basket::find()->asArray()->where("isIndex=1")->orderBy("sort ASC")->all();
        $cake = Cake::find()->asArray()->where("isIndex=1")->orderBy("sort ASC")->all();
        return $this->renderPartial('index',['top' => $top,'middle' => $middle,'cake' => $cake,'basket' => $basket,'especially' => $especially,'keywords' => $keywords,'stick' => $sick,'category' => $category,'banner' => $banner,'recommend' => $recommend,'head' => $head,'foot' => $foot]);
    }

}