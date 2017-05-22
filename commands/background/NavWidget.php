<?php
/**
 * 主导航菜单组件
 */
    namespace app\commands\background;
    use yii\base\Widget;
    use yii;;
    use app\models\Block;
	class NavWidget extends Widget  {
        /**
         * 定义函数
         * */
        public function init()
        {
        }

        /**
         * 运行覆盖程序
         * */
        public function run(){
            return $this->render('nav');
        }
	}
?>