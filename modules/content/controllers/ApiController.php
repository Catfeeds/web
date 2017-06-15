<?php
/**
 * 内容接口类
 * @return string
 * @Obelisk
 */
namespace app\modules\content\controllers;


use app\modules\content\models\Content;
use yii;
use app\modules\content\models\Category;
use app\modules\content\models\CategoryContent;
use app\modules\content\models\CategoryExtend;
use app\libs\ApiControl;

class ApiController extends ApiControl {
    public $enableCsrfValidation = false;
    /**
     * 获取所有在用分类
     * @Obelisk
     */
    public function actionCategory()
    {
        $model = new Category();
        $pid = Yii::$app->request->get('pid','0');
        $data = $model->getAllCate($pid);
        echo json_encode($data);

    }

    /**
     * 获取类型的树形分类
     * @Yanni
     */
    public function actionCat(){
        $model = new Category();
        $type = Yii::$app->request->post('type','');
        $data = $model->getTree($type);
        echo json_encode($data);
    }

    /**
     * 获取分类树包括一级分类
     * @Obelisk
     */
    public function actionTree(){
        $model = new Category();
        $pid = Yii::$app->request->get('pid','');
        $type = Yii::$app->request->get('type',0);
        $id = Yii::$app->request->get('id','');
        $show = Yii::$app->request->get('show',"");
        $major = Yii::$app->request->get('major',"");
        $data = $model->getTree($pid,$id,$show,$major,$type);
//        var_dump($data);die;
        echo json_encode($data);
    }

    /**
     * 获取分类树包括一级分类
     * @Obelisk
     */
    public function actionOneTree(){
        $model = new Category();
        $id = Yii::$app->request->get('id','');
        $data = Yii::$app->db->createCommand('select id,name as text from {{%category}} where id='.$id)->queryAll();
        $child = $model->getTree($id,$id);
        echo json_encode($data);
    }

    /**
     * 获取父级ID
     * @Obelisk
     */
    public function actionPid(){
        $model = new Category();
        $type = Yii::$app->request->get('type');
        $data = $model->getPid($type);
        echo json_encode($data);
    }

    /**
     * 获取属性树包括一级分类
     * @Obelisk
     */
    public function actionExtendTree(){
        $model = new CategoryExtend();
        $data = $model->getTree(0);
        echo json_encode($data);
    }

    /**
     * 检查是否能够删除分类
     * @Obelisk
     */
    public function actionCheckDelete(){
        $id = Yii::$app->request->post('id');
        $rowCate = Category::find()->where("pid=$id")->all();
        $rowCont = CategoryContent::find()->where("catId=$id")->all();
        $rowExt = CategoryExtend::find()->where("catId=$id")->all();
        if(count($rowCont)>0 || count($rowCate)>0 || count($rowExt)>0){
            $code = 0;
        }else{
            $code = 1;
        }
        die(json_encode(['code' => $code]));
    }

    /**
     * 删除内容
     * @Obelisk
     */
    public function actionContentDelete(){
        $id = Yii::$app->request->post('id');
        $rowCon = Content::find()->where("pid=$id")->all();
        if(count($rowCon)>0){
            $code = 0;
        }else{
            $code = 1;
        }
        die(json_encode(['code' => $code]));
    }

    /**
     * 关联分类内容调用
     * @Yanni
     */
    public function actionContentGl()
    {
        $model = new Category();
        $catId = Yii::$app->request->get('catId');
        $id = Yii::$app->request->get('id','');
        $related = Yii::$app->db->createCommand('select id from {{%category}} where id='.$catId)->queryAll();
        $relconten = Yii::$app->db->createCommand('select id,name as text from {{%content}} where catId='.$related[0]['id'])->queryAll();
        echo json_encode($relconten);

    }
    /**
     * 内容副分类调用
     * @Obelisk
     */
    public function actionContentSecondClass()
    {
        $model = new Category();
        $catId = Yii::$app->request->get('catId');
        $id = Yii::$app->request->get('id','');
        $data = $model->getContentSecond($catId,$id);
        echo json_encode($data);

    }

    /**
     * 内容副分类调用
     * @Obelisk
     */
    public function actionTag()
    {
        $model = new Category();
        $data = $model->getTag();
        echo json_encode($data);

    }



}