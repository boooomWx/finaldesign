<?php
/**
 * Created by PhpStorm.
 * User: boom
 * Date: 2018/3/22
 * Time: 10:02
 */


require_once APPPATH . '/controllers/Base_Controller.php';
class Login extends Base_Controller {
    function __construct()
    {
        parent::__construct();
        $this->load->service('user_service');
    }

    public function index_get() {
        $this->session->sess_destroy();
        $is_login = $this->user_service->is_login();
        if($is_login){
            $this->redirect('/home/index');
        }else{
            $this->put('login', '用户登录', null);
        }
    }

    /**
     * 登录
     */
    public function login_check_post() {
        $tel = $this->post('tel');
        $password = $this->post('password');
        if (!$tel || !$password) {
            $this->api_error('缺少参数');
        }
        $login_res = $this->user_service->login_check($tel, $password);
        if (isset($login_res['success'])) {
            $this->api_success(array());
        } else {
            $this->api_error($login_res);
        }
    }
}