var countdown = 100;

function getVerityCode() {
    const tel = $('#tel');
    var reg = /^1[3|4|5|7|8][0-9]\d{4,8}$/;
    if (tel.val()==null || !reg.exec(tel.val())) {
        alert("手机号码格式不正确！");
    } else {
        $.get('http://' + window.location.host + '/weixing/index.php/verify_code/verify_code', {tel: tel.val()}, function (data) {
            if (data.success) {
                var obj = $("#verify_get");
                settime(obj);
            } else {
                alert(data.message)
            }

        })
    }
}

function settime(obj) {
    if (countdown == 0) {
        $('#verify_get').attr("disabled", false);
        obj.text("获取验证码");
        countdown = 100;
        return;
    } else {
        obj.attr('disabled',true);
        obj.text("重新发送(" + countdown + ")");
        countdown--;
    }
    setTimeout(function() {
            settime(obj) }
        ,1000)
}


function doRegister() {
    const verify_code = $('#verify_code');
    const tel = $('#tel');
    const password = $('#password');
    const password_validate = $('#password-validate');
    const submit = $('#submit-button');
    submit.on('click',function () {
        $('input').removeAttr("style");
        if (!tel.val()) {
            tel.attr('placeholder', '请输入手机号码');
            tel.css({'border':'1px solid red'});
        } else if (!verify_code.val()) {
            verify_code.attr('placeholder', '请输入验证码');
            verify_code.css({'border': '1px solid red'});
        } else if (!password.val()) {
            password.attr('placeholder', '请输入密码');
            password.css({'border': '1px solid red'});
        }  else if (!password_validate.val()) {
            password_validate.attr('placeholder', '请确认密码');
            password_validate.css({'border': '1px solid red'});
        } else if (password.val() !== password_validate.val()) {
            password.val("");
            password_validate.val("");
            password_validate.attr('placeholder', '两次密码不一致请重试');
            password_validate.css({'border': '1px solid red'});
        } else {
            $.post('http://'+window.location.host+'/weixing/index.php/register/change_password',{tel:tel.val(),verify_code:verify_code.val(),password_validate:password_validate.val(),password:password.val()},function (data) {
                if (data.success) {
                    window.location.href='http://'+window.location.host+'/weixing/index.php/login/index';
                } else {
                    alert(data.message)
                }

            })
        }
    })
}

$(function () {
    doRegister();
});
