<?php
/**
 * Created by PhpStorm.
 * User: boom
 * Date: 2018/3/10
 * Time: 20:41
 */

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';

class Base_Controller extends REST_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('session');
    }

    /**
     * 封装模版加载函数
     */
    public function put($tplName='',$pageTitle='',$data=NULL,$needSession=FALSE,$needPath=TRUE){
        $data['page'] = $tplName;
        if($needPath){
            $tplName = 'pages/'.$tplName;
        }
        if($needSession){
            $data['session'] = $this->session->user;
        }
        $data['page_title'] = $pageTitle;
        $this->load->view($tplName, $data);
    }


    /**
     * 需要登录
     */

    public function needLogin(){
        $this->load->service('user/user_service');
        $isLogin = $this->user_service->is_login();
        if(!$isLogin){
            $this->redirect('/user/login');
        }
    }


    /**
     * 封装api请求成功函数
     */

    public function api_success($data)
    {
        $result = array(
            'http_code' => REST_Controller::HTTP_OK,
            'success' => true,
            'message' => 'OK',
            'data' => $data
        );
        $this->response($result);
    }

    /**
     * 封装api请求错误函数
     */

    public function api_error($message)
    {
        $result = array(
            'http_code' => REST_Controller::HTTP_OK,
            'success' => false,
            'message' => $message,
            'data' => NULL
        );
        $this->response($result);
    }
//
//    /**
//     * 封装跳转函数
//     */
//
//    public function redirect($redirectUri){
//        $pageUri = uri_string();
//        if($pageUri == ''){
//            $url = 'http://'.$_SERVER['HTTP_HOST'].$redirectUri.'.html';
//        }
//        else{
//            $url = 'http://'.$_SERVER['HTTP_HOST'].$redirectUri.'.html?redirect_url=/'.$pageUri;
//        }
//        redirect($url);
//    }
//
//    /**
//     * 自动跳转函数
//     */
//
//    public function autoRedirect(){
//        $redirectUrl = $this->get('redirect_url');
//        if($redirectUrl){
//            $this->redirect($redirectUrl);
//        }else{
//            $this->redirect('/home/index');
//        }
//    }

    /**
     * redirect跳转封装
     */
    public function redirect($redirect_uri) {
        redirect(base_url().'index.php'.$redirect_uri);
    }
}