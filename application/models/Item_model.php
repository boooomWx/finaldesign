<?php
/**
 * Created by PhpStorm.
 * User: boom
 * Date: 2018/3/25
 * Time: 20:32
 */

require_once APPPATH . '/models/Base_Model.php';

class Item_model extends Base_Model {

    public function add($uid, $title, $desc, $image, $old_price, $price) {
        $uid = intval($uid);
        $title = trim($title);
        $desc = trim($desc);
        $image = trim($image);
        $old_price = intval($old_price);
        $price = intval($price);
        if ($uid < 1 || !$title || !$desc || !$image || $old_price < 1 || $price < 1) {
            return FALSE;
        }
        $now = time();
        $result = $this->db->query("INSERT INTO item (`uid`, `title`, `desc`, `image`, `old_price`, `price`, `gmt_create`) VALUES ('$uid','$title','$desc','$image','$old_price','$price','$now')");
        return $result;
    }

    public function get_by_id($id) {
        $id = intval($id);
        if ($id < 1) {
            return false;
        }
        $result = $this->db->get_where('item', array('id'=>$id))->row();
        return $result;
    }

    public function get_by_shop_id($shop_id) {
        $shop_id = intval($shop_id);
        if ($shop_id < 1) {
            return false;
        }
        $result = $this->db->get_where('item', array('shop_id'=>$shop_id))->row();
        return $result;
    }

    public function list_by_ids($ids) {
        if (!is_array($ids)) {
            return false;
        }
        $ids = implode(',',$ids);
        $result = $this->db->query('SELECT * FROM item WHERE id IN (?)', array($ids))->result();
        return $result;
    }

    public function list_by_page($page, $page_size) {
        $page = intval($page);
        $page_size = intval($page_size);
        if ($page < 1) {
            $page = 1;
        }
        if ($page_size < 1) {
            $page_size = 10;
        }
        $result = $this->db->query("SELECT * FROM item LIMIT ?,?" ,array(($page-1)*$page_size, $page_size))->result();
        return $result;
    }
}