<?php
/**
 * 内容接口类
 * @return string
 * @Obelisk
 */
namespace app\modules\goods\controllers;

use yii;
use app\modules\goods\models\Category;
use app\modules\goods\models\Video;
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
    /**
     * 获取sdk视频课
     * by  yanni
     */
    public function actionVideo(){
        $id = Yii::$app->request->get('id','');
        $data = Video::find()->asArray()->where('id='.$id)->one();
        die(json_encode($data));
    }
    /**
     * 删除sdk视频课
     * by  yanni
     */
    public function actionVideoDelete(){
        $id = Yii::$app->request->get('id','');
        $data = Video::deleteAll('id='.$id);
        if($data>0){
            $code = 1;
        } else {
            $code = 0;
        }
        die(json_encode($code));
    }
}