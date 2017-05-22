<?php
namespace app\modules\content\controllers;
use yii;
use yii\web\Controller;
use app\libs\ApiControl;
use app\modules\content\models\Topic;
use app\modules\content\models\TopicQuestion;

class TopicController extends ApiControl
{
    public $enableCsrfValidation = false;
    public function actionIndex()
    {
        $uid  = Yii::$app->request->get('uid','');    //UID
        $words = Yii::$app->request->get('words','');    //UID
        $beginTime = Yii::$app->request->get('beginTime','');    //开始时间
        $endTime = Yii::$app->request->get('endTime','');       //结束时间
        $page = Yii::$app->request->get('page',1);
        $where="1=1";
        if($uid){
            $where .= " AND t.uid ='$uid'";
        }
        if($beginTime){
            $beginTime = strtotime($beginTime);
            $where .= " AND t.createTime>='$beginTime'";
        }
        if($endTime){
            $endTime = strtotime($endTime);
            $where .= " AND t.createTime<='$endTime'";
        }
        if($words){
            $where .= " AND t.name like '%".$words."%'";
        }
        $model = new Topic();
        $order = ' ORDER BY id DESC';
        $data = $model->getTopicList($where,$order,$page,20);
        return $this->render('index',['data'=>$data]);
    }


    public function actionDelete(){
        $id = Yii::$app->request->get('id');
        $model = new Topic();
        $re = $model->findOne($id)->delete();
        if($re){
            $data = TopicQuestion::find()->where('topicId='.$id)->one(); //检查话题下是否存在问题
            if($data){
                $res = TopicQuestion::deleteAll('topicId='.$id);
                if($res){
                    die( '<script>alert("删除成功");history.go(-1);</script>');
                } else {
                    die( '<script>alert("话题关联的问题删除失败");history.go(-1);</script>');
                }
            }
            die( '<script>alert("删除成功");history.go(-1);</script>');
        } else {
            die( '<script>alert("删除失败，请重试");history.go(-1);</script>');
        }
    }
}