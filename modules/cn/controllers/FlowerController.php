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
use app\modules\cn\models\HotSell;
use yii;
use app\libs\ToeflController;

class FlowerController extends ToeflController {
    public $enableCsrfValidation = false;
    /**
     * 托福首页
     * @Obelisk
     */
    public function actionList(){
        $where = "1=1";
        $order = "";
        $catId = Yii::$app->request->get('catId');
        $pageSize = Yii::$app->request->get('pageSize',1);
        $page = Yii::$app->request->get('page',1);
        if($catId){
            $sign = Category::findOne($catId);
            if($sign->pid == 0){
                $where .= " AND f.id in (select fc.flowerId from {{%flower_category}} fc left join {{%category}} c on fc.catId=c.id where c.pid=$catId)";
            }else{
                $where .= " AND f.id in (select fc.flowerId from {{%flower_category}} fc where  fc.catId=$catId)";
            }
        }
        $price = Yii::$app->request->get('price');
        if($price){
            $order = "order by f.price Desc";
        }
        $time = Yii::$app->request->get('time');
        if($time){
            $order = "order by f.createTime Desc";
        }
        $model = new Flower();
        $data = $model->getAllFlower($where,$page,$pageSize,$order);
        $pageStr = $data['pageStr'];
        $count = $data['count'];
        $totalPage = $data['totalPage'];
        $data = $data['data'];
        $model = new Category();
        $category = $model->getAllCategory();
        return $this->renderPartial('index',['count' => $count,'page' => $page,'totalPage' => $totalPage,'category' => $category,'data' => $data,'pageStr' => $pageStr]);
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