<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link href="<?php echo base_url().'/resource/bootstrap/css/bootstrap.min.css';?>" rel="stylesheet">
    <link href="//netdna.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <title>地图定位</title>
    <style type="text/css">
        html{height:100%}
        body{height:100%;margin:0px;padding:0px}
        #container{height:100%}
        .search-part {
            margin-top: 40px;
            width: 70%;
            position: absolute;
        }
        .nav-top {
            position: absolute;
            background-color: black;
            color: white;
        }
        .map-location {
            position: absolute;
            z-index: 4;
            width: 26px;
            height: 26px;
            overflow: hidden;
            background-color: #fff;
            text-align: center;
            cursor: pointer;
            line-height: 26px;
            float: right;
            box-shadow: 1px 2px 1px rgba(0,0,0,.15);
        }
        .map-location span {
            width: 14px;
            height: 14px;
            vertical-align: middle;
            display: inline-block;
            background: url(//webmap0.bdimg.com/wolfman/static/common/images/ipLocation/ipLocation_ac75181.png);
            background-size: 76px,auto;
        }
        .map-location .location-icon {
            background-position: -28px 0;
        }
    </style>
    <script type="text/javascript" src="http://api.map.baidu.com/api?v=2.0&ak=QB9qXNqZwb0b0Mx1BZ4eNapxnESkHISb">
        //v2.0版本的引用方式：src="http://api.map.baidu.com/api?v=2.0&ak=您的密钥"
    </script>
</head>

<body>
<div class="nav-top navbar-fixed-top">
        <i class="fa fa-angle-left fa-2x" onclick="javascript:history.back(-1);"></i>
</div>

<div class="search-part">
    <div class="input-group">
        <input type="text" id="suggestId" class="form-control" size="20" placeholder="请输入地址检索"/>
        <span class="input-group-btn">
            <button class="btn btn-info" type="submit" onclick="document.getElementById('suggestId').value=''">清除</button>
        </span>
    </div>
    <div class="map-location"><a onclick="getLocation()"><span class="location-icon"></span></a></div>
</div>
<div id="searchResultPanel" style="border:1px solid #C0C0C0;width:150px;height:auto; display:none;"></div>
<div id="container"></div>
<script type="text/javascript">
    var map = new BMap.Map("container");
    // 创建地图实例
    var point = new BMap.Point(120.015245,30.295158);
    // 创建点坐标
    map.centerAndZoom(point, 15);
    map.enableScrollWheelZoom(true);
    // 初始化地图，设置中心点坐标和地图级别

    var marker = new BMap.Marker(point); //将点转化成标注点
    map.addOverlay(marker);  //将标注点添加到地图上

    //设置地图级别（1-18）
    map.centerAndZoom(point, 12);
    //开启滚轮缩放地图
    map.enableScrollWheelZoom();

    function G(id) {
        return document.getElementById(id);
    }

    var ac = new BMap.Autocomplete(    //建立一个自动完成的对象
        {
            "input": "suggestId"
            , "location": map
        });

    ac.addEventListener("onhighlight", function (e) {  //鼠标放在下拉列表上的事件
        var str = "";
        var _value = e.fromitem.value;
        var value = "";
        if (e.fromitem.index > -1) {
            value = _value.province + _value.city + _value.district + _value.street + _value.business;
        }
        str = "FromItem<br />index = " + e.fromitem.index + "<br />value = " + value;

        value = "";
        if (e.toitem.index > -1) {
            _value = e.toitem.value;
            value = _value.province + _value.city + _value.district + _value.street + _value.business;
        }
        str += "<br />ToItem<br />index = " + e.toitem.index + "<br />value = " + value;
        G("searchResultPanel").innerHTML = str;
    });

    var myValue;
    ac.addEventListener("onconfirm", function (e) {    //鼠标点击下拉列表后的事件
        var _value = e.item.value;
        myValue = _value.province + _value.city + _value.district + _value.street + _value.business;
        G("searchResultPanel").innerHTML = "onconfirm<br />index = " + e.item.index + "<br />myValue = " + myValue;

        setPlace();
    });

    function setPlace() {
        map.clearOverlays();    //清除地图上所有覆盖物
        function myFun() {
            var pp = local.getResults().getPoi(0).point;    //获取第一个智能搜索的结果
            map.centerAndZoom(pp, 18);
            map.addOverlay(new BMap.Marker(pp));    //添加标注
        }

        var local = new BMap.LocalSearch(map, { //智能搜索
            onSearchComplete: myFun
        });
        local.search(myValue);
    }

    /**
     * 定位
     */
    function getLocation() {
        var geolocation = new BMap.Geolocation();
        // 开启SDK辅助定位
        geolocation.enableSDKLocation();
        geolocation.getCurrentPosition(function(r){
            if(this.getStatus() == BMAP_STATUS_SUCCESS){
                var mk = new BMap.Marker(r.point);
                map.addOverlay(mk);
                map.panTo(r.point);
            }
            else {
                alert('failed'+this.getStatus());
            }
        });
    }

</script>
</body>
</html>