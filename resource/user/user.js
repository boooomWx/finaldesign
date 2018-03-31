$(document).ready(function () {
    var num = 1;
    var page_size = 10;
    var no_more = '';
    no_more = '<div class="no-more-order">您还没有相关订单</div>';
    $.post('http://'+window.location.host+'/weixing/index.php/user/order',{page:num,page_size:page_size,category:'all'},function (data) {
        if (data.success) {
            var order_list = '';
            for(var i = 0; i < data.data.length; i++ ) {
                order_list = order_list.concat('<div class="order-item">\n' +
                    '                    <div class="order-shop-part">\n' +
                    '                        <p class="order-shop-name border-font">'.concat(data.data[i].shop_name),'</p>\n' +
                    '                        <p class="order-status lighter-font">'.concat(data.data[i].status),'</p>\n' +
                    '                    </div>\n' +
                    '                    <a href="http://'+window.location.host+'/weixing/index.php/user/order_detail?oid='+data.data[i].id,'"><div class="order-desc">\n' +
                    '                        <img class="order-img" src="'.concat(data.data[i].image),'">\n' +
                    '                        <div class="order-second-desc">\n' +
                    '                            <div class="order-item-desc">\n' +
                    '                                <p class="order-title border-font">'.concat(data.data[i].title),'</p>\n' +
                    '                                <p class="order-price">￥'.concat(data.data[i].price),'</p>\n' +
                    '                            </div>\n' +
                    '                            <p class="order-consume-time">'.concat(data.data[i].gmt_modified),'</p>\n' +
                    '                        </div>\n' +
                    '                    </div></a>\n' +
                    '                    <div class="more-part">\n' +
                    '                        <button class="delete-button more-button" onclick="javascript:orderDelete('.concat(data.data[i].id),')">删除订单</button>\n' +
                    '                        <button class="again-button more-button" onclick="javascript:itemDetail('.concat(data.data[i].iid),')">再次购买</button>\n' +
                    '                    </div>\n' +
                    '                </div>\n' +
                    '                <hr/>')
            }
            $('#order-detail').html(order_list);
        } else {
            $('#order-detail').html(no_more);
        }
    })

    $('#all-order').on('click',function () {
        $(".order-nav-item").removeClass("current");
        $(".nav-line").removeClass("current-line");
        $("#all-order").addClass("current");
        $(".all-nav-line").addClass("current-line");
        $.post('http://'+window.location.host+'/weixing/index.php/user/order',{page:num,page_size:page_size,category:'all'},function (data) {
            if (data.success) {
                var order_list = '';
                for(var i = 0; i < data.data.length; i++ ) {
                    order_list = order_list.concat('<div class="order-item">\n' +
                        '                    <div class="order-shop-part">\n' +
                        '                        <p class="order-shop-name border-font">'.concat(data.data[i].shop_name),'</p>\n' +
                        '                        <p class="order-status lighter-font">'.concat(data.data[i].status),'</p>\n' +
                        '                    </div>\n' +
                        '                    <a href="http://'+window.location.host+'/weixing/index.php/user/order_detail?oid='+data.data[i].id,'"><div class="order-desc">\n' +
                        '                        <img class="order-img" src="'.concat(data.data[i].image),'">\n' +
                        '                        <div class="order-second-desc">\n' +
                        '                            <div class="order-item-desc">\n' +
                        '                                <p class="order-title border-font">'.concat(data.data[i].title),'</p>\n' +
                        '                                <p class="order-price">￥'.concat(data.data[i].price),'</p>\n' +
                        '                            </div>\n' +
                        '                            <p class="order-consume-time">'.concat(data.data[i].gmt_modified),'</p>\n' +
                        '                        </div>\n' +
                        '                    </div></a>\n' +
                        '                    <div class="more-part">\n' +
                        '                        <button class="delete-button more-button" onclick="javascript:orderDelete('.concat(data.data[i].id),')">删除订单</button>\n' +
                        '                        <button class="again-button more-button">再次购买</button>\n' +
                        '                    </div>\n' +
                        '                </div>\n' +
                        '                <hr/>')
                }
                $('#order-detail').html(order_list);
            } else {
                $('#order-detail').html(no_more);
            }
        })
    })
    $('#wait-pay-order').on('click',function () {
        $(".order-nav-item").removeClass("current");
        $(".nav-line").removeClass("current-line");
        $("#wait-pay-order").addClass("current");
        $(".wait-pay-nav-line").addClass("current-line");
        $.post('http://'+window.location.host+'/weixing/index.php/user/order',{page:num,page_size:page_size,category:'wait_pay'},function (data) {
            if (data.success) {
                var order_list = '';
                for(var i = 0; i < data.data.length; i++ ) {
                    order_list = order_list.concat('<div class="order-item">\n' +
                        '                    <div class="order-shop-part">\n' +
                        '                        <p class="order-shop-name border-font">'.concat(data.data[i].shop_name),'</p>\n' +
                        '                        <p class="order-status lighter-font">'.concat(data.data[i].status),'</p>\n' +
                        '                    </div>\n' +
                        '                    <a href="http://'+window.location.host+'/weixing/index.php/user/order_detail?oid='+data.data[i].id,'"><div class="order-desc">\n' +
                        '                        <img class="order-img" src="'.concat(data.data[i].image),'">\n' +
                        '                        <div class="order-second-desc">\n' +
                        '                            <div class="order-item-desc">\n' +
                        '                                <p class="order-title border-font">'.concat(data.data[i].title),'</p>\n' +
                        '                                <p class="order-price">￥'.concat(data.data[i].price),'</p>\n' +
                        '                            </div>\n' +
                        '                            <p class="order-consume-time">'.concat(data.data[i].gmt_modified),'</p>\n' +
                        '                        </div>\n' +
                        '                    </div></a>\n' +
                        '                    <div class="more-part">\n' +
                        '                        <button class="delete-button more-button" onclick="javascript:orderDelete('.concat(data.data[i].id),')">删除订单</button>\n' +
                        '                        <button class="again-button more-button">再次购买</button>\n' +
                        '                    </div>\n' +
                        '                </div>\n' +
                        '                <hr/>')
                }
                $('#order-detail').html(order_list);
            } else {
                $('#order-detail').html(no_more);
            }
        })
    })
    $('#available-order').on('click',function () {
        $(".order-nav-item").removeClass("current");
        $(".nav-line").removeClass("current-line");
        $("#available-order").addClass("current");
        $(".available-nav-line").addClass("current-line");
        $.post('http://'+window.location.host+'/weixing/index.php/user/order',{page:num,page_size:page_size,category:'available'},function (data) {
            if (data.success) {
                var order_list = '';
                for(var i = 0; i < data.data.length; i++ ) {
                    order_list = order_list.concat('<div class="order-item">\n' +
                        '                    <div class="order-shop-part">\n' +
                        '                        <p class="order-shop-name border-font">'.concat(data.data[i].shop_name),'</p>\n' +
                        '                        <p class="order-status lighter-font">'.concat(data.data[i].status),'</p>\n' +
                        '                    </div>\n' +
                        '                    <a href="http://'+window.location.host+'/weixing/index.php/user/order_detail?oid='+data.data[i].id,'"><div class="order-desc">\n' +
                        '                        <img class="order-img" src="'.concat(data.data[i].image),'">\n' +
                        '                        <div class="order-second-desc">\n' +
                        '                            <div class="order-item-desc">\n' +
                        '                                <p class="order-title border-font">'.concat(data.data[i].title),'</p>\n' +
                        '                                <p class="order-price">￥'.concat(data.data[i].price),'</p>\n' +
                        '                            </div>\n' +
                        '                            <p class="order-consume-time">'.concat(data.data[i].gmt_modified),'</p>\n' +
                        '                        </div>\n' +
                        '                    </div></a>\n' +
                        '                    <div class="more-part">\n' +
                        '                        <button class="delete-button more-button" onclick="javascript:orderDelete('.concat(data.data[i].id),')">删除订单</button>\n' +
                        '                        <button class="again-button more-button">再次购买</button>\n' +
                        '                    </div>\n' +
                        '                </div>\n' +
                        '                <hr/>')
                }
                $('#order-detail').html(order_list);
            } else {
                $('#order-detail').html(no_more);
            }
        })
    })
    $('#refund-order').on('click',function () {
        $(".order-nav-item").removeClass("current");
        $(".nav-line").removeClass("current-line");
        $("#refund-order").addClass("current");
        $(".refund-nav-line").addClass("current-line");
        $.post('http://'+window.location.host+'/weixing/index.php/user/order',{page:num,page_size:page_size,category:'refund'},function (data) {
            if (data.success) {
                var order_list = '';
                for(var i = 0; i < data.data.length; i++ ) {
                    order_list = order_list.concat('<div class="order-item">\n' +
                        '                    <div class="order-shop-part">\n' +
                        '                        <p class="order-shop-name border-font">'.concat(data.data[i].shop_name),'</p>\n' +
                        '                        <p class="order-status lighter-font">'.concat(data.data[i].status),'</p>\n' +
                        '                    </div>\n' +
                        '                    <a href="http://'+window.location.host+'/weixing/index.php/user/order_detail?oid='+data.data[i].id,'"><div class="order-desc">\n' +
                        '                        <img class="order-img" src="'.concat(data.data[i].image),'">\n' +
                        '                        <div class="order-second-desc">\n' +
                        '                            <div class="order-item-desc">\n' +
                        '                                <p class="order-title border-font">'.concat(data.data[i].title),'</p>\n' +
                        '                                <p class="order-price">￥'.concat(data.data[i].price),'</p>\n' +
                        '                            </div>\n' +
                        '                            <p class="order-consume-time">'.concat(data.data[i].gmt_modified),'</p>\n' +
                        '                        </div>\n' +
                        '                    </div></a>\n' +
                        '                    <div class="more-part">\n' +
                        '                        <button class="delete-button more-button" onclick="javascript:orderDelete('.concat(data.data[i].id),')">删除订单</button>\n' +
                        '                        <button class="again-button more-button">再次购买</button>\n' +
                        '                    </div>\n' +
                        '                </div>\n' +
                        '                <hr/>')
                }
                $('#order-detail').html(order_list);
            } else {
                $('#order-detail').html(no_more);
            }
        })
    })

    function orderDelete(oid) {
        $.get('http://'+window.location.host+'/weixing/index.php/user/order_delete',{oid:oid},function (data) {
              if (data.success) {
                  alert('success');
              } else {
                  alert('failure')
              }
        })
    }
})