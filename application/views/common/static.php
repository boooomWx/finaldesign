<?php
/**
 * Created by PhpStorm.
 * User: boom
 * Date: 2018/3/10
 * Time: 20:06
 */

function staticCss($modelName){
    echo '<link href="'.base_url().'/resource/bootstrap/css/bootstrap.min.css" rel="stylesheet">';
    echo '<link href="//netdna.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">';
//    echo '<link rel="stylesheet" href="http://www.dpfile.com/app/dpindex-new-static/static/index.min.e4b57d8ef076a49c3d8a3955202a0592.css">';
    echo '<link rel="stylesheet" href="'.base_url().'/resource/'.$modelName.'/'.$modelName.'.css">';
    echo '<link rel="stylesheet" href="'.base_url().'/resource/common/goodlist.css">';
}

function staticJs($modelName){
    echo '<script src="https://cdn.bootcss.com/jquery/3.3.1/jquery.min.js"></script>';
    echo '<script src="'.base_url().'/resource/common.min.js"></script>';
    echo '<script src="'.base_url().'/resource/bootstrap/js/bootstrap.js"></script>';
    echo '<script src="'.base_url().'/resource/'.$modelName.'/'.$modelName.'.js"></script>';
}