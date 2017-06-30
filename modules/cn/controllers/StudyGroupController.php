<?php
/**
 * 学习小组
 * Created by PhpStorm.
 * User: Administrator
 * Date: 15-6-17
 * Time: 下午2:37
 */
namespace app\modules\cn\controllers;

use app\libs\Method;
use app\libs\Pager;
use yii;
use app\libs\ToeflController;
use app\libs\yii2_alipay\AlipayPay;
use app\libs\Sms;

class StudyGroupController extends ToeflController {
    public $enableCsrfValidation = false;

    /**
     * 学习小组单页
     * @return string
     * @Obelisk
     */
    public function actionStudyGroup(){
        return $this->renderPartial("studyGroup");
    }
}