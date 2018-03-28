<?php
/**
 * Created by PhpStorm.
 * User: boom
 * Date: 2018/3/26
 * Time: 13:54
 */

require_once APPPATH . '/controllers/Base_Controller.php';

class Item extends Base_Controller
{
    function __construct() {
        parent::__construct();
        $this->load->service('item_service');
    }

    public function item_get() {
        $page = $this->get('page');
        $page_size = $this->get('page_size');
        $category = $this->get('category');
        $result = $this->item_service->list_items($page, $page_size, $category);
        if ($result == false) {
            $this->api_error('暂时没有商品哦');
        }
        $this->api_success($result);
    }

    public function category_item_get() {
        $category = $this->get('category');
        $items = $this->item_service->list_items(1, 10, $category);
        $data['items'] = $items;
        $this->put('category', '分类页', $data);
    }
}