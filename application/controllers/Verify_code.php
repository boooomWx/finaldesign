<?php
/**
 * Created by PhpStorm.
 * User: boom
 * Date: 2018/3/31
 * Time: 18:36
 */

require_once APPPATH . '/controllers/Base_Controller.php';
require_once APPPATH . '/services/MessageApi.php';


class Verify_code extends Base_Controller
{

    public function verify_code_get() {
        $tel = $this->get('tel');
        $this->load->service('message_service');
        $result = $this->message_service->message_send($tel);
        if ($result) {
            $this->api_success(array());
        } else {
            $this->api_error('验证码获取失败');
        }
    }
}