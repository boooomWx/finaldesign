<?php
/**
 * Created by PhpStorm.
 * User: boom
 * Date: 2018/3/28
 * Time: 21:35
 */


class Shop_Service extends Base_Service
{

    function __construct()
    {
        parent::__construct();
        $this->load->service('item_service');
        $this->load->model('shop_model');
        $this->load->service('comment_service');
    }

    public function get_shop_info($shop_id) {
        $shop_id = intval($shop_id);
        if ($shop_id < 1) {
            return false;
        }
        $shop_info = $this->shop_model->get_by_id($shop_id);
        $shop_info->distance = $this->item_service->get_fake_distance();
        return $shop_info;
    }

    public function get_shop_comments($items) {
        $comments = array();
        if (!empty($items)) {
            foreach ($items as $item) {
                $comment = $this->comment_service->get_item_comments($item->id);
                $comments = array_merge($comments, $comment);
            }
        }
        return $comments;
    }

}