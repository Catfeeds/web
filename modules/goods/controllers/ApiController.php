<?php
/**
 * 内容接口类
 * @return string
 * @Obelisk
 */
namespace app\modules\goods\controllers;

use yii;
use app\modules\goods\models\Category;
use app\libs\ApiControl;

class ApiController extends ApiControl {
    public $enableCsrfValidation = false;
    /**
     * 获取所有在用分类
     * @Obelisk
     */
    public function actionCategory()
    {
        $id = Yii::$app->request->post('id');
        $data = Category::find()->asArray()->where("pid = $id")->all();
        echo json_encode($data);
    }
}