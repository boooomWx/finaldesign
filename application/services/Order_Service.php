<?php
/**
 * Created by PhpStorm.
 * User: boom
 * Date: 2018/3/29
 * Time: 9:51
 */

require_once APPPATH . '/services/Base_Service.php';

class Order_Service extends Base_Service {


    static public $category_map = array(
        'all' => array(1,2,3,4,5),
        'wait_pay' => array(1),
        'available' => array(2),
        'refund' => array(4,5),
    );

    static public $status_map = array(
        '1' => '待支付',
        '2' => '待使用',
        '3' => '已消费',
        '4' => '退款中',
        '5' => '已退款',
    );

    function __construct()
    {
        parent::__construct();
        $this->load->model('order_model');
        $this->load->model('shop_model');
        $this->load->model('item_model');
    }

    public function get_user_order($uid) {
        $orders = $this->order_model->list_by_uid($uid);
        $orders = $this->convert_order($orders);
        return $orders;
    }

    public function convert_order($orders) {
        if (empty($orders)) {
            return false;
        }
        if (is_array($orders)) {
            foreach ($orders as $order) {
                $order->gmt_modified = date('Y-m-d H:i:s', $order->gmt_modified);
                $item = $this->item_model->get_by_id($order->iid);
                $shop = $this->shop_model->get_by_id($item->shop_id);
                $order->shop_name = $shop->shop_name;
                $order->status = self::$status_map[$order->status];
            }
        } else {
            $orders->gmt_modified = date('Y-m-d H:i:s', $orders->gmt_modified);
            $orders->gmt_create = date('Y-m-d H:i:s', $orders->gmt_create);
            $item = $this->item_model->get_by_id($orders->iid);
            $shop = $this->shop_model->get_by_id($item->shop_id);
            $orders->shop_name = $shop->shop_name;
            $orders->tel = $this->session->user['tel'];
            $orders->status = self::$status_map[$orders->status];
        }
        return $orders;
    }

    public function list_by_page_uid($page, $page_size, $category, $uid) {
        $uid = intval($uid);
        if ($uid < 1) {
            return false;
        }
        if (empty(self::$category_map[$category])) {
            return false;
        }
        $order_list = $this->order_model->list_by_page_uid($page,$page_size,self::$category_map[$category], $uid);
        $order_list = $this->convert_order($order_list);
        return $order_list;
    }

    public function order_delete($oid) {
        if (intval($oid) < 1) {
            return false;
        }
        $status = 0;
        $result = $this->order_model->update_by_id($oid,$status);
        return $result;
    }

    public function get_order_detail($oid) {
        if (intval($oid) < 1) {
            return false;
        }
        $order_detail = $this->order_model->get_by_id($oid);
        $order_detail = $this->convert_order($order_detail);
        return $order_detail;
    }
}