<?php
include APPPATH . 'views/templates/header.php';
?>

<div class="nav-top navbar-fixed-top">
    <div class="content">
        <i class="fa fa-angle-left fa-2x" onclick="javascript:history.back(-1);"><span
                class="page-title border-font"><?php echo $page_title; ?></span></i>
    </div>
</div>
<div class="register">
    <div class="content">
        <!--        <h3 class="register-header">手机号快速注册</h3>-->
        <div class="register-body">
            <input type="text" id="tel" class="form-control" placeholder="手机号">
            <div class="input-group">
                <input type="text" id="verify_code" class="form-control" placeholder="验证码">
                <button class="btn" id="verify_get" onclick="javascript:getVerityCode()">获取验证码</button>
            </div>
            <input type="password" id="password" class="form-control" placeholder="请输入密码">
            <input type="password" id="password-validate" class="form-control" placeholder="请确认密码">
            <input type="button" id="submit-button" class="btn btn-info" value="修改密码"
                   style="background-color: orange;border: none">
        </div>
    </div>
</div>
<?php
include APPPATH . 'views/templates/footer.php';
?>
