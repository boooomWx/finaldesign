<?php
/**
 * Created by PhpStorm.
 * User: boom
 * Date: 2018/3/27
 * Time: 13:51
 */

require_once APPPATH . '/controllers/Base_Controller.php';

class Item_detail extends Base_Controller {

    function __construct() {
        parent::__construct();
        $this->load->service('item_service');
        $this->load->service('comment_service');
    }

    public function index_get() {
        $iid = $this->get('iid');
        $item_detail = $this->item_service->get_item_detail($iid);
        $comments = $this->comment_service->get_item_comments($iid);
        $data['item_detail'] = $item_detail;
        $data['comments'] = $comments;
        $this->put('item_detail', '商详', $data);
    }
}