<?php
/**
 * 购物车管理
 * Created by PhpStorm.
 * User: Administrator
 * Date: 15-6-17
 * Time: 下午2:37
 */
namespace app\modules\cn\controllers;

use app\modules\cn\models\Goods;
use yii;
use app\libs\ToeflController;

class CartController extends ToeflController {
    public $enableCsrfValidation = false;
    public $layout = 'cn';

    /**
     * 购物车列表
     * @return string
     * @Obelisk
     */
    public function actionIndex()
    {
        $session = Yii::$app->session;
        $uid = $session->get('uid');
        $model = new Goods();
        $data = $model->getCart($uid);
        return $this->renderPartial('index',['data' => $data]);
    }

    /**
     * 删除购物车
     * @return string
     * @Obelisk
     */
    public function actionDelete()
{
        $session = Yii::$app->session;
        $userId = $session->get('userId');
        $contentId = Yii::$app->request->get('contentId');
        if($userId){
            ShoppingCart::deleteAll("userId=$userId AND contentId=$contentId");
        }else{
            $shopCart = $session->get('shopCart');
            if($shopCart){
                foreach($shopCart as $k => $v){
                    if($contentId == $v['contentId']){
                        unset($shopCart[$k]);
                    }
                }
                $session->set('shopCart',$shopCart);
            }
        }
        $this->redirect('/shopping-cart.html');
    }

    /**
     * 添加成功
     * @Obelisk
     */
    public function actionSuccess(){
        return $this->render('success');
    }
}