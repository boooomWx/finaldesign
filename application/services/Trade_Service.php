<?php
/**
 * Created by PhpStorm.
 * User: boom
 * Date: 2018/3/30
 * Time: 14:33
 */


require_once APPPATH . 'services/Base_Service.php';
require_once APPPATH . 'services/SubmitPay.php';

class Trade_Service extends Base_Service {

    function __construct()
    {
        parent::__construct();
        $this->load->model('item_model');
        $this->load->model('order_model');
    }

    public function get_order_detail($iid) {
        $item_info = $this->item_model->get_by_id($iid);
        if (!empty($item_info)) {
            $result = array(
                'title' => $item_info->title,
                'price'=> $item_info->price,
                'image' => $item_info->image,
                'iid' => $iid,
                'sid' => 10086,
                'num' => 1
            );
            return $result;
        }
        return false;
    }

    public function create_order($iid,$sid,$title,$price,$num,$image) {
        $uid = $this->session->user['uid'];
        $result = $this->order_model->add($iid,$uid,$sid,$title,$price,$num,$image);
        return $result;
    }

    public function do_alipay_submit($oid,$title,$price) {
        $payBody = array(
            'product_code' => 'FAST_INSTANT_TRADE_PAY',
            'out_trade_no' => $oid,
            'subject' =>  $title,
            'total_amount' => $price,
            'body' =>  $title
        );
        $submitPay = new SubmitPay();
        $result = $submitPay->submit($payBody,$oid);
        echo $result;
    }

    public function pay_success($oid){
        $status = 2;
        $result = $this->order_model->update_by_id($oid, $status);
        return $result;
    }
}