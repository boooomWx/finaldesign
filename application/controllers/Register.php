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
        $this->put('register', '注册', null);
    }

    public function do_register_post() {
        $tel = $this->post('tel');
        $name = $this->post('name');
        $password = $this->post('password');
        $password_validate = $this->post('password_validate');
        if ($password != $password_validate) {
            $this->api_error('两次输入密码不一致，请重试');
        }
        $register_res = $this->user_service->do_register($tel, $name, $password);
        if (isset($register_res['success'])) {
            $this->api_success(array());
        }
        $this->api_error($register_res);
    }
}