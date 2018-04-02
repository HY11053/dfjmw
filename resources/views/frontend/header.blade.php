@inject('headers',App\Header')
<div class="i_head center">
    <div class="i_top">
        <div class="i_topRight">
            <ul>
                <li><a href="/brand" class="fWhite">品 牌 库</a></li>
                <li><a href="/news" class="fWhite">资 讯</a></li>
                <li><a href="/huodong/fcwr/" class="fWhite" target="_blank">"非诚勿扰"</a></li>
                <li><a href="/content/" class="fWhite" target="_blank">开 店 易</a></li>
                <li><a href="/help/" class="fWhite" target="_blank">帮助中心</a></li>
            </ul>
        </div>
        您好，欢迎来到东方特许加盟网
        <a href="/login" class="fRed"> 【请登录】</a>【<a href="/register" class="fRed2">投资人注册</a>|<a href="/company/register" class="fRed2">品牌发布申请</a>】
    </div>
</div>
<div class="i_menuBg center">
    <div class="i_logo"><img src="/reception/images/logo.gif" width="330" height="88" alt="东方特许加盟网" /></div>
    <div class="i_logoRight">
        <ul>
            <li><img src="/reception/images/i_menu_1.gif" width="58" height="58" alt="生活类加盟"/></li>
            <li class="menuLink">
                <a href="/canyin/">餐饮</a>
                <a href="/yinpin/">饮品</a>
                <a href="/fuzhuang/">服装</a>
                <a href="/ganxi/">干洗</a>
                <a href="/yule/">娱乐</a>
                <a href="/jiudian/">酒店</a>
            </li>
            <li><img src="/reception/images/i_menu_2.gif" width="58" height="58" alt="服务类加盟"/></li>
            <li class="menuLink">
                <a href="/jiaoyu/">教育</a>
                <a href="/meirong/">美容</a>
                <a href="/yiliao/">医疗</a>
                <a href="/yingyou/">婴幼</a>
                <a href="/shangwu/">商务</a>
                <a href="/tese/">特色</a>
            </li>
            <li><img src="/reception/images/i_menu_3.gif" width="58" height="58" alt="产品类加盟"/></li>
            <li class="menuLink">
                <a href="/lingshou/">零售</a>
                <a href="/jiaju/">家居</a>
                <a href="/shipin/">饰品</a>
                <a href="/huanbao/">环保</a>
                <a href="/shuma/">数码</a>
                <a href="/qiche/">汽车</a>
            </li>
        </ul>
    </div>
    <div class="i_menu left">
        <ul class="left">
            <li @if(Request::getrequesturi()=='/') class="current" @endif><a href="/">首页</a></li>
            <li class="menuLine">|</li>
            @foreach($headers->HeaderLists() as $real_path=>$header)
                <li @if(Request::getrequesturi()==$real_path) class="current" @endif><a href="/{{$real_path}}/" >{{$header}}</a></li>
                <li class="menuLine">|</li>
            @endforeach
        </ul>
    </div>
    <div class="i_tel">加盟百事通咨询热线：<b>400-666-6688</b></div>
</div>
