<?php
/**
 * 全局模块管理
 * Created by PhpStorm.
 * User: obelisk
 * Date: 15-6-17
 * Time: 下午2:37
 */
namespace app\modules\basic\controllers;

use app\modules\basic\models\Category;
use yii;
use app\libs\AppControl;
class CategoryController extends AppControl {
    public $enableCsrfValidation = false;

    /**
     * 用途
     * @return string
     */
    public function actionPurpose()
    {
        $purpose = Category::find()->asArray()->where("pid=0")->all();
       return $this->renderPartial('purpose',['purpose' =>$purpose]);
    }

    /**
     * 添加分类
     * @return string
     */
    public function actionAdd()
    {
        if($_POST){
            $id = Yii::$app->request->post('id');
            $name = Yii::$app->request->post('name');
            $typeName = Yii::$app->request->post('typeName');
            $type = Yii::$app->request->post('type');
            if($id){
                Category::updateAll(['name' => $name,'type' => $type],"id=$id");
            }else{
                $model = new Category();
                $model->name = $name;
                $model->type = $type;
                $model->save();
            }
            $this->redirect('/basic/category/'.$typeName);
        }else{
            $typeName = Yii::$app->request->post('typeName');
            $type = Yii::$app->request->post('type');
            return $this->renderPartial('add',['type' => $type,'typeName' => $typeName]);
        }
    }
}