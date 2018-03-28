<?php
/**
 * Created by PhpStorm.
 * User: boom
 * Date: 2018/3/21
 * Time: 20:25
 */

require_once APPPATH . '/models/Base_Model.php';

class User_model extends Base_Model {
    public $table_name = 'users';

    public function add($tel, $name, $password) {
        $name = trim($name);
        $now = time();
        $password = md5($password);
        $result = $this->db->query("INSERT INTO `users` (`tel`, `name`, `password`, `gmt_create`) VALUES('$tel','$name','$password','$now')");
        return $result;
    }

    public function get_by_uid($uid) {
        $uid = intval($uid);
        if ($uid < 1) {
            return array();
        }
        $query = $this->db->get_where('users', array('id' => $uid));
        $result = $query->result_array();
        $result = $result[0];
        return $result;
    }

    public function get_by_tel($tel) {
        if ($tel < 1) {
            return array();
        }
        $query = $this->db->get_where('users', array('tel' => $tel));
        $result = $query->row();
//        $result = $this->db->query('SELECT * FROM users WHERE tel = ?', array($tel))->row();
        return $result;
    }
}