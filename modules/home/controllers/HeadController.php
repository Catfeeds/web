<?php
/**
 * 全局模块管理
 * Created by PhpStorm.
 * User: obelisk
 * Date: 15-6-17
 * Time: 下午2:37
 */
namespace app\modules\home\controllers;

use app\modules\cn\models\Category;
use app\modules\home\models\HeadBottom;
use app\modules\home\models\Picture;
use yii;
use app\libs\AppControl;
class HeadController extends AppControl {
    public $enableCsrfValidation = false;
    /**
     * 用途
     * @return string
     */
    public function actionIndex()
    {
        $sql = "select hb.*,c.name from {{%headBottom}} hb LEFT JOIN {{%category}} c ON c.id=hb.categoryId WHERE hb.type=1";
        $head = Yii::$app->db->createCommand($sql)->queryAll();
        return $this->renderPartial('index',['head' => $head]);
    }

    public function actionAdd(){
        if($_POST){
            $data = Yii::$app->request->post('data');
            $category = Category::findOne($data['categoryId']);
            switch ($category['type']){
                case 1: $extendName = 'purpose';break;
                case 2: $extendName = 'flower';break;
                case 3: $extendName = 'object';break;
                case 4: $extendName = 'flowerNum';break;
                case 5: $extendName = 'priceCategory';
            }
            $model = new HeadBottom();
            $model->image = $data['image'];
            $model->categoryId = $data['categoryId'];
            $model->createTime = time();
            $model->extendName = $extendName;
            $model->type = 1;
            $model->save();
            $this->redirect('/home/head/index');
        }else{
            $category = Category::find()->asArray()->all();
            return $this->renderPartial('add',['category' => $category]);
        }
    }

    public function actionUpdate(){
        if($_POST){
            $id = Yii::$app->request->post('id');
            $data = Yii::$app->request->post('data');
            $category = Category::findOne($data['categoryId']);
            switch ($category['type']){
                case 1: $extendName = 'purpose';break;
                case 2: $extendName = 'flower';break;
                case 3: $extendName = 'object';break;
                case 4: $extendName = 'flowerNum';break;
                case 5: $extendName = 'priceCategory';
            }
            $data['extendName'] = $extendName;
            HeadBottom::updateAll($data,"id=$id");
            $this->redirect('/home/head/index');
        }else{
            $id = Yii::$app->request->get('id');
            $data = HeadBottom::find()->asArray()->where("id=$id")->one();
            $category = Category::find()->asArray()->all();
            return $this->renderPartial('update',['category' => $category,'data' => $data,'id' => $id]);
        }
    }

    public function actionDelete(){
        $id = Yii::$app->request->get('id');
        HeadBottom::findOne($id)->delete();
        $this->redirect('/home/head/index');
    }

}