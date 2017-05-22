<?php 
namespace app\modules\cn\models;
use app\libs\Pager;
use yii\db\ActiveRecord;
class Post extends ActiveRecord {
    public $cateData;
    public $childCat;
    public static function tableName(){
            return '{{%post}}';
    }
    /**
     * 获取用户帖子
     * by  yanni
     */
    public function getUserPost($userId,$page,$pageSize){
        $limit = " limit ".($page-1)*$pageSize.",$pageSize";
        $sql = "select p.id,p.title,p.cnContent,p.imageContent,p.viewCount,p.catId,p.dateTime,ca.name from {{%post}} p left join {{%category}} ca on p.catId=ca.id WHERE p.uid=$userId  order by p.viewCount DESC,p.createTime DESC $limit";
        $data = \Yii::$app->db->createCommand($sql)->queryAll();
        foreach($data as $k=>$v){
            $data[$k]['imageContent'] = unserialize($v['imageContent']);
        }
        return ['data'=>$data,'page'=>$page];
    }

    /**
     * 按条件获取帖子
     * by  yanni
     */
    public function getWherePost($order='',$page='',$pageSize='',$where='1=1'){
        $limit = " limit ".($page-1)*$pageSize.",$pageSize";
        $sql = "select p.*,u.nickname,u.username,u.image from {{%post}} p LEFT JOIN {{%user}} u on p.uid=u.uid WHERE $where";
        $sql .= $order;
        if($pageSize){
            $sql .= " $limit";
        }
        $data = \Yii::$app->db->createCommand($sql)->queryAll();
        return $data;
    }

    /**
     * 获取帖子列表
     * @param $page
     * @param $pageSize
     * @param $selectId
     * @return array
     * @Obelisk
     */
    public function getPost($page,$pageSize,$selectId){
        if($selectId){
            $this->getChild($selectId);
            $where = "p.catId in (".implode(",",$this->childCat).")";
        }else{
            $where = '1=1';
        }
        $limit = " limit ".($page-1)*$pageSize.",$pageSize";
        $sql = "select p.*,c.name as catName,u.username,u.nickname,u.image from {{%post}} p LEFT JOIN {{%user}} u ON u.uid=p.uid LEFT JOIN {{%category}} c on p.catId=c.id WHERE $where  order by p.hot DESC,p.createTime DESC $limit";
        $data = \Yii::$app->db->createCommand($sql)->queryAll();
        $count = count(\Yii::$app->db->createCommand("select p.id from {{%post}} p LEFT JOIN {{%user}} u ON u.uid=p.uid LEFT JOIN {{%category}} c on p.catId=c.id WHERE $where  order by p.hot DESC,p.createTime DESC")->queryAll());
        foreach($data as $k=>$v){
            $sign = PostReply::find()->asArray()->select("{{%post_reply}}.*,{{%user}}.username,{{%user}}.nickname")->leftJoin("{{%user}}","{{%user}}.uid={{%post_reply}}.uid")->where("postId={$v['id']}")->orderBy("{{%post_reply}}.createTime DESC")->one();
            if($sign){
                $data[$k]['replySign'] =1;
                $data[$k]['replyName'] = $sign['nickname']?$sign['nickname']:$sign['username'];
                $data[$k]['replyTime'] = $sign['createTime'];
            }else{
                $data[$k]['replySign'] =0;
            }
            $sign = PostReply::find()->where("postId={$v['id']}")->count();
            $data[$k]['replyCount'] = $sign;
        }
        return ['data' => $data,'count' => $count];
    }

    /**
     * 查询帖子列表
     * @param $page
     * @param $pageSize
     * @param $selectId
     * @return array
     * @Obelisk
     */
    public function searchPost($page,$pageSize,$keywords){
        $where = "p.cnContent like '%$keywords%' || p.title like '%$keywords%'";
        $limit = " limit ".($page-1)*$pageSize.",$pageSize";
        $sql = "select p.*,c.name as catName,u.username,u.nickname from {{%post}} p LEFT JOIN {{%user}} u ON u.uid=p.uid LEFT JOIN {{%category}} c on p.catId=c.id WHERE $where  order by p.hot DESC,p.createTime DESC $limit";
        $data = \Yii::$app->db->createCommand($sql)->queryAll();
        foreach($data as $k=>$v){
            $sign = PostReply::find()->asArray()->select("{{%post_reply}}.*,{{%user}}.username,{{%user}}.nickname")->leftJoin("{{%user}}","{{%user}}.uid={{%post_reply}}.uid")->where("postId={$v['id']}")->orderBy("{{%post_reply}}.createTime DESC")->one();
            if($sign){
                $data[$k]['replySign'] =1;
                $data[$k]['replyName'] = $sign['nickname']?$sign['nickname']:$sign['username'];
                $data[$k]['replyTime'] = $sign['createTime'];
            }else{
                $data[$k]['replySign'] =0;
            }
            $sign = PostReply::find()->where("postId={$v['id']}")->count();
            $data[$k]['replyCount'] = $sign;
        }
        return $data;
    }

    /**
     * 搜索分页
     * @param $page
     * @param $pageSize
     * @param $selectId
     * @return string
     * @Obelisk
     */
    public function searchPage($page,$pageSize,$keywords){
        $where = "cnContent like '%$keywords%' || title like '%$keywords%'";
        $count = Post::find()->where($where)->count();
        $pageModel = new Pager($count,$page,$pageSize);
        $pageStr = $pageModel->GetPagerContent();
        return $pageStr;
    }

    public function getPostDetails($id){
        $data= "select p.*,u.username,u.nickname,u.image,c.name  from {{%post}} p LEFT JOIN {{%category}} c ON c.id=p.catId LEFT JOIN {{%user}} u ON p.uid=u.uid WHERE p.id=$id";
        $data = \Yii::$app->db->createCommand($data)->queryOne();
        Post::updateAll(['viewCount' => $data['viewCount'] + 1],"id=$id");
        $reply = "select pr.*,u.username,u.nickname,u.image  from {{%post_reply}} pr LEFT JOIN {{%user}} u ON pr.uid=u.uid WHERE pr.postId=$id AND pr.pid=0";
        $reply = \Yii::$app->db->createCommand($reply)->queryAll();
        $hot = Post::find()->asArray()->where("id!=$id AND catId={$data['catId']}")->orderBy("viewCount DESC")->limit(6)->all();
        $count = PostReply::find()->asArray()->where("postId=$id")->count();
        foreach($reply as $k => $v){
            $sql = "select pr.*,u.username,u.nickname,u.image  from {{%post_reply}} pr LEFT JOIN {{%user}} u ON pr.uid=u.uid WHERE pr.postId=$id AND pr.pid={$v['id']}";
            $reply[$k]['reply'] = \Yii::$app->db->createCommand($sql)->queryAll();
        }
        return ['reply' => $reply,'data' => $data,'count' => $count,'hot' => $hot];
    }

    public function getPage($page,$pageSize,$selectId){
        if($selectId){
            $this->getChild($selectId);
            $where = "catId in (".implode(",",$this->childCat).")";
        }else{
            $where = '1=1';
        }
        $count = Post::find()->where($where)->count();
        $pageModel = new Pager($count,$page,$pageSize);
        $pageStr = $pageModel->GetPagerContent();
        return $pageStr;
    }

    /**
     * 获取子Id
     * @param $selectId
     * @Obelisk
     */
    private function getChild($selectId){
        $sign = Category::find()->asArray()->where("pid=$selectId")->all();
        if(count($sign)>0){
            foreach($sign as $v){
                $this->getChild($v['id']);
            }
        }else{
           $this->childCat[] = $selectId;
        }
    }
}
