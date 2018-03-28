<?php
/**
 * Created by PhpStorm.
 * User: boom
 * Date: 2018/3/27
 * Time: 14:11
 */

class Comment_model extends Base_Model {

    public function list_by_iid($iid) {
        $iid = intval($iid);
        if ($iid < 1) {
            return false;
        }
        $comments = $this->db->get_where('comment', array('iid' => $iid))->result();
        return $comments;
    }
}
