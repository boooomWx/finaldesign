<?php
/**
 * Created by PhpStorm.
 * User: boom
 * Date: 2018/3/29
 * Time: 18:15
 */

require_once APPPATH . '/controllers/Base_Controller.php';

class Map extends Base_Controller {

    public function index_get() {
        $this->put('map', '定位');
    }
}