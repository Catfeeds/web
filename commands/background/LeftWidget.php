<?php
/**
 * 后台左菜单组件
 */
    namespace app\commands\background;
    use yii\base\Widget;
    use yii;
    use app\models\User;
	class LeftWidget extends Widget  {
        public $controller;
        public $module;
        public $data;
        public $user;
        public $blockArr = [];
        /**
         * 定义函数
         * */
        public function init()
        {
            $userId = Yii::$app->session->get('adminId');

            $model = new User();
            $role = $model->find()->select(['roleId'])->where('uid='.$userId)->one();
            $this->data = $model->getModular($role['roleId'],0);
            $this->user =  Yii::$app->session->get('adminData');
        }

        /**
         * 运行覆盖程序
         * */
        public function run(){
            return $this->render('left',['data' => $this->data,'user'=>$this->user]);
        }
	}
?>