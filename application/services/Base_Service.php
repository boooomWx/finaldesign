<?php
/**
 * Created by PhpStorm.
 * User: boom
 * Date: 2018/3/21
 * Time: 19:08
 */

class Base_Service extends M_Service
{
    function __construct()
    {
        parent::__construct();
        $this->load->library('session');
    }
}