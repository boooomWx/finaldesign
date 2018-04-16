window.onload = function(){
    var input = document.getElementById("file_input");
    var result;
    var dataArr = []; // 储存所选图片的结果(文件名和base64数据)
    var fd;  //FormData方式发送请求
    var oSelect = document.getElementById("select");
    var oAdd = document.getElementById("add");
    var oSubmit = document.getElementById("submit");
    var oInput = document.getElementById("file_input");
    var score = $('#score');
    var content = $('#content');
    var images = $('#images');


    function send(){
        // var submitArr = [];
        // for (var i = 0; i < dataArr.length; i++) {
        //     if (dataArr[i]) {
        //         submitArr.push(dataArr[i]);
        //     }
        // }
        // console.log('提交的数据：'+JSON.stringify(submitArr))
        imgurl = getPath(document.getElementById("images"));
        $.ajax({
            url : 'http://'+window.location.host+'/weixing/index.php/comment/comment',
            type : 'post',
            data: {score:score.val(),content:content.val(),images:$("#images")[0].files[0].val()},
            dataType: 'json',
            //processData: false,   用FormData传fd时需有这两项
            //contentType: false,
            success : function(data){
                console.log('返回的数据：'+JSON.stringify(data))
            }

        })
    }


    oSubmit.onclick=function(){
        // if(!dataArr.length){
        //     return alert('请先选择文件');
        // } else if (!content.val()){
        //     return alert('请填写评论');
        // }
        send();
    };

    function getPath(obj) {
        if (obj) {
            if (window.navigator.userAgent.indexOf("MSIE") >= 1) {
                obj.select();
                return document.selection.createRange().text;
            }
            else if (window.navigator.userAgent.indexOf("Firefox") >= 1) {
                if (obj.files) {
                    return obj.files.item(0).getAsDataURL();
                }
                return obj.value;
            }
            return obj.value;
        }
    }

};