<?php

namespace app\models;

use yii\db\ActiveRecord;

class User extends ActiveRecord
{
    public static function tableName(){
        return '{{%user}}';
    }

    public function getModular($roleId,$pid){
        $data = \Yii::$app->db->createCommand("select * from {{%user_control}} ub LEFT JOIN {{%control}} b ON ub.controlId = b.id WHERE ub.roleId = $roleId AND b.pid=$pid")->queryAll();
        foreach($data as $k=>$v){
            $childData = $this->getSubordinate($v['id']);
            if(count($childData) > 0){
                $data[$k]['children'] = $childData ;
            }
        }
        return $data;
    }
    public function getSubordinate($pid){
        $data = \Yii::$app->db->createCommand("select * from {{%control}} co WHERE co.pid=$pid")->queryAll();
        foreach($data as $k=>$v){
            $childData = $this->getSubordinate($v['id']);
            if(count($childData) > 0){
                $data[$k]['children'] = $childData ;
            }
        }
        return $data;
    }
}
