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
     * 获取个人信息
     */
    public function get_user_info()
    {
        $uid = $this->session->user['uid'];
        if (!$uid) {
            return false;
        }
        $user_info = $this->user_model->get_by_id($uid);
        return $user_info;
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
                    'avatar' => $tel_res->avatar ?: base_url().'/resource/img/default-user-img2.jpg',
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
    public function do_register($tel, $password,$verify_code) {
        if ($verify_code != $this->session->verify_code) {
            return '验证码错误';
        }
        $tel_len = strlen($tel);
        if ($tel_len != 11) {
            return '手机号码不符合规范，请重试';
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
        $name = '手机用户'.$tel;
        $res = $this->user_model->add($tel, $name, $password);
        if (!$res) {
            return '网络出现了点问题，请稍后再试';
        }
        return array("success" => true);
    }

    public function change_password($tel, $password,$verify_code) {
        if ($verify_code != $this->session->verify_code) {
            return '验证码错误';
        }
        $tel_len = strlen($tel);
        if ($tel_len != 11) {
            return '手机号码不符合规范，请重试';
        }
        $have_special_char = $this->have_special_char($password);
        if ($have_special_char) {
            return '密码含有特殊字符，请修改后重新输入';
        }
        if (preg_match("/[\x7f-\xff]/", $password)) {
            return '密码不能有中文';
        }
        $user = $this->user_model->get_by_tel($tel);
        if (!$user) {
            return '该手机号还没注册过,请注册';
        }
        $data = array('password' => md5($password));
        $res = $this->user_model->update_by_id($user->id, $data);
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

    public function change_userinfo($scene, $scene_content) {
        $user = $this->session->user;
        $uid = $user['uid'];
        $data[$scene] = $scene_content;
        $result = $this->user_model->update_by_id($uid, $data);
        return $result;
    }

}