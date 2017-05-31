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
