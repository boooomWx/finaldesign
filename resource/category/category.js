$(document).ready(function () {
    var num = 2;
    var maxNum = 5;
    var page_size = 2;
    var totalHeight = 0;
    var goodlist = '';
    var urlObject = '';
    urlObject = getUrlArgObject();
    category = urlObject['category'];
    $(window).scroll(function () {
        var srollPos = $(window).scrollTop();
        console.log($(document).height());
        totalHeight = parseFloat(srollPos) + parseFloat($(window).height());
        if (totalHeight >= $(document).height() && num < maxNum) {
            $.get('http://' + window.location.host + '/weixing/index.php/item/item', {
                page: num,
                page_size: page_size,
                category: category
            }, function (data) {
                if (data.success) {
                    for (var i = 0; i < data.data.length; i++) {
                        goodlist = goodlist.concat('<a href="http://' + window.location.host + '/weixing/index.php/item_detail/index?iid=' + data.data[i].id, '">\n' +
                            '<div class="good-item">\n' +
                            '                    <img class="item-img" src='.concat(data.data[i].image), '>\n' +
                            '                    <div class="good-item-detail">\n' +
                            '                        <div class="shop-part">\n' +
                            '                            <p class="shop-name">'.concat(data.data[i].shop.shop_name), '</p>\n' +
                            '                            <p class="distance lighter-font">'.concat(data.data[i].distance), '</p>\n' +
                            '                        </div>\n' +
                            '                        <p class="shop-address">'.concat(data.data[i].shop.address), '</p>\n' +
                            '                        <div class="item-price-part">\n' +
                            '                            <div class="price-part">\n' +
                            '                                <div class="now-price-part"><span>￥</span><span\n' +
                            '                                            class="now-price">'.concat(data.data[i].price), '</span></div>\n' +
                            '                                <span>￥</span><span\n' +
                            '                                        class="old-price lighter-font">'.concat(data.data[i].old_price), '</span>\n' +
                            '                            </div>\n' +
                            '                            <div class="sold-num lighter-font">已售'.concat(data.data[i].sold_num), '</div>\n' +
                            '                        </div>\n' +
                            '                    </div>\n' +
                            '                </div>\n' +
                            '                <hr/>\n' +
                            '               </a>')
                    }
                    $('#goodlist').html(goodlist);
                    num++;
                } else {
                    num = 6;

                }
            })
        }

    })

    function getUrlArgObject() {
        var args = new Object();
        var query = location.search.substring(1);//获取查询串
        var pairs = query.split(",");//在逗号处断开
        for (var i = 0; i < pairs.length; i++) {
            var pos = pairs[i].indexOf('=');//查找name=value
            if (pos == -1) {//如果没有找到就跳过
                continue;
            }
            var argname = pairs[i].substring(0, pos);//提取name
            var value = pairs[i].substring(pos + 1);//提取value
            args[argname] = unescape(value);//存为属性
        }
        return args;//返回对象
    }
})