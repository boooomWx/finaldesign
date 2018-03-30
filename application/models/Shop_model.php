<?php
/**
 * Created by PhpStorm.
 * User: boom
 * Date: 2018/3/26
 * Time: 13:50
 */

require_once APPPATH . '/models/Base_Model.php';

class Shop_model extends Base_Model
{

    public function get_by_id($id) {
        $id = intval($id);
        if ($id < 1) {
            return false;
        }
        $result = $this->db->get_where('shop', array('id'=>$id))->row();
        return $result;
    }

    public function list_by_page($page, $page_size, $category)
    {
        $page = intval($page);
        $page_size = intval($page_size);
        if ($page < 1) {
            $page = 1;
        }
        if ($page_size < 1) {
            $page_size = 10;
        }
        if ($category == null) {
            $result = $this->db->query("SELECT * FROM shop LIMIT ?,?", array(($page - 1) * $page_size, $page_size))->result();
        } else {
            $result = $this->db->query("SELECT * FROM shop WHERE category = ? LIMIT ?,?", array($category, ($page - 1) * $page_size, $page_size))->result();
        }
        return $result;
    }
}