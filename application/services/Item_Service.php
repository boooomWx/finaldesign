<?php
/**
 * Created by PhpStorm.
 * User: boom
 * Date: 2018/3/26
 * Time: 13:24
 */

require_once APPPATH . '/services/Base_Service.php';

class Item_Service extends Base_Service {

    function __construct()
    {
        parent::__construct();
        $this->load->model('item_model');
        $this->load->model('shop_model');
    }


    /**
     * 获取商详信息
     * @param $iid
     * @return bool
     */
    public function get_item_detail($iid) {
        $item_detail = $this->item_model->get_by_id($iid);
        if (empty($item_detail)) {
            return false;
        }
        $shop = $this->shop_model->get_by_id($item_detail->shop_id);
        $item_detail->shop = $shop;
        $item_detail->distance = $this->get_fake_distance();
        return $item_detail;
    }

    /**
     * 获取商品列表
     * @param $page
     * @param $page_size
     * @param null $category
     * @return array|bool
     */
    public function list_items($page, $page_size, $category = null) {
        $shops = $this->shop_model->list_by_page($page, $page_size, $category);
        if (empty($shops)) {
            return false;
        }
        $items = $this->convert_items($shops);
        return $items;
    }

    /**
     * 以店家搜索商品，然后再以商品作为主键
     */
    public function convert_items($shops) {
        $items = array();
//        $shop_ids 此处可做优化，找出shop_ids去查所有的items
        foreach ($shops as $shop) {
            $item = $this->item_model->get_by_shop_id($shop->id);
            if (empty($item)) {
                continue;
            }
            $item->shop = $shop;
            $item->distance = $this->get_fake_distance();
            $items[] = $item;
        }
        return $items;
    }

    /**
     * 伪造距离
     * @return string
     */
    public function get_fake_distance() {
        $fake_distance = rand(1,3000);
        if ($fake_distance > 1000) {
            $distance = number_format($fake_distance / 1000, 1) . 'km';
        } else {
            $distance = $fake_distance . 'm';
        }
        return $distance;
    }
}