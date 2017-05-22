<?php
/**
 * 分类管理
 * Created by PhpStorm.
 * User: Administrator
 * Date: 15-6-17
 * Time: 下午2:37
 */
namespace app\modules\content\controllers;


use yii;
use app\modules\content\models\Category;
use app\modules\content\models\CategoryExtend;
use app\modules\content\models\CategoryTag;
use app\libs\AppControl;
use app\libs\Method;
class CategoryController extends AppControl {
    public $enableCsrfValidation = false;

    /**
     * 分类列表展示
     * @return string
     * @Obelisk
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * 添加分类与其基本信息
     * @return string
     * @Obelisk
     */
    public function actionAdd(){
        if($_POST){
            $model = new Category();
            $data = Yii::$app->request->post('data');
            $id = Yii::$app->request->post('id');
            if(empty($data['name'])){
                die('<script>alert("请添加分类名称");history.go(-1);</script>');
            }
            if($id){
                $re = $model->updateAll($data,'id = :id',[':id' => $id]);
            }else{
                $data['type'] = 1;
                $re = Yii::$app->db->createCommand()->insert("{{%category}}",$data)->execute();
            }
            if($re){
                $this->redirect('/content/category/index');
            }else{
                echo '<script>alert("失败，请重试");history.go(-1);</script>';
                die;
            }
        }
        else{
            $category = Category::find()->asArray()->where("pid=0 AND type=1")->all();
            return $this->render('add',['category' => $category]);
        }
    }

    /**
     * 删除分类
     * @return string
     * @Obelisk
     */

    public function actionDelete(){
        $id = Yii::$app->request->get('id');
        $model = new Category();
        if($model->findOne($id)->delete()){
            $this->redirect('/content/category/index');
        }else{
            echo '<script>alert("失败，请重试");history.go(-1);</script>';
            die;
        }
    }

    /**
     * 修改分类
     * @return string
     * @Obelisk
     */

    public function actionUpdate(){
        $id = Yii::$app->request->get('id');
        $model = new Category();
        $data = $model->findOne($id);
        $category = Category::find()->asArray()->where("pid=0 AND type=1")->all();
        return $this->render('add',array('category'=> $category,'data' =>$data,'id' => $id));
    }


    /**
     * 设为主页
     * @Obelisk
     */
    public function actionHead()
    {
        $id = Yii::$app->request->get('id');
        $sign = Category::findOne($id);
        if($sign->head == 1){
            Category::updateAll(['head' => 0],"id=$id");
        }else{
            Category::updateAll(['head' => 1],"id=$id");
        }
        $this->redirect('/content/category/index');

    }
}