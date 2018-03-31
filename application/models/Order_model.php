<?php
/**
 * Created by PhpStorm.
 * User: boom
 * Date: 2018/3/29
 * Time: 9:55
 */

require_once APPPATH . '/models/Base_Model.php';

class Order_model extends Base_Model
{

    public function add($iid, $uid, $sid, $title, $price, $num, $image)
    {
        $iid = intval($iid);
        $uid = intval($uid);
        $sid = intval($sid);
        $price = intval($price);
        $num = intval($num);
        if ($iid < 1 || $uid < 1 || !$title || $price < 1 || $num < 1 || $sid < 1 || !$image) {
            return false;
        }
        $status = 1;
        $now = time();
        $result = $this->db->query("INSERT INTO `order` (`iid`, `uid`, `sid`,`status`, `title`, `price`, `num`, `image`, `gmt_create`, `gmt_modified`) VALUES ('$iid','$uid','$sid','$status','$title','$price','$num','$image','$now','$now')");
        return $result;
    }

    public function list_by_uid($uid)
    {
        $uid = intval($uid);
        if ($uid < 1) {
            return false;
        }
        $result = $this->db->get_where('order', array('uid' => $uid))->result();
        return $result;
    }

    public function get_by_id($id)
    {
        $id = intval($id);
        if ($id < 1) {
            return false;
        }
        $result = $this->db->get_where('order', array('id' => $id))->row();
        return $result;
    }

    public function update_by_id($oid, $status)
    {
        $now = time();
        $data['gmt_modified'] = $now;
        $data['status'] = $status;
        $str = $this->db->update_string('order', $data, array('id' => $oid));
        $result = $this->db->query($str);
        return $result;
    }

    public function list_by_page_uid($page, $page_size, $status, $uid)
    {
        $page = intval($page);
        $page_size = intval($page_size);
        $uid = intval($uid);
        if ($uid < 1) {
            return false;
        }
        if ($page < 1) {
            $page = 1;
        }
        if ($page_size < 1) {
            $page_size = 10;
        }
        $status = implode(',', $status);
        $result = $this->db->query('SELECT * FROM  `order` WHERE uid = ? AND `status` in (?) ORDER BY id DESC limit ?,?', array($uid, $status, ($page - 1) * $page_size, $page_size))->result();
        return $result;
    }
}