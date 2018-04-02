<?php
/**
 * Created by PhpStorm.
 * User: boom
 * Date: 2018/3/31
 * Time: 14:05
 */

include APPPATH . 'views/templates/header.php';

?>


<div class="nav-top navbar-fixed-top">
    <div class="content">
        <i class="fa fa-angle-left fa-2x" onclick="javascript:history.back(-1);"><span
                    class="page-title border-font"><?php echo $page_title; ?></span></i>
    </div>
</div>

<!--<div class="user-avatar-content">-->
<!--    <img src="--><?php //echo $user['avatar']; ?><!--" class="user-avatar">-->
<!--</div>-->

<div class="user-desc">
    <div class="content">
        <div class="user-element" id="avatar-content">
            <p class="user-element-title">头像</p>
                <img class="user-element-desc" id="avatar" src="<?php echo $user['avatar']; ?>"/>
        </div>
        <hr/>
        <div class="user-element">
            <p class="user-element-title">昵称</p>
            <p class="user-element-desc" id="name"><?php echo $user['name']; ?><i class="fa fa-angle-right fa-2x user-icon"></i></p>
        </div>
        <hr/>
        <div class="user-element">
            <p class="user-element-title">电话号码</p>
            <p class="user-element-desc" id="tel"><?php echo $user['tel']; ?></p>
        </div>
        <hr/>
        <div class="user-element">
            <p class="user-element-title">我的地址</p>
            <p class="user-element-desc" id="tel"><?php echo $user['address']; ?><i class="fa fa-angle-right fa-2x user-icon"></i></p>
        </div>
        <hr/>
    </div>
</div>

<div class="change-password">
    <div class="content">
        <a href="<?php echo base_url().'index.php/register/change_password';?>"><div class="user-element">
            <p class="user-element-title">修改密码</p>
            <i class="fa fa-angle-right fa-2x user-icon"></i>
            </div></a>
    </div>
</div>