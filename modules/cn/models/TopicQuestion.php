<?php
namespace app\modules\cn\models;
use yii\db\ActiveRecord;
class TopicQuestion extends ActiveRecord {
    public static function tableName(){
        return '{{%topic_question}}';
    }

    /**
     * 获取话题->问题
     * @return string
     * by yanni
     */
    public function getTopicQuestion($topicId,$page,$pageSize){
        $limit = " limit ".($page-1)*$pageSize.",$pageSize";
        $sql = "select * from {{%topic_question}} as tq LEFT JOIN {{%question}} as que on tq.questionId=que.id where tq.topicId=$topicId".$limit;
        $data = \Yii::$app->db->createCommand($sql)->queryAll();
        return ['data'=>$data,'page'=>$page+1];
    }
    /**
     * 问题回答
     * @return string
     * by yanni
     */
    public function getAnswer($questionId){
        $data = \Yii::$app->db->createCommand("select u.username,u.image,a.* from {{%answer}} as a LEFT JOIN {{%user}} as u on a.uid=u.uid where questionId= $questionId")->queryAll();
        return $data;
    }

    public function getAllTopic($questionId){
        $sql = "select que.* from {{%topic_question}} as tq LEFT JOIN {{%topic}} as que on tq.topicId=que.id where tq.questionId=$questionId";
        $data = \Yii::$app->db->createCommand($sql)->queryAll();
        return $data;
    }

    public function getUserTopic($uid){
        $sql = "select t.name,t.id from {{%topic_question}} tq LEFT JOIN {{%question}} q on tq.questionId=q.id LEFT JOIN {{%topic}} t ON t.id=tq.topicId WHERE q.uid=$uid GROUP BY tq.topicId";
        $data = \Yii::$app->db->createCommand($sql)->queryAll();
        return $data;
    }

    public function getHotQuestion($topicId,$questionId){
        $sql = "select q.* from {{%question}} q LEFT JOIN {{%topic_question}} tq on tq.questionId=q.id  WHERE q.id != $questionId AND tq.topicId = $topicId";
        $data = \Yii::$app->db->createCommand($sql)->queryAll();
        return $data;
    }
}
