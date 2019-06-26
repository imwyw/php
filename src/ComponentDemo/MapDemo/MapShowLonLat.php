
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>高德地图demo</title>
</head>
<body>

<!--地图初识化的页面元素-->
<div id="container" style="width: 1000px; height: 400px;"></div>

<!--高德API的库  您申请的key值！！！！ 这个需要替换为你们自己申请的key值，下同-->
<script type="text/javascript"
        src="https://webapi.amap.com/maps?v=1.4.8&key=您申请的key值&plugin=AMap.Geocoder"></script>

<script type="text/javascript">

    //页面加载完成触发
    window.onLoad = initMap;

    var url = 'https://webapi.amap.com/maps?v=1.4.8&key=您申请的key值&plugin=AMap.Geocoder&callback=onLoad';
    var jsapi = document.createElement('script');
    jsapi.charset = 'utf-8';
    jsapi.src = url;
    document.head.appendChild(jsapi);

    function initMap() {
        //container为前面div的id
        var map = new AMap.Map('container');

        //为地图注册click事件获取鼠标点击出的经纬度坐标
        var clickEventListener = map.on('click', function (e) {
            alert("经度：" + e.lnglat.getLng() + '，纬度：' + e.lnglat.getLat());
            regeocoder([e.lnglat.getLng(), e.lnglat.getLat()]);
        });

        //使用该库需要在js脚本引用处添加【&plugin=AMap.Geocoder】插件加载
        var geocoder = new AMap.Geocoder({
            radius: 1000,
            extensions: "all"
        });

        function regeocoder(lonlat) {  //逆地理编码
            //根据经纬度获取位置名称
            geocoder.getAddress(lonlat, function (status, result) {
                if (status === 'complete' && result.info === 'OK') {
                    geocoder_CallBack(result);
                }
            });

            //在地图上显示打点，即一个个的小蓝点
            var marker = new AMap.Marker({
                map: map,
                position: lonlat
            });
            map.setFitView();
        }

        function geocoder_CallBack(data) {
            var address = data.regeocode.formattedAddress; //返回地址描述
            alert(address);
        }
    }

</script>
</body>
</html>