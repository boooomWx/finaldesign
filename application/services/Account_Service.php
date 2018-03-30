<?php
/**
 * Created by PhpStorm.
 * User: boom
 * Date: 2018/3/21
 * Time: 19:06
 */

require_once APPPATH . '/services/Base_Service.php';

class Account_Service extends Base_Service
{
    function __construct()
    {
        parent::__construct();
//        $this->load->model('order_model');
        $this->load->model('user_model');
    }

    /**
     * 获取个人信息
     */
    public function get_user_info()
    {
        $uid = $this->session->user['uid'];
        if (!$uid) {
            return [];
        }
        $user_info = $this->user_model->get_by_id($uid);
        return $user_info;
    }
}