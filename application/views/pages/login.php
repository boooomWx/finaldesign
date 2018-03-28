<?php
/**
 * Created by PhpStorm.
 * User: boom
 * Date: 2018/3/22
 * Time: 9:33
 */

include APPPATH . 'views/templates/header.php';
?>

<div class="login-content">
    <img src="<?php echo base_url().'/resource/img/default-user-img.png' ?>" class="user-avatar">
    <div class="account-content">
            <input type="text" placeholder="手机号" id="tel"><hr/>
            <input type="text" placeholder="密码" id="password"><hr/>
            <button type="submit" id="submit-button" class="btn-info">登录</button>
    </div>
    <div class="login-more">
        <a href="<?php echo site_url('login/index')?>" class="new-user-register">新用户注册</a>
        <a href="<?php echo site_url('login/index')?>" class="forget-password">忘记密码？</a>
    </div>
</div>

<?php
include APPPATH.'views/templates/footer.php';
?>