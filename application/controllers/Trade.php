<?php
/**
 * Created by PhpStorm.
 * User: boom
 * Date: 2018/3/30
 * Time: 14:00
 */

require_once APPPATH . '/controllers/Base_Controller.php';

class Trade extends Base_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->service('trade_service');
        $this->load->service('user_service');
        $this->needLogin();
    }

    public function buy_get() {
        $iid = $this->get('iid');
        if (!empty($iid)) {
            $result = $this->trade_service->get_order_detail($iid);
            if (empty($result)) {
                echo '找不到商品';
            } else {
                $this->redirect('/trade/pay?image='.$result['image'].'&title='.$result['title'].'&price='.$result['price'].'&iid='.$result['iid'].'&sid='.$result['sid'].'&num='.$result['num']);
            }
        } else {
            $this->redirect('/home/index');
        }
    }

    public function pay_get() {
        $iid = $this->get('iid');
        $sid = $this->get('sid');
        $title = $this->get('title');
        $price = $this->get('price');
        $image = $this->get('image');
        $num = $this->get('num');
        if (empty($title)||empty($price)||empty($iid)||empty($sid)||empty($num)||empty($image)) {
            echo '参数错误';
        }
        $result = $this->trade_service->create_order($iid,$sid,$title,$price,$num,$image);
        if ($result) {
            $this->redirect('/trade/submit?oid='.$result.'&title='.$title.'&price='.$price*$num);
        } else {
            echo '创建订单失败';
        }
    }

    public function submit_get() {
        $oid = $this->get('oid');
        $title = $this->get('title');
        $price = $this->get('price');
        $this->trade_service->do_alipay_submit($oid,$title,$price);
    }

    public function success_get(){
        $oid = $this->get('oid');
        $result = $this->trade_service->pay_success($oid);
        $this->redirect('/user/index');
    }
}