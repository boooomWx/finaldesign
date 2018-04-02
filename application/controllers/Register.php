<?php
/**
 * Created by PhpStorm.
 * User: boom
 * Date: 2018/3/24
 * Time: 10:29
 */

require_once APPPATH . '/controllers/Base_Controller.php';

class Register extends Base_Controller {
    function __construct()
    {
        parent::__construct();
        $this->load->service('user_service');
    }

    public function index_get() {
        $this->put('register', '用户注册', null);
    }

    public function change_password_get() {
        $this->put('change_password', '修改密码', null);
    }

    public function do_register_post() {
        $tel = $this->post('tel');
        $verify_code = $this->post('verify_code');
        $password = $this->post('password');
        $password_validate = $this->post('password_validate');
        if ($password != $password_validate) {
            $this->api_error('两次输入密码不一致，请重试');
        }
        $register_res = $this->user_service->do_register($tel, $password,$verify_code);
        if (isset($register_res['success'])) {
            $this->api_success(array());
        }
        $this->api_error($register_res);
    }

    public function change_password_post() {
        $tel = $this->post('tel');
        $verify_code = $this->post('verify_code');
        $password = $this->post('password');
        $password_validate = $this->post('password_validate');
        if ($password != $password_validate) {
            $this->api_error('两次输入密码不一致，请重试');
        }
        $register_res = $this->user_service->change_password($tel, $password,$verify_code);
        if (isset($register_res['success'])) {
            $this->api_success(array());
        }
        $this->api_error($register_res);
    }
}