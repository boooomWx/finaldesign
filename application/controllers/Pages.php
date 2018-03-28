<?php
/**
 * Created by PhpStorm.
 * User: boom
 * Date: 2018/3/3
 * Time: 19:20
 */

require_once APPPATH . '/controllers/Base_Controller.php';

class Pages extends Base_Controller {

    public function view($page = 'home') {
        if ( ! file_exists(APPPATH.'views/pages/'.$page.'.php'))
        {
            // Whoops, we don't have a page for that!
            show_404();
        }

        $data['title'] = ucfirst($page); // Capitalize the first letter

        $this->load->view('pages/'.$page, $data);
        }
}