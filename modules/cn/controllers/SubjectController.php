<?php
/**
 * 首页
 * Created by PhpStorm.
 * User: obelisk
 */
namespace app\modules\cn\controllers;
use app\modules\cn\models\Append;
use app\modules\cn\models\AppendDetails;
use app\modules\cn\models\Category;
use app\modules\cn\models\Flower;
use app\modules\cn\models\Goods;
use app\modules\cn\models\HotSell;
use app\modules\content\models\Extend;
use yii;
use app\libs\ToeflController;

class SubjectController extends ToeflController {
    public $enableCsrfValidation = false;
    /**
     * 托福首页
     * @Obelisk
     */
    public function actionIndex(){
        $catId = Yii::$app->request->get('catId');
        $page = Yii::$app->request->get('page',1);
        $model = new Category();
        $category = $model->getRelateAllCategory($catId);
        $model = new Goods();
        $where = $model->getChild($catId);
        $sign = Category::findOne($catId);
        $where = "catId in (".implode(",",$where).")";
        $data = $model->getAllGoods($where,$page,10,$sign->type);
        $extend = Extend::find()->asArray()->where("type = $sign->type")->orderBy("sort ASC")->limit(2)->all();
        $pageStr = $data['pageStr'];
        $data = $data['data'];
        return $this->renderPartial('index',['extend' => $extend,'pageStr' => $pageStr,'data' => $data,'category' => $category]);
    }

    public function actionDetails(){
        $browse = isset($_COOKIE['browse'])?unserialize($_COOKIE['browse']):[];
        $number = Yii::$app->request->get('number');
        if(isset($browse["hjy$number"])){
            unset($browse["hjy$number"]);
        }
        $browse["hjy$number"] = $number;
        $browseStr = '';
        $browse=array_reverse($browse);
        $i = 0;
        foreach($browse as $k => $v){
            if($i>4){
                unset($browse[$k]);
            }else{
                $browseStr .= $v.",";
            }
$i++;
        }
        setcookie("browse", serialize($browse), time()+(3600*24*30));
        $browseStr = substr($browseStr,0,-1);
        $flower = Flower::find()->asArray()->where("goodsNumber='$number'")->one();
        $browse = Flower::find()->asArray()->where("goodsNumber in ($browseStr)")->all();
        $append = Append::find()->asArray()->all();
        foreach($append as $k => $v){
            $append[$k]['details'] = AppendDetails::find()->asArray()->where("appendId = {$v['id']}")->all();
        }
        $category = Category::find()->asArray()->where("type=1 AND pid=0")->all();
        foreach($category as $k => $v){
            $category[$k]['child']  = Category::find()->asArray()->where("pid={$v['id']}")->all();
        }
        $hot = HotSell::find()->asArray()->orderBy('sort ASC')->all();
        return $this->renderPartial('details',['browse' => $browse,'hot' => $hot,'flower' => $flower,'append' => $append,'category' => $category]);
    }

}