<?php

namespace app\modules\cn\models;

use app\libs\GoodsPager;
use app\libs\Method;
use app\libs\Pager;
use yii\db\ActiveRecord;

class Goods extends ActiveRecord
{
    public $childCat = [];

    public static function tableName()
    {
        return '{{%course}}';
    }

    /**
     * @param $where
     * @param $page
     * @param $pageSize
     * @param $type
     * @return array
     * @Obelisk
     */
    public function getAllGoods($where,$page,$pageSize,$type){
        $model = $this->getModel($type);
        $data = $model->find()->asArray()->where($where)->orderBy('sort ASC')->limit($pageSize)->offset(($page-1)*$pageSize)->all();
        foreach($data as $k => $v){
            $data[$k]['type'] = $type;
        }
        $count = $model->find()->where($where)->count();
        $pageModel = new Pager($count,$page,$pageSize);
        $pageStr = $pageModel->GetPagerContent();
        return ['data' => $data,'pageStr' => $pageStr];
    }

    /**
     * 获取子Id
     * @param $selectId
     * @Obelisk
     */
    public function getChild($catId){
        $sign = Category::find()->asArray()->where("pid=$catId")->all();
        if(count($sign)>0){
            foreach($sign as $v){
                $this->getChild($v['id']);
            }
        }else{
            $this->childCat[] = $catId;
        }
        return $this->childCat;
    }

    /**
     * @param $limit
     * @return array|\yii\db\ActiveRecord[]
     * @Obelisk
     */

    public function getAllRecommend($limit)
    {
        $data = Recommend::find()->asArray()->orderBy('sort ASC')->limit($limit)->all();
        foreach ($data as $k => $v) {
            $model = $this->getModel($v['type']);
            $arr = $model->find()->asArray()->where("id = {$v['goodsId']}")->one();
            $arr['type'] = $v['type'];
            $data[$k] = $arr;
        }
        return $data;
    }

    /**
     * @param $limit
     * @return array|\yii\db\ActiveRecord[]
     * @Obelisk
     */
    public function getAllLove($limit){
        $data = Love::find()->asArray()->orderBy('sort ASC')->limit($limit)->all();
        foreach($data as $k =>$v){
            $model = $this->getModel($v['type']);
            $arr = $model->find()->asArray()->where("id = {$v['goodsId']}")->one();
            $arr['type'] = $v['type'];
            $data[$k] = $arr;
        }
        return $data;
    }

    public function getCart($uid){
        if($uid){
            $data = Cart::find()->asArray()->where("uid=$uid")->orderBy("createTime DESC")->all();
            foreach($data as $k =>$v){
                $model = $this->getModel($v['type']);
                $arr = $model->find()->asArray()->where("id = {$v['goodsId']}")->one();
                $arr['type'] = $v['type'];
                $arr['createTime'] = $v['createTime'];
                $arr['num'] = $v['num'];
                $data[$k] = $arr;
            }
        }else{
            $data = \Yii::$app->session->get('shopCart');
            if($data) {
                foreach ($data as $k => $v) {
                    $model = $this->getModel($v['type']);
                    $arr = $model->find()->asArray()->where("id = {$v['goodsId']}")->one();
                    $arr['type'] = $v['type'];
                    $arr['createTime'] = $v['createTime'];
                    $arr['num'] = $v['num'];
                    $data[$k] = $arr;
                }
            }else{
                $data = [];
            }
        }
        return $data;
    }

    /**
     * @param $id
     * @param $type
     * @return array|null|ActiveRecord
     * @Obelisk
     */
    public function getGoodsDetails($id,$type){
        $model = $this->getModel($type);
        $arr = $model->find()->asArray()->where("id = $id")->one();
        $model->updateAll(['view' => $arr['view']+1],"id=$id");
        return $arr;
    }

    /**
     * 获取商品评价
     * by  yanni
     */
    public function getGoodsEvaluate($id,$page=1,$pageSize=10){
        $limit = " limit ".($page-1)*$pageSize.",$pageSize";
        $sql = 'select u.username,ue.value,ue.createTime from {{%user_evaluate}} as ue LEFT JOIN {{%user}} as u ON ue.userId=u.id where contentId='.$id.'  order by createTime desc';
        $count = count(\Yii::$app->db->createCommand($sql)->queryAll());
        $sql .= " $limit";
        $data = \Yii::$app->db->createCommand($sql)->queryAll();
        $pageModel = new GoodsPager($count,$page,$pageSize,10);
        $pageStr = $pageModel->GetPagerContent();
        return ['data' => $data,'pageStr' => $pageStr,'count' => $count,'page' => $page];
    }
    /**
     * @param $type
     * @return Book|Course|En|Smart|Vip
     * @Obelisk
     */
    private function getModel($type){
        switch ($type){
            case 1: $model = new Course();break;
            case 2: $model = new Smart();break;
            case 3: $model = new En();break;
            case 4: $model = new Book();break;
            case 5: $model = new Vip();break;
        }
        return $model;
    }

    /**
     * @param $type
     * @return string
     * @Obelisk
     */
    private function getTable($type){
        switch ($type){
            case 1: $table = 'course';break;
            case 2: $table = 'smart';break;
            case 3: $table = 'en';break;
            case 4: $table = 'book';break;
            case 5: $table = 'vip';break;
        }
        return $table;
    }
}
