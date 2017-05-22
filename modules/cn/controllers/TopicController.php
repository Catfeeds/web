<?php
/**
 * 首页
 * Created by PhpStorm.
 * User: obelisk
 */
namespace app\modules\cn\controllers;
use app\libs\Method;
use app\modules\cn\models\Category;
use app\modules\cn\models\Post;
use app\modules\cn\models\TopicQuestion;
use app\modules\cn\models\Topic;
use app\modules\cn\models\Question;
use app\modules\cn\models\Answer;
use app\modules\cn\models\User;
use app\modules\cn\models\AnswerReply;
use yii;
use yii\web\Controller;
use app\libs\Jpush;

class TopicController extends Controller {
    public $enableCsrfValidation = false;
    public $layout=false;

    /**
     * 话题->问题列表页
     * @Obelisk
     */
    public function actionIndex(){
        $topicId = Yii::$app->request->get('topicId',1);
        $uid = Yii::$app->session->get('uid');
        $topic = Topic::findOne($topicId);
        $model = new TopicQuestion();
        $data = $model->getTopicQuestion($topicId,1,8);
        if($uid){
            $userTopic = $model->getUserTopic($uid);
        }else{
            $userTopic = [];
        }
        foreach($data['data'] as $k=>$v){
            $model = new TopicQuestion();
            $data['data'][$k]['commentNum'] = count($model->getAnswer($v['questionId']));
            $data['data'][$k]['answer'] = Answer::find()->asArray()->where("questionId=".$v['questionId'])->orderBy("id asc")->one();
            $data['data'][$k]['user'] = User::find()->asArray()->where("uid=".$v['uid'])->select(['username'])->one();
        }
        $model = new Topic();
        $hotTopic = $model->getHotTopic('t.hot=1');
        return $this->renderPartial('index',['hotTopic' => $hotTopic,'userTopic' => $userTopic,'topic'=>$topic,'data'=>$data]);
    }

    /**
     * 话题列表
     * @Obelisk
     */
    public function actionTopicList(){
        $topic = Topic::find()->asArray()->all();
        $model = new Topic();
        $hotTopic = $model->getHotTopic('t.hot=1');
        return $this->renderPartial('topicList',['topic'=>$topic,'hotTopic'=>$hotTopic]);
    }
    /**
     * 问题详情
     * @Obelisk
     */
    public function actionQuestion(){
        $questionId = Yii::$app->request->get('questionId',1);
        $topicId = Yii::$app->request->get('topicId');
        $topics = Topic::findOne($topicId);
        $question = Question::findOne($questionId);  //问题
        Question::updateAll(array('viewCount'=>$question['viewCount']+1),'id='.$questionId);  //浏览量加1
        $model = new TopicQuestion();
        $topic = $model->getAllTopic($questionId);
        $data = $model->getAnswer($questionId);      //问题回答
        $hotQuestion = $model->getHotQuestion($topicId,$questionId);      //问题回答
        foreach($data as $k=>$v){
            $replyModel = new AnswerReply();
            $data[$k]['reply'] = $replyModel->getReplyUser($v['id'],1,1);  //回答回复
        }
        return $this->renderPartial('question',['topicId' => $topicId,'hotQuestion' => $hotQuestion,'name' => $topics->name,'topic' => $topic,'data'=>$data,'question'=>$question]);
    }
}