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
use app\modules\cn\models\Collection;
use app\modules\cn\models\Goods;
use app\modules\cn\models\HotSell;
use app\modules\cn\models\Recommend;
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
        $catName = $model->find()->asArray()->where("id=$catId")->one();
        $model = new Goods();
        $where = $model->getChild($catId);
        $sign = Category::findOne($catId);
        $where = "status=2 AND catId in (".implode(",",$where).")";
        $data = $model->getAllGoods($where,$page,10,$sign->type);
        $extend = Extend::find()->asArray()->where("type = $sign->type")->orderBy("sort ASC")->limit(2)->all();
        $pageStr = $data['pageStr'];
        $data = $data['data'];
        $recommend = $model ->getAllRecommend(2);
        $love = $model ->getAllLove(200);
        return $this->renderPartial('index',['love' => $love,'recommend' => $recommend,'extend' => $extend,'pageStr' => $pageStr,'data' => $data,'category' => $category,'catName'=>$catName['name']]);
    }

    public function actionSelect(){
        $word = Yii::$app->request->get('word','');
        $page = Yii::$app->request->get('page',1);
        $where = "1=1";
        if($word){
            $where .= " AND a.name like '%".$word."%'";
        }
        $model = new Category();
        $data = $model->getSelectContent($where,$page,10);
        $model = new Goods();
        $love = $model ->getAllLove(200);
        return $this->renderPartial('select',['pageStr'=>$data['pageStr'],'data'=>$data['data'],'love'=>$love]);

    }
    public function actionDetails(){
        $userId = Yii::$app->session->get('uid');
        $id = Yii::$app->request->get('id');
        $type = Yii::$app->request->get('type');
        $collection = 0;
        if($userId){
            $sign = Collection::find()->where("contentId=$id AND userId=$userId")->one();
            if($sign){
                $collection = 1;
            } else {
                $collection = 0;
            }
        }
        $collectionNum = count(Collection::find()->asArray()->where("contentId=$id")->all());
        $model = new Goods();
        $data = $model->getGoodsDetails($id,$type);
        $extend = Extend::find()->asArray()->where("type = $type")->orderBy("sort ASC")->limit(2)->all();
        $evaluate = $model->getGoodsEvaluate($id);
        $model = new Category();
        $category = $model->getParentCategoryArr($data['catId']);

//        $reply = $model->getGoodsReply($id,$type);
        return $this->renderPartial('details',['category' => array_reverse($category),'extend' => $extend,'data' => $data,'type' => $type,'evaluate'=>$evaluate,'collection'=>$collection,'collectionNum'=>$collectionNum]);
    }

}