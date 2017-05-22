<?php
/**
 * 头部灰字组件
 * obelisk
 */
    namespace app\commands\front;
    use app\modules\cn\models\Bottom;
    use app\modules\cn\models\Navigation;
    use app\modules\cn\models\Phone;
    use yii\base\Widget;
    use yii;
	class NavWidget extends Widget  {
        public $navigation;
        public $bottom;
        public $phone;
        /**
         * 定义函数
         * */
        public function init()
        {
            $this->navigation = Navigation::find()->asArray()->orderBy("id ASC")->all();
            $this->bottom = Bottom::find()->asArray()->all();
            $this->phone = Phone::find()->asArray()->where("id=1")->one();
        }

        /**
         * 运行覆盖程序
         * */
        public function run(){
            return $this->render('nav',['phone' => $this->phone,'bottom' => $this->bottom,'navigation' => $this->navigation]);
        }
	}
?>