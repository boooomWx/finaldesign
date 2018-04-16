<?php
/**
 * Created by PhpStorm.
 * User: boom
 * Date: 2018/3/27
 * Time: 14:11
 */

require_once APPPATH . '/models/Base_Model.php';

class Comment_model extends Base_Model {

    public function add($iid, $uid, $score, $content, $images) {
        $iid = intval($iid);
        $uid = intval($uid);
        $score = intval($score);
        $content = trim($content);
        $images = trim($images);
        if ($iid < 1 || $uid <1 || $score <1 ||!$content) {
            return false;
        }
        $now = time();
        $result = $this->db->query("INSERT INTO `comment` (`iid`, `uid`, `score`, `content`, `image`,`gmt_create`) VALUES('$iid','$uid','$score','$content','$images','$now')");
        return $result;
    }

    public function list_by_iid($iid) {
        $iid = intval($iid);
        if ($iid < 1) {
            return false;
        }
        $comments = $this->db->get_where('comment', array('iid' => $iid))->result();
        return $comments;
    }
}
