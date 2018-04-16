
function changeName() {
    const name = $('#name');
    const submit = $('#submit');
    console.log(name.val());
    submit.on('click',function () {
        if(!name.val()){
            alert('请填写信息')
        }else {
            $.get('http://'+window.location.host+'/weixing/index.php/user/userinfo_change',{scene:'name',scene_content:name.val()},function (data) {
                if (data.success) {
                    window.location.href = 'http://'+window.location.host+'/weixing/index.php/user/userinfo';
                } else {
                    alert(data.message)
                }

            })
        }
    })
}

$(function () {
    changeName();
});
