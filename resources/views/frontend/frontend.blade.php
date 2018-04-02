<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta http-equiv="Cache-Control" content="no-transform" />
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <meta name="applicable-device" content="pc" />
    <meta name="csrf-token" content=" {{ csrf_token() }}">
    @if(Request::getrequesturi()=='/')
        <title>@yield('title')</title>
    @else
        <title>@yield('title')-东方特许加盟网</title>
    @endif
    <meta name="keywords" content="@yield('keywords')"/>
    <meta name="description" content="@yield('description')"/>
    @yield('headlibs')
    <link href="http://www.4006666688.com/css/allcss.css" rel="stylesheet" type="text/css" />
    <script src="http://www.4006666688.com/js/pngFix.js" type="text/javascript"></script>
    <script src="http://www.4006666688.com/js/dftxjm.js" type="text/javascript"></script>
    <script src="http://www.4006666688.com/js/MSClass.js" type="text/javascript"></script>
    <script src="http://www.4006666688.com/js/jquery.js" type="text/javascript" ></script>
</head>
<body>
@include('frontend.header')
<!--头部开始(到搜索结束)-->
<main>
    @yield('main_content')
</main>
<div class="foot center">
    <div>
        <a href="http://www.4006666688.com/about/about">关于我们</a>　|　
        <a href="http://www.4006666688.com/help/">帮助中心</a>　|　
        <a href="http://www.4006666688.com/about/codex"> 法律声明</a>　|　
        <a href="http://www.4006666688.com/sitemap.htm"> 网站地图</a>　|　
        <a href="http://www.4006666688.com/services"> 广告合作</a>　|　
        <a href="http://www.4006666688.com/about/job">招贤纳士</a>　|　
        <a href="http://www.4006666688.com/about/map">联系我们</a>　|　
        <a href="http://www.4006666688.com/about/message">留言反馈</a>　|　
        <a href="http://www.4006666688.com/en/">International</a>
    </div>
    <p>沪ICP备09004241号 <span>服务热线：400-666-6688 </span>
        在线客服：
        <a target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=2353446360&site=qq&menu=yes">
            <img src="http://wpa.qq.com/pa?p=2:2353446360:4 &r=0.37876988090706104" alt="点击这里给我发消息" border="0" align="absmiddle" title="点击这里给我发消息">
        </a>&nbsp;
        <a target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=2395802167&site=qq&menu=yes">
            <img src="http://wpa.qq.com/pa?p=2:2395802167:4 &r=0.37876988090706104" alt="点击这里给我发消息" border="0" align="absmiddle" title="点击这里给我发消息">
        </a><br />
        常年法律顾问：德载中怡律师事务所</p>
</div>

<!--# End 底部 #-->

<script type="text/javascript">
    function switchtab(tabname,n)
    {
        var len=tabname.parentNode.childNodes.length;
        for(var i=0;i<len;i++)
        {
            tabname.parentNode.childNodes[i].className="";
            tabname.className="current";
        }
        for(i=1;i<=6;i++)
        {
            document.getElementById("brandhot"+i).style.display="none";
        }
        document.getElementById("brandhot"+n).style.display="";
    }
</script>

<script type="text/javascript">
    /*********文字翻屏滚动***************/
    new Marquee(["TextDiv1","TextContent1"],0,1,320,40,20,2000,1000)			//文字翻屏滚动实例
</script>

</body>
</html>
