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
            $user['avatar'] = base_url() . '/resource/img/default-user-img2.jpg';
        }
        $data['user'] = $user;
        $this->put('user', '订单页面', $data);

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

    public function userinfo_get() {
        $user = $this->session->user;
        if (empty($user['avatar'])) {
            $user['avatar'] = base_url() . '/resource/img/default-user-img2.jpg';
        }
        $user_info = $this->user_service->get_user_info();
        $user['address'] = '暂未填写';
        if (!empty($user_info['address'])) {
            $user['address'] = $user_info['address'];
        }
        $data['user'] = $user;

        $this->put('userinfo', '个人信息', $data);
    }

    public function userinfo_change_get() {
        $scene = $this->get('scene');
        $scene_content = $this->get('scene_content');
        if (!$scene || !$scene_content) {
            $this->api_error('信息没填写完全');
        }
        $result = $this->user_service->change_userinfo($scene, $scene_content);
        if ($result) {
            $user = $this->session->user;
            $user['name'] = $scene_content;
            $this->session->user = $user;
            $this->api_success(array());
        } else {
            $this->api_error('服务器出了点问题，请稍候再试');
        }
    }

    public function name_change_get() {
        $user = $this->session->user;
        if (!$user) {
            $this->redirect('/login/index');
        }
        $data['name'] = $user['name'];
        $this->put('change_name','修改名字', $data);
    }

    public function avatar_change_get() {
        $user = $this->session->user;
        if (!$user) {
            $this->redirect('/login/index');
        }
        $data['avatar'] = $user['avatar'];
        $this->put('change_avatar','个人头像', $data);
    }

    public function change_avatar_post() {
        $avatar = $this->upload('avatar','avatar');
        if ($avatar['status'] === FALSE) {
            $this->api_error('服务器有点调皮，请稍候再试');
        }
        $result = $this->user_service->change_userinfo('avatar', $avatar['result']);
        if ($result) {
            $user = $this->session->user;
            $user['avatar'] = $avatar['result'];
            $this->session->user = $user;
            $this->redirect('/user/avatar_change');
        } else {
            $this->api_error('服务器出了点问题，请稍候再试');
        }
    }

    public function exit_get() {
        $this->session->sess_destroy();
        $this->redirect('/home/index');
    }

}