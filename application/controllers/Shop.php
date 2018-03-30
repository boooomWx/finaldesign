<?php
/**
 * Created by PhpStorm.
 * User: boom
 * Date: 2018/3/28
 * Time: 21:32
 */

require_once APPPATH . '/controllers/Base_Controller.php';

class Shop extends Base_Controller {

    function __construct() {
        parent::__construct();
        $this->load->service('item_service');
        $this->load->service('shop_service');
    }

    public function index_get() {
        $shop_id = $this->get('shop_id');
        $shop_info = $this->shop_service->get_shop_info($shop_id);
        $items = $this->item_service->list_items_by_shop_id($shop_id);
        $comments = $this->shop_service->get_shop_comments($items);
        $data['shop_info'] = $shop_info;
        $data['items'] = $items;
        $data['comments'] = $comments;
        $this->put('shop', '商家详情', $data);
    }
}