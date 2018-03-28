
function doRegister() {
    const name = $('#name');
    const tel = $('#tel');
    const password = $('#password');
    const password_validate = $('#password-validate');
    const submit = $('#submit-button');
    submit.on('click',function () {
        $('input').removeAttr("style");
        if(!name.val()) {
            name.attr('placeholder', '请输入姓名');
            name.css({'border':'1px solid red'});
        } else if (!tel.val()) {
            tel.attr('placeholder', '请输入手机号码');
            tel.css({'border':'1px solid red'});
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
            $.post('http://'+window.location.host+'/weixing/index.php/register/do_register',{tel:tel.val(),name:name.val(),password_validate:password_validate.val(),password:password.val()},function (data) {
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
