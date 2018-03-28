<?php
/**
 * Created by PhpStorm.
 * User: boom
 * Date: 2018/3/27
 * Time: 14:09
 */

require_once APPPATH . '/services/Base_Service.php';

class Comment_Service extends Base_Service {

    function __construct()
    {
        parent::__construct();
        $this->load->model('comment_model');
        $this->load->service('user_model');
    }

    public function get_item_comments($iid) {
        $iid = intval($iid);
        if ($iid < 1) {
            return false;
        }
        $comments = $this->comment_model->list_by_iid($iid);
        if (!empty($comments)) {
            foreach ($comments as $comment) {
                $comment->avatar = 'default';
                $comment->nick = '火星人';
                $user_info = $this->user_model->get_by_id($comment->uid);
                if ($user_info) {
                    $comment->avatar = $user_info->avatar;
                    $comment->nick = $user_info->nick;
                }
            }
        }
        return $comments;
    }
}