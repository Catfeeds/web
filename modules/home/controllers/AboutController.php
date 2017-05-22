<?php
/**
 * 全局模块管理
 * Created by PhpStorm.
 * User: obelisk
 * Date: 15-6-17
 * Time: 下午2:37
 */
namespace app\modules\home\controllers;

use app\modules\home\models\About;
use yii;
use app\libs\AppControl;
class AboutController extends AppControl {
    public $enableCsrfValidation = false;
    /**
     * 首页banner图
     * @return string
     */
    public function actionIndex()
    {
        if($_POST){
            $data = Yii::$app->request->post('data');
            About::updateAll($data,"id=1");
            $this->redirect('/home/about/index');
        }else{
            $data = About::find()->asArray()->where("id=1")->one();
            return $this->render('index',['data' => $data]);
        }
    }


}