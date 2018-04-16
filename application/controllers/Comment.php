<?php
/**
 * Created by PhpStorm.
 * User: boom
 * Date: 2018/4/7
 * Time: 12:55
 */

require_once APPPATH . '/controllers/Base_Controller.php';

class Comment extends Base_Controller {

    function __construct() {
        parent::__construct();
        $this->load->service('comment_service');
    }

    public function index_get() {
        $iid = $this->get('iid');
        if (intval($iid) < 1) {
            $this->redirect('/home/index');
        }
        $user = $this->session->user;
        if (empty($user)) {
            $this->redirect('/login/index');
        }
        $data['iid'] = $iid;
        $this->put('comment', '评论页面', $data);
    }

    public function comment_post() {
        $iid = $this->post('iid');
        $content = $this->post('content');
        $score = $this->post('score');
        $images = '';
        if ($_FILES['images']) {
            $images_result = $this->upload('comment','images');
            if ($images_result['status'] === FALSE) {
                $this->api_error('服务器有点调皮，请稍候再试');
            }
            $images = $images_result['result'];
        }
        $result = $this->comment_service->save_comment($iid, $score, $content, $images);
        if ($result) {
            $this->redirect('/item_detail/index?iid='.$iid);
        }

    }
}