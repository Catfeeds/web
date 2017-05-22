<?php
namespace app\libs\alipay\lib;
use yii;
use app\modules\pay\models\Order;
class UpdateOrder
{

    /**更新订单状态、付款时间
     * @param $order_id
     * @return array|string
     * by fawn
     * 2015-12-24
     */
    function updateStatus($order_id){
        $sign = Order::find()->where("orderNumber='$order_id'")->one();
        if((time() - $sign->createTime) <= 1800){
            $time = time();//付款时间
            Order::updateAll(['status' => 3,'payTime' => $time],"id=$sign->id");
            return true;
        }else{
            Order::deleteAll("id=$sign->id");
            return false;
        }
    }
    /**查询订单
     * @param $order_id
     * @return array
     * by fawn
     */
    function getOrder($order_id){
        $result = $this->db->get_row("SELECT * FROM  x2_myorder where order_id ='".$order_id."'",ARRAY_A);
        return $result;
    }
    /**查询订单详情
     * @param $order_id
     * @return array
     * by fawn
     */
    function getOrderDetails($order_id){
        $result = $this->db->get_row("SELECT * FROM  x2_myorder_details where order_id ='".$order_id."'",ARRAY_A);
        return $result;
    }
    /**查询用户信息
     * @param $userid
     * @return array
     * by fawn
     */
    function getuser($userid){
        $result = $this->db->get_row("SELECT * FROM  x2_user where userid =".$userid,ARRAY_A);
        return $result;
    }
    /**更新用户积分明细，积分流水，商品流水
     * @param $order_id
     * @return mixed
     * by fawn
     */
    function InsertRecord($order_id){
        $order = $this->getOrder($order_id);
        $details = $this-> getOrderDetails($order_id);
        $user = $this-> getuser($order['userid']);
        if(!empty($order)){
            //将积分抵扣写入积分消费明细表
            $inte['userid'] = $order['userid'];
            $inte['time'] = date('y-m-d');
            $inte['score'] = '-'.$order['leidou'];
            $inte['action'] = $details['title'];
            $inte['username'] = $user['username'];
            $inte['remarks'] =  $details['title'];
            if($order['leidou']>0){
                $addintegral =  $this-> addIntegral($inte);
            }
            //将积分抵扣金额消费记录表
            $integ['order_id'] = $order['order_id'];
            $integ['userid'] = $order['userid'];
            $integ['actions'] =$details['title'];
            $integ['time'] = time();
            $integ['Disbursements'] = '-'.$order['leidou'];
            $integ['status'] = '已付款';
            $integ['remarks'] = '消费积分';
            if($order['leidou']>0) {
                $addIntegralRecord =  $this-> addRecord($integ);
            }
            //将积分抵扣金额消费记录表
            $record['order_id'] = $order['order_id'];
            $record['userid'] = $order['userid'];
            $record['actions'] = $details['title'];
            $record['time'] = time();
            $record['Disbursements'] = '-'.$order['account'];
            $record['status'] = '已付款';
            $record['remarks'] = '购买物品';
            $addCommodityRecord =  $this-> addRecord($record);
            if($addintegral && $addIntegralRecord && $addCommodityRecord){
                $arr['code'] = 1;
                $arr['message'] = '更新成功！';
            }else{
                $arr['code'] = 0;
                $arr['message'] = '更新失败！';
            }
        }
        return $arr;
    }
    /**添加用户积分明细
     * @param $inte
     * @return resource
     * by fawn
     */
    function addIntegral($inte){
        $sql = "INSERT INTO x2_integrallog(userid,time,score,action,username,remarks)
        VALUES (".$inte['userid'].",'".$inte['time']."',".$inte['score'].",'".$inte['action']."','".$inte['username']."','".$inte['remarks']."')";
        $result =$this->db->query($sql);
        return $result;
    }
    /**添加积分流水
     * @param $args
     * @return resource
     * by fawn
     */
    function addRecord($args){
        $sql = "INSERT INTO x2_consumption_record(order_id,userid,actions,time,Disbursements,status,remarks)
        VALUES ('".$args['order_id']."',".$args['userid'].",'".$args['actions']."',".$args['time'].",'".$args['Disbursements']."','".$args['status']."','".$args['remarks']."')";
        $result = $this->db->query($sql);
        return $result;
    }
}

?>