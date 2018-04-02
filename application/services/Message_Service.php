<?php
/**
 * Created by PhpStorm.
 * User: boom
 * Date: 2018/3/31
 * Time: 19:38
 */

require_once APPPATH . '/services/Base_Service.php';

class Message_Service extends Base_Service
{
    public function message_send($tel) {
        $MessageApi = new MessageApi();
        $verify_code = rand(100000,999999);
        $this->session->verify_code = $verify_code;
        $result = $MessageApi->messageSend($tel,$verify_code);
        return $result;
    }
}