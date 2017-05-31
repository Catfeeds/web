<?php
/**
 * 全局模块管理
 * Created by PhpStorm.
 * User: obelisk
 * Date: 15-6-17
 * Time: 下午2:37
 */
namespace app\modules\collection\controllers;


use app\modules\collection\models\Vip;
use yii;
use app\libs\AppControl;
class CollectionController extends AppControl {
    function init(){
        parent::init();
    }
    public $enableCsrfValidation = false;
    public $purpose;
    public $flower;
    public $object;
    public $flowerNum;
    public $priceCategory;
    public $classification;
    public $colour;
    /**
     * 用途
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }
}