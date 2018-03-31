<?php
/**
 * Created by PhpStorm.
 * User: boom
 * Date: 2018/3/29
 * Time: 9:44
 */

require_once APPPATH . '/controllers/Base_Controller.php';

class User extends Base_Controller {


    function __construct() {
        parent::__construct();
        $this->load->service('user_service');
        $this->load->service('order_service');
    }

    public function index_get()
    {
        $user = $this->session->user;
        if (empty($user)) {
            $this->redirect('/login/index');
        }
        if (empty($user['avatar'])) {
            $user['avatar'] = base_url() . '/resource/img/nearby-img-1.jpg';
        }
//        $order_info = $this->order_service->get_user_order($user['uid']);
        $data['user'] = $user;
//        $data['order_info'] = $order_info;
        $this->put('user', '个人主页', $data);

    }

    public function order_post() {
        $page = $this->post('page');
        $page_size = $this->post('page_size');
        $category = $this->post('category');
        $user = $this->session->user;
        $result = $this->order_service->list_by_page_uid($page, $page_size, $category, $user['uid']);
        if ($result == false) {
            $this->api_error('您还没有订单哦');
        }
        $this->api_success($result);
    }

    public function order_delete_get() {
        $oid = $this->get('oid');
        $result = $this->order_service->order_delete($oid);
        if ($result) {
            $this->api_success(array());
        } else {
            $this->api_error('服务器出了点问题，请稍候再试');
        }
    }

    public function order_detail_get() {
        $oid = $this->get('oid');
        $order_detail = $this->order_service->get_order_detail($oid);
        $data['order_detail'] = $order_detail;
        $this->put('order_detail', '订单详情', $data);
    }
}