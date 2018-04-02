<?php
/**
 * Created by PhpStorm.
 * User: boom
 * Date: 2018/3/31
 * Time: 15:42
 */

class MessageApi
{
    public function messageSend($mobile, $content)
    {

        require_once(APPPATH . 'third_party\SmsAPIDemo\lib\SmsSendConn.php');
        $url = 'http://api01.monyun.cn:7901/sms/v2/std/';
        $smsSendConn = new SmsSendConn($url);
        $data=array();
        $data['userid']='E102OP';
        $data['pwd']='5BsY2J';
        /*
        * 单条发送 接口调用
        */
        $data['mobile'] = $mobile;
        $data['content'] = '您的验证码是'.$content.'，在10分钟内输入有效。如非本人操作请忽略此短信。';
        $data['svrtype'] = '';
        $data['exno'] = '';
        $data['custid'] = '';
        $data['exdata'] = '';
        try {
            $result = $smsSendConn->singleSend($data);
            if ($result['result'] === 0) {
                return true;
            } else {
                return false;
            }
        } catch (Exception $e) {
            print_r($e->getMessage());
            return false;
        }
    }
}