<?php
include APPPATH . 'views/templates/header.php';
?>

<div class="register">
    <div class="register-header">
        <h2>用户注册</h2>
    </div>
    <div class="register-body">
        <input type="text" id="name" class="form-control" placeholder="想个好听的用户名吧">
        <input type="text" id="tel" class="form-control" placeholder="嘿！帅哥/美女留个电话可以么">
        <input type="text" id="password" class="form-control" placeholder="一个安全的密码很有必要">
        <input type="text" id="password-validate" class="form-control" placeholder="请再输入一遍密码">
        <input type="button" id="submit-button" class="btn btn-info" value="注册">
    </div>
</div>
<?php
include APPPATH . 'views/templates/footer.php';
?>
