
function doLogin() {
    const tel = $('#tel');
    const password = $('#password');
    const submit = $('#submit-button');
    submit.on('click',function () {
        if(!tel.val()||!password.val()){
            tel.css({'border':'1px solid red'});
            password.css({'border':'1px solid red'});
        }else {
            $.post('http://'+window.location.host+'/weixing/index.php/login/login_check',{tel:tel.val(),password:password.val()},function (data) {
                if (data.success) {
                    window.open('http://'+window.location.host+'/weixing/index.php/home/index');
                } else {
                    alert(data.message)
                }
                
            })
        }
    })
}

$(function () {
    doLogin();
});
