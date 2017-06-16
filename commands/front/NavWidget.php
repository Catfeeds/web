<?php
/**
 * 头部灰字组件
 * obelisk
 */
    namespace app\commands\front;
    use app\modules\cn\models\Bottom;
    use app\modules\cn\models\Navigation;
    use app\modules\cn\models\Cart;
    use yii\base\Widget;
    use yii;
	class NavWidget extends Widget  {
        public $count;
        /**
         * 定义函数
         * */
        public function init()
        {
            $session =  Yii::$app->session;
            $uid = $session->get('uid');
            if($uid){
                $this->count = Cart::find()->where("uid=$uid")->count();
            } else {
                $this->count = count(\Yii::$app->session->get('shopCart'));;
            }

        }

        /**
         * 运行覆盖程序
         * */
        public function run(){
            return $this->render('nav',['count'=>$this->count]);
        }
	}
?>