<?php
/**
 * 后台控制器基础类
 * by Obelisk
 */
	namespace app\libs;
    use yii;
    use yii\web\Controller;
    use app\modules\basic\models\Params;
    use app\modules\user\models\UserBlock;
    use app\modules\basic\models\Block;
	class AppControl extends Controller {
        public $block;
        /**
         * 权限控制器初始化
         * @Obelisk
         */
		public function init() {

		}
	}
?>