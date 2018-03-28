<?php
/**
 * Created by PhpStorm.
 * User: boom
 * Date: 2018/3/22
 * Time: 14:08
 */

require_once APPPATH . '/services/Base_Service.php';

class User_Service extends Base_Service {

    public static $NAME_MIN_SIZE = 4;
    public static $NAME_MAX_SIZE = 21;

    function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
    }

    public function is_login() {
        $user = $this->session->user;
        if ($user == NULL) {
            return FALSE;
        } else {
            return TRUE;
        }
    }

    /**
     * 登录
     * @param $tel
     * @param $password
     * @return array|string
     */
    public function login_check($tel, $password) {
        $tel_res = $this->user_model->get_by_tel($tel);
        if (empty($tel_res)) {
            return '该手机号码不存在，请重新输入';
        } else {
            if (md5($password) == $tel_res->password) {
                $data = array(
                    'uid' => $tel_res->id,
                    'name' => $tel_res->name,
                    'avatar' => $tel_res->avatar,
                    'tel' => $tel,
                    'password' => md5($password)
                );
                $this->session->user = $data;
                $result = array(
                    'success' => TRUE,
                );
                return $result;
            } else {
                return '密码错误，请重试!';
            }
        }
    }

    /**
     * 注册
     * @param $tel
     * @param $name
     * @param $password
     * @return array|string
     */
    public function do_register($tel, $name, $password) {
        $this->session->sess_destroy();
        $tel_len = strlen($tel);
        if ($tel_len != 11) {
            return '手机号码不符合规范，请重试';
        }
        $is_name = $this->isName($name);
        if (!$is_name) {
            return '名字不符合规范,请重新输入';
        }
        $is_str_length = $this->is_str_length($name, self::$NAME_MIN_SIZE, self::$NAME_MAX_SIZE);
        if (!$is_str_length) {
            return '名字长度必须在2-7个汉字之间';
        }
        $have_special_char = $this->have_special_char($password);
        if ($have_special_char) {
            return '密码含有特殊字符，请修改后重新输入';
        }
        if (preg_match("/[\x7f-\xff]/", $password)) {
            return '密码不能有中文';
        }
        $user = $this->user_model->get_by_tel($tel);
        if ($user) {
            return '该手机号已经注册过，请登录';
        }
        $res = $this->user_model->add($tel, $name, $password);
        if (!$res) {
            return '网络出现了点问题，请稍后再试';
        }
        return array("success" => true);
    }

    function isName($val)
    {
        if( preg_match("/^[\x80-\xffa-zA-Z0-9]{3,60}$/", $val) )
        {
            return true;
        }
        return false;
    }

    public function is_str_length($val, $min, $max) {
        if (strlen($val)>=$min && strlen($val) <= $max) {
            return true;
        }
        return false;
    }

    public function have_special_char($val) {
        if(preg_match("/[\'.,:;*?~`!@#$%^&+=)(<>{}]|\]|\[|\/|\\\|\"|\|/",$val)){
            return true;
        }
        return false;
    }

}