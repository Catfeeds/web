<?php 
namespace app\modules\content\models;
use yii\db\ActiveRecord;
class Category extends ActiveRecord {
    public $cateData;

    public static function tableName(){
            return '{{%category}}';
    }

    /**
     * 获取所有分类
     * @param $pid
     * @param $status
     * @param string $catId
     * @param array $data
     * @return array
     * @Obelisk
     */
    public function getAllCate($pid){
        $data = $this->find()->asArray()->where("pid=$pid")->orderBy('id ASC')->all();
        foreach($data as $k => $v){
            $str = "";
            $str .= '<a href="/content/category/update?id=' . $v['id'] . '">修改</a> ';
            $str .= ' <a onclick="checkDelete(' . $v['id'] . ')" class="categoryDelete" href="javascript:;">删除</a> ';
            if ($v['head'] == 1) {
                $str .= ' <a  class="categoryDelete" href="/content/category/head?id=' . $v['id'] . '">取消主页</a> ';
            } else {
                $str .= ' <a  class="categoryDelete" href="/content/category/head?id=' . $v['id'] . '">设为主页</a> ';
            }
            $data[$k]['action'] = $str;
        $data[$k]['sort'] = '<input style="width: 30px;" type="text" onkeyup="changeSort(' . $v['id'] . ',\'category\',this)" value="' . $v['sort'] . '" name="sort"></span>';
        }
        foreach($data as $k => $v){
            $childData = $this->getAllCate($v['id']);
            if(count($childData) > 0){
                $data[$k]['children'] = $childData ;
            }

        }
        return $data;
    }

    /**
     * 获取子分类
     * @param $pid
     * @param $status
     * @param string $catId
     * @param array $data
     * @return array
     * @Obelisk
     */
    public function getChildAll($id){
        $data = \Yii::$app->db->createCommand('select id,name as text from {{%category}} where pid='.$id)->queryAll();
        foreach($data as $k => $v){
            $childData = $this->getChildAll($v['id']);
            $data = array_merge($data,$childData);
        }
        return $data;
    }

    /**
     * 获取树形菜单
     * @param $pid
     * @param $id  选中的分类Id
     * @param  $type 是否递归查询
     * @param array $data
     * @return array
     * @Obelisk
     */
    public function getTree($type){
        $data = \Yii::$app->db->createCommand('select * from {{%category}} where type='.$type)->queryAll();
        return $data;
    }

    /**
     * 获取指定分类
     *
     */
    public function getAllCat($pid){
        $sql = "select * from {{%category}}";
        if($pid){
            $sql .=" where pid=$pid";
        }
        $data = \Yii::$app->db->createCommand($sql)->queryAll();
        return $data;
    }
    /**
     * 获取当前主分类的副分类模板
     * @param $catId
     * @param $id
     * @return array|bool
     * @Obelisk
     */

    public function getContentSecond($catId,$id){
        if($id){
            $idArr = explode(",",$id);
        }
        $data = \Yii::$app->db->createCommand('select secondClass from {{%category}} where id='.$catId)->queryOne();
        $classTemplate = explode(",",$data['secondClass']);
        $data = [];
        foreach($classTemplate as $k => $v){
            $data[$k] = \Yii::$app->db->createCommand('select id,name as text from {{%category}} where id='.$v)->queryOne();
            if(in_array($data[$k]['id'],$idArr)){
                $data[$k]['checked'] = true;
            }
            $data[$k]['children'] = $this->getTree($v,$id);
        }
        return $data;
    }

    /**
     * 搜索关键分类
     * @param $keyWords
     * @Obelisk
     */
    public function searchCat($keyWords){
        $where = '1=1';
        if($keyWords){
            $where .= " AND name like '%$keyWords%'";
        }
        $sql = "select id,name from {{%category}} WHERE $where";
        $data = \Yii::$app->db->createCommand($sql)->queryAll();
        return $data;
    }

    /**
     *
     * @Obelisk
     */
    public function getTag(){
        $sql = "select id,name as text from {{%category}} WHERE pid = 147";
        $data = \Yii::$app->db->createCommand($sql)->queryAll();
        return $data;

    }
}
