<?php
/**
 * Created by PhpStorm.
 * User: boom
 * Date: 2018/3/22
 * Time: 9:33
 */

include APPPATH . 'views/templates/header.php';
?>

    <div class="nav-top navbar-fixed-top">
        <div class="content">
            <i class="fa fa-angle-left fa-2x" onclick="javascript:history.back(-1);"><span
                        class="page-title border-font"><?php echo $page_title; ?></span></i>
        </div>
    </div>

<div class="login-content">
    <img src="<?php echo base_url().'/resource/img/default-user-img2.jpg' ?>" class="user-avatar">
    <div class="account-content">
            <input type="text" placeholder="手机号" id="tel"><hr/>
            <input type="password" placeholder="密码" id="password"><hr/>
            <button type="submit" id="submit-button" class="btn-info" style="background-color: orange;border: none">登录</button>
    </div>
    <div class="login-more">
        <a href="<?php echo base_url('index.php/register/index')?>" class="new-user-register">新用户注册</a>
        <a href="<?php echo base_url('index.php/register/change_password')?>" class="forget-password">忘记密码？</a>
    </div>
</div>

<?php
include APPPATH.'views/templates/footer.php';
?>