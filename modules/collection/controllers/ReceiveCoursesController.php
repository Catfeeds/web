<?php
/**
 * 全局模块管理
 * Created by PhpStorm.
 * User: obelisk
 * Date: 15-6-17
 * Time: 下午2:37
 */
namespace app\modules\collection\controllers;


use app\modules\collection\models\ReceiveUser;
use yii;
use app\libs\AppControl;
class ReceiveCoursesController extends AppControl {
    public $enableCsrfValidation = false;
    /**
     * 信息展示
     * @return string
     */
    public function actionIndex()
    {
        $page = Yii::$app->request->get('page',1);
        $model = new ReceiveUser();
        $data = $model->getReceiveUser($page,10);
        return $this->render('index',['data'=>$data['data'],'page'=>$data['page']]);
    }

    public function actionAdd(){

    }

    public function actionUpdate(){

    }


}