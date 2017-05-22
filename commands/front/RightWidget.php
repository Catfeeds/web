<?php
/**
 * footer底部组件
 * obelisk
 */
    namespace app\commands\front;
    use app\models\User;
    use app\modules\cn\models\Hot;
    use app\modules\cn\models\Post;
    use app\modules\cn\models\Recommend;
    use yii\base\Widget;
    use yii;
	class RightWidget extends Widget  {
        public $curriculum;
        public $hotPlate;
        public $rankPost;
        public $weekPost;
        public $total;
        public $signCount;
        /**
         * 定义函数
         * */
        public function init()
        {
            $models = new Recommend();
            $this->curriculum = $models->getRecommend();   //热门课程推荐展示
            $this->hotPlate = Hot::find()->asArray()->all(); //热门板块
            $model = new Post();
            $today = date("Y-m-d");
            $where_t = " dateTime='".$today."'";
            $where_w = " YEARWEEK(date_format(dateTime,'%Y-%m-%d')) = YEARWEEK(now())";
            $this->rankPost = $model->getWherePost(" order by viewCount DESC",1,10,$where_t);  //今日帖子排行
            $this->weekPost = $model->getWherePost(" order by viewCount DESC",1,10,"$where_w");  //本周帖子排行
            $this->total = count($model->getWherePost());   //帖子总数
            $time = date("Y-m-d");
            $this->signCount = User::find()->where("lastSignIn='$time'")->count();
        }

        /**
         * 运行覆盖程序
         * */
        public function run(){
            return $this->render('right',['signCount' => $this->signCount,'curriculum'=>$this->curriculum,'hotPlate'=>$this->hotPlate,'rankPost'=>$this->rankPost,'weekPost'=>$this->weekPost,'total'=>$this->total]);
        }
	}
?>