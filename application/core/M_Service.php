<?php
/**
 * Created by PhpStorm.
 * User: boom
 * Date: 2018/3/21
 * Time: 19:09
 */

//添加service层
class M_Service
{
    public function __construct()
    {
        log_message('debug', "Service Class Initialized");

    }

    function __get($key)
    {
        $CI = & get_instance();
        return $CI->$key;
    }
}