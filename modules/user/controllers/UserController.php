<?php
/**
 * 分类管理
 * Created by PhpStorm.
 * User: Administrator
 * Date: 15-6-17
 * Time: 下午2:37
 */
namespace app\modules\user\controllers;


use yii;
use app\libs\ApiControl;
use app\modules\user\models\User;
use app\modules\basic\models\Role;
class UserController extends ApiControl {
    public $enableCsrfValidation = false;
    public function actionIndex()
    {
        $session  = Yii::$app->session;
        $userId = $session->get('adminId');
        if(!$userId){
            $this->redirect('/user/login/index');
        } else{
            $uid  = Yii::$app->request->get('uid','');    //UID
            $userName  = Yii::$app->request->get('userName','');   //用户名
            $nickName = Yii::$app->request->get('nickName','');    //昵称
            $role = Yii::$app->request->get('role','');       //角色
            $email = Yii::$app->request->get('email','');     //邮箱
            $phone = Yii::$app->request->get('phone','');     //电话
            $page = Yii::$app->request->get('page',1);
            $where="1=1";
            if($uid){
                $where .= " AND u.uid ='$uid'";
            }
            if($userName){
                $where .= " AND u.username like '%".$userName."%'";
            }
            if($nickName){
                $where .= " AND u.nickname like '%".$nickName."%'";
            }
            if($role){
                $where .= " AND u.roleId ='$role'";
            }
            if($email){
                $where .= " AND u.email like '%".$email."%'";
            }
            if($phone){
                $where .= " AND u.phone like '%".$phone."%'";
            }
//            var_dump($where);die;
            $model = new User();
            $order = ' ORDER BY u.createTime DESC';
            $data = $model->getAllUser($where,$order,$page,25);
            $role = Role::find()->asArray()->select(['id','name'])->all();
            return $this->render('index',['data'=>$data,'role'=>$role]);
        }
    }

    /**
     * 修改用户角色
     * by Yanni
     */
    public function actionUpdate(){
        $uid = Yii::$app->request->get('id');
        $model = new User();
        $data = $model->findOne($uid);
        $role = Role::find()->asArray()->select(['id','name'])->all();
//            var_dump($data['nickname']);die;
        return $this->render('update',['data'=>$data,'role'=>$role]);
    }

    public function actionUpdateRole(){
        $session  = Yii::$app->session;
        $userData = $session->get('adminData');
        if($userData['roleId']==1){
            $uid = Yii::$app->request->post('uid');
            $roleId = Yii::$app->request->post('role');
            $model = new User();
            $res = $model->findOne($uid);
            $res->roleId = $roleId;
            $re = $res->save();
            if($re){
                die( '<script>alert("修改用户角色成功");history.go(-1);</script>');
            } else {
                die( '<script>alert("修改失败");history.go(-1);</script>');
            }
        } else {
            die( '<script>alert("你还不是管理员不能修改用户角色");history.go(-1);</script>');
        }
    }
}