<?php
/**
 * Created by PhpStorm.
 * User: boom
 * Date: 2018/3/21
 * Time: 9:15
 */

require_once APPPATH . '/controllers/Base_Controller.php';
class Home extends Base_Controller
{
    public function index_get() {
        $data = array();
        $this->load->service('account_service');
        if ($this->session->user) {
            $data['user'] = $this->account_service->get_user_info();
            $data['user']['is_login'] = TRUE;
        } else {
            $data['user']['is_login'] = FALSE;
        }
        $this->load->service('item_service');
        $data['nearby_items'] = $this->item_service->list_items(1,2);
        $data['items'] = $this->item_service->list_items(1,2);
        $this->put('home', '主页', $data);
    }
}