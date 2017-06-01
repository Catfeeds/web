<?php
/**
 * 托福控制器基础类
 * by Obelisk
 */
namespace app\libs;
use app\modules\cn\models\Cart;
use yii;
use yii\web\Controller;
class ToeflController extends Controller {
    //初始化
    public function init() {
        $cartSign = isset($_SESSION['cartSign'])?$_SESSION['cartSign']:0;
        if($cartSign == 1){
            $model = new Cart();
            $model->mergeCart();
            $_SESSION['cartSign'] = 0;
        }
    }
}
?>