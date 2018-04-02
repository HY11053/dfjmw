@extends('frontend.frontend')
@section('title'){{ config('app.webname', '东方特许加盟网') }}@stop
@section('keywords'){{ config('app.keywords', '东方特许加盟网') }}@stop
@section('description'){{ config('app.description', '东方特许加盟网') }}@stop
@section('headlibs')
    <meta name="Copyright" content="东方特许加盟网-{{env('APP_URL')}}"/>
    <meta name="author" content="东方特许加盟网" />
    <meta http-equiv="mobile-agent" content="format=wml; url={{str_replace('http://www.','http://m.',config('app.url'))}}" />
    <meta http-equiv="mobile-agent" content="format=xhtml; url={{str_replace('http://www.','http://m.',config('app.url'))}}" />
    <meta http-equiv="mobile-agent" content="format=html5; url={{str_replace('http://www.','http://m.',config('app.url'))}}" />
    <link rel="alternate" media="only screen and(max-width: 640px)" href="{{str_replace('http://www.','http://m.',config('app.url'))}}" >
    <link rel="canonical" href="{{config('app.url')}}"/>
    <meta property="og:image" content="{{config('app.url')}}/reception/images/logo.jpg"/>
@stop
@section('main_content')
    <div class="i_search center">
        <!--span class="pLeft30"><a href="http://www.4006666688.com/member/register?flag=1"><font color="#C23201" size="4" style= "font-weight:bold ">选什么项目好？</font></a><span-->
        <form onsubmit="window.location='http://brand.4006666688.com/brandlist/?sk='+encodeURI($('#keyword').val()!='请输入您要搜索的品牌'?$('#keyword').val():'');return false;">
            <input name="keyword" id="keyword" type="text" class="i_searchInput" onblur="if (this.value==''){this.value=this.defaultValue;}" onfocus="if (this.value==this.defaultValue){this.value=''}" value="请输入您要搜索的品牌" onkeyup="autosearch(event,this)"/>
            <div class="suggestionsBox" id="suggestions" style="display:none;">
                <div class="souKey" id="autoSuggestionsList"></div>
            </div>
            <input id="brand_btn" type="image" src="http://www.4006666688.com/images/default/head/i_search.jpg" width="77" height="36" class="left"/>
        </form>
        <span class="pLeft30">最近热点：
           <a href="http://brand.4006666688.com/main/5326" class="fRed2" target="_blank">屋企汤馆</a>&nbsp;
             <a href="http://brand.4006666688.com/main/2022" class="fRed2" target="_blank">喜缘火锅</a>&nbsp;
            <a href="http://brand.4006666688.com/main/1005" class="fRed2" target="_blank">快乐星汉堡</a>&nbsp;
             <a href="http://brand.4006666688.com/brandinfo/3441" class="fRed2" target="_blank">包旺锅贴</a>&nbsp;
             <a href="http://brand.4006666688.com/brandinfo/612" class="fRed2" target="_blank">肯德基</a>&nbsp;
    </span>
    </div>
    <script type="text/javascript">
        //<![CDATA[
        $(function(){
            //$('#fills').bind('blur',function(){$('#suggestions').hide();});
            $('#brand_btn').hover(function(){$(this).attr('src','http://www.4006666688.com/images/default/head/i_search.jpg');},function(){$(this).attr('src','http://www.4006666688.com/images/default/head/i_search.jpg');});
        });

        /* 生成列表 */
        function autosearch(e,obj){
            lookup(obj.value);
        }

        /* ajax获得查询结果 */
        function lookup(val) {
            if($.trim(val) == '') {
                $('#suggestions').hide();
            } else {
                $.post('http://www.4006666688.com/brand/autosearch/', {wd:val}, function(data){
                    if(data!=false) {
                        $('#suggestions').show();
                        $('#autoSuggestionsList').html(data);
                    }
                    else {
                        $('#suggestions').hide();
                        $('#autoSuggestionsList').html('');
                    }
                });
            }
        }

        /* ajax自动搜索列表鼠标onmouseover,onmouseout样式 */
        function curLi(obj,k){
            if(k=='on') {$('.souKey li').removeClass('curLi');$(obj).addClass('curLi');}
            else $(obj).removeClass('curLi');
        }

        /* 鼠标点击搜索列表赋值给文本框 */
        function fill(val) {
            $('#keyword').val(val);
            $('#suggestions').hide();
        }
        //]]>
    </script>

    <!-- 开始Comm100在线客服系统按钮代码 --><div id="comm100_FloatImageButton"><div><div id="comm100_LiveChatDiv"></div><a href="http://www.comm100.com/livechat/" onclick="comm100_Chat();return false;" target="_blank" title= "在线咨询客服"><img id="comm100_ButtonImage" src="http://chatserver.comm100.cn/BBS.aspx?siteId=80056357&amp;planId=1542&amp;partnerId=-1" style="border:0px" alt="在线咨询客服" /></a><script src="http://chatserver.comm100.cn/js/LiveChat.js?siteId=80056357&amp;planId=1542&amp;partnerId=-1" type="text/javascript"></script></div></div><!-- 结束Comm100在线客服系统按钮代码 -->


    <!-- 左侧浮动图片 -->

    <!--div id="HcLeftDiv" style="z-index:1000; position:absolute; top:300px; left:0px; width: 195px; height: 200px; visibility: visible;">
      <a href="http://news.4006666688.com/detail/20172" target="_blank">
        <img src="http://www.4006666688.com/images/brand_zt/6081/leftfc.jpg" border="0" alt="服装招商会"/><br>
      </a>
      <a href="http://www.4006666688.com/member/register?flag=3" target="_blank">
        <img src="http://www.4006666688.com/images/brand_zt/6081/hcbm.jpg" border="0" alt="服装招商会"/>
      </a>
      <map name="fcMap2" id="fcMap2">
        <area shape="rect" coords="0,0,140,200" href="http://www.4006666688.com/huodong/hc201208"/>
      </map>
    </div>
    <script>
        function scroll(p){
         var d = document,w = window,o = d.getElementById(p.id),ie6 = /msie 6/i.test(navigator.userAgent);
         if(o){
          o.style.cssText +=";position:"+(p.f&&!ie6?'fixed':'absolute')+";"+(p.r?'left':"right")+":0;"+(p.t!=undefined?'top:'+p.t+'px':'bottom:0px');
          if(!p.f||ie6){
           -function(){
               var t = 500,st = d.documentElement.scrollTop||d.body.scrollTop,c;
                     c = st  - o.offsetTop + (p.t!=undefined?p.t:(w.innerHeight||d.documentElement.clientHeight)-o.offsetHeight-400);
                  c!=0&&(o.style.top = o.offsetTop + Math.ceil(Math.abs(c)/10)*(c<0?-1:1) + 'px',t=10);
                  setTimeout(arguments.callee,t)
              }()
          }
         }
        }
        scroll({
         id:'HcLeftDiv'

        })
    </script-->
    <!--头部结束-->
    <!-- 第一屏 -->
    <div class="container center">
        <!--# 幻灯广告区域 #-->
        <script type="text/javascript" src="http://www.4006666688.com/js/myfocus/myfocus-2.0.2.min.js" ></script>

        <div class="left i_slide" id="myFocus"><!--焦点图盒子-->
            <div class="loading"><img src="http://www.4006666688.com/images/loading.gif" alt="请稍候..." width="100px" height="100px"/></div><!--载入画面-->
            <div class="pic"><!--内容列表-->
                <ul>
                    <li>
                        <a href="http://brand.4006666688.com/main/8390" target="_blank"><img src="http://www.4006666688.com/images/brand/4/8/3/9/0/index_focus.jpg" alt="茱丽阿姨加盟" width="250" height="340"/></a>

                    </li>
                    <li>
                        <a href="http://brand.4006666688.com/brandinfo/7364" target="_blank"><img src="http://www.4006666688.com/images/brand/4/7/3/6/4/index_focus.jpg" alt="琉璃时光加盟" width="250" height="340"/></a>
                    </li>
                    <li>
                        <a href="http://brand.4006666688.com/main/7078" target="_blank"><img src="http://www.4006666688.com/images/brand/4/7/0/7/8/index_focus.jpg" alt="A家连锁酒店加盟" width="250" height="340"/></a>

                    </li>
                    <li>
                        <a href="http://brand.4006666688.com/main/7078" target="_blank"><img src="http://www.4006666688.com/images/brand/4/7/0/7/8/index_focus.jpg" alt="A家连锁酒店加盟" width="250" height="340"/></a>

                    </li>
                    <li>
                        <a href="http://brand.4006666688.com/main/7164" target="_blank"><img src="http://www.4006666688.com/images/brand/4/7/1/6/4/index_focus.jpg" alt="千纸鹤嫩汁烤肉加盟" width="250" height="340"/></a>
                    </li>
                    <li>
                        <a href="http://brand.4006666688.com/main/7213" target="_blank"><img src="http://www.4006666688.com/images/brand/4/7/2/1/3/index_focus.jpg" alt="悠游堂加盟" width="250" height="340"/></a>
                    </li>
                </ul>
            </div>
        </div>
        <script type="text/javascript">
            myFocus.set({
                id:'myFocus',//焦点图盒子ID
                pattern:'mF_slide3D',//风格应用的名称
                time:3,//切换时间间隔(秒)
                trigger:'mouseover',//触发切换模式:'click'(点击)/'mouseover'(悬停)
                width:250,//设置宽度(主图区)
                height:340,//设置高度(主图区)
                txtHeight:'0',//文字层高度设置,'default'为默认高度，0为隐藏
                wrap:false//边框否
            });
        </script>
        <!--# End 幻灯广告区域 #-->
        <div class="left i_headline">
            <div class="current_time">{{date('Y-m-d',strtotime(Carbon\Carbon::today()))}}　　　　　　　　　　
                <a href="/news/" alt="更多加盟资讯" target="_blank"><img src="http://www.4006666688.com/images/images/gd.jpg" alt="更多加盟资讯"/></a>
            </div>
            <h3><a href="http://news.4006666688.com/detail/26568" title="扫加盟顾问微信获得一个身边的加盟顾问" target="_blank">扫加盟顾问微信获得一个身边的加盟顾问</a></h3>
            <p>　　想做加盟，想做项目
                但不知道有什么好加盟项目？&nbsp;
                网上大片大片的加盟品牌项目不知道那个真假，不知好..　<a href="http://news.4006666688.com/detail/26568" title="扫加盟顾问微信获得一个身边的加盟顾问" target="_blank">点击进入>></a></p>
            <ul>
                <li><a href="http://news.4006666688.com/detail/26568" title="扫加盟顾问微信获得一个身边的加盟顾问" target="_blank">扫加盟顾问微信获得一个身..</a></li>
                <li><a href="http://news.4006666688.com/detail/26566" title="消费者和加盟商为什么青睐德国恩美特净水器" target="_blank">消费者和加盟商为什么青睐..</a></li>
                <li><a href="http://news.4006666688.com/detail/26461" title="想加盟开店做项目，我就是您身边的加盟顾问" target="_blank">想加盟开店做项目，我就是..</a></li>
                <li><a href="http://news.4006666688.com/detail/26399" title="中国特许展为投资加盟把控风险" target="_blank">中国特许展为投资加盟把控..</a></li>
                <li><a href="http://news.4006666688.com/detail/26398" title="海澜之家服装行业模式创新堪称行业典范" target="_blank">海澜之家服装行业模式创新..</a></li>
                <li><a href="http://news.4006666688.com/detail/26397" title="海澜之家是产业整合平台" target="_blank">海澜之家是产业整合平台</a></li>
            </ul>
            <!-- 小块广告1 -->
            <a href="http://brand.4006666688.com/brandinfo/7872" target="_blank"><img src="http://www.4006666688.com/images/brand/4/7/8/7/2/index_small2.jpg" alt="宝朗孕婴" width="404" height="80"/></a>    <div class="i_broadcast">
                <p class="titleImg"></p>
                <div id="TextDiv1">
                    <ul id="TextContent1" class="content" style="width:330px;height:40px;overflow:hidden; padding-left:60px;">
                        <li><a href="http://brand.4006666688.com/brandinfo/7098" title="加盟留言" target="_blank">岳阳的 胡女士 想加盟憨豆咖啡</a></li>
                        <li><a href="http://brand.4006666688.com/brandinfo/3023" title="加盟留言" target="_blank">河源的 朱先生 想加盟圆通快递</a></li>
                        <li><a href="http://brand.4006666688.com/brandinfo/8406" title="加盟留言" target="_blank">本溪的 袁 想加盟提拉米酥</a></li>
                        <li><a href="http://brand.4006666688.com/brandinfo/8390" title="加盟留言" target="_blank">本溪的 袁 想加盟茱丽阿姨</a></li>
                        <li><a href="http://brand.4006666688.com/brandinfo/8257" title="加盟留言" target="_blank">北京的 徐女士 想加盟思珂莎</a></li>
                        <li><a href="http://brand.4006666688.com/brandinfo/3023" title="加盟留言" target="_blank">银川的 高文民 想加盟圆通快递</a></li>
                        <li><a href="http://brand.4006666688.com/brandinfo/8390" title="加盟留言" target="_blank">宿迁的 王先生 想加盟茱丽阿姨</a></li>
                        <li><a href="http://brand.4006666688.com/brandinfo/3023" title="加盟留言" target="_blank">南宁的 刁小凤 想加盟圆通快递</a></li>
                        <li><a href="http://brand.4006666688.com/brandinfo/3023" title="加盟留言" target="_blank">岳阳的 杨国生 想加盟圆通快递</a></li>
                        <li><a href="http://brand.4006666688.com/brandinfo/3023" title="加盟留言" target="_blank">成都的 王晓陆 想加盟圆通快递</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="left i_login">
            <ul class="center">
                <li><a href="http://www.4006666688.com/default/login"><img src="http://www.4006666688.com/images/login/i_login_1.gif" alt="免费登记会员" width="130" height="40" /></a>
                    <p><a href="http://www.4006666688.com/member/register">免费登记会员</a></p>
                </li>
                <li><a href="http://www.4006666688.com/company/login"><img src="http://www.4006666688.com/images/login/i_login_2.gif" alt="品牌申请发布" width="130" height="40" /></a>
                    <p><a href="http://www.4006666688.com/company/register">品牌申请发布</a></p>
                </li>
            </ul>
            <h3>
                <!--<img src="http://www.4006666688.com/images/default/i_yugao.gif" width="310" height="50" alt="近期活动预告" />-->
                <!-- jmei 暂时隐藏
                                                                            <a href="http://news.4006666688.com/detail/26568" target="_blank">
                      <img alt="扫加盟顾问微信获得一个身边的加盟顾问" src="http://www.4006666688.com/images/news/index/26568.jpg" width="310" height="80"/>
                    </a>
                        --><!-- jmei 以下替换-->
                <a href="http://www.4006666688.com/huodong/coffee.html" target="_blank">
                    <img alt="微信！" src="http://www.4006666688.com/show/expo/weixin2w.jpg" width="310" height="125"/>
                </a>
            </h3>
            <span>
            <a href="http://news.4006666688.com/detail/25877" target="_blank">
              怎么代理净水器？净水器适合什么样的人加盟            </a>
          </span>
            <span>
            <a href="http://news.4006666688.com/detail/26288" target="_blank">
              马刚：净水器行业最大的问题仍然是普及            </a>
          </span>
            <span>
            <a href="http://news.4006666688.com/detail/26287" target="_blank">
              净水器未来市场前景广阔            </a>
          </span>
            <span>
            <a href="http://news.4006666688.com/detail/25266" target="_blank">
              欧琳橱柜的研发设计体系核心团队            </a>
          </span>
        </div>
    </div>

    <br>

    <div class="i_ad1 center">
        <!-- 横幅广告3 -->
        <!---->
        <a target="_blank" href="http://sh.chinafranchiseexpo.com/"><img width="994" height="81" alt="" src="http://www.4006666688.com/images/huodong/expo2014/zhong1.jpg"></a>
    </div>
    <!-- 第一屏结束 -->

    <br>

    <!-- 第二屏 -->

    <div class="i_ad2 center">
        <!-- 横幅广告1 -->
        <a href="http://brand.4006666688.com/main/7098" target="_blank"><img src="http://www.4006666688.com/images/brand/4/7/0/9/8/index_banner.jpg" alt="憨豆咖啡" width="994" height="81"/></a></div>

    <br>

    <div class="i_join">
        <h3></h3>


        <div class="left_brand">

            <ul>
                <li><a href="http://brand.4006666688.com/brandinfo/8585" target="_blank">
                        <img src="http://www.4006666688.com/upload/brand/201405/07/8585/13994444931000.jpg" width="73" height="24" alt="欧琳橱柜����"/>
                    </a>
                </li>
                <li class="fore"><a class="fPurple" href="http://brand.4006666688.com/brandinfo/8585" target="_blank">欧琳橱柜</a></li>
            </ul>
            <ul>
                <li><a href="http://brand.4006666688.com/brandinfo/5603" target="_blank">
                        <img src="http://www.4006666688.com/upload/brand/201408/27/5603/14091324330100.jpg" width="73" height="24" alt="小黑牛涮涮锅����"/>
                    </a>
                </li>
                <li class="fore"><a class="fPurple" href="http://brand.4006666688.com/brandinfo/5603" target="_blank">小黑牛涮涮锅</a></li>
            </ul>
            <ul>
                <li><a href="http://brand.4006666688.com/brandinfo/8413" target="_blank">
                        <img src="http://www.4006666688.com/upload/brand/201401/22/8413/13903593571010.jpg" width="73" height="24" alt="五号便当����"/>
                    </a>
                </li>
                <li class="fore"><a class="fPurple" href="http://brand.4006666688.com/brandinfo/8413" target="_blank">五号便当</a></li>
            </ul>
            <ul>
                <li><a href="http://brand.4006666688.com/brandinfo/8614" target="_blank">
                        <img src="http://www.4006666688.com/upload/brand/201405/21/8614/14006524400100.jpg" width="73" height="24" alt="爱贝国际少儿英语����"/>
                    </a>
                </li>
                <li class="fore"><a class="fPurple" href="http://brand.4006666688.com/brandinfo/8614" target="_blank">爱贝国际少儿英语</a></li>
            </ul>
            <ul>
                <li><a href="http://brand.4006666688.com/main/7286" target="_blank">
                        <img src="http://www.4006666688.com/upload/brand/201407/23/7286/14061113181000.jpg" width="73" height="24" alt="恩美特净水器����"/>
                    </a>
                </li>
                <li class="fore"><a class="fPurple" href="http://brand.4006666688.com/main/7286" target="_blank">恩美特净水器</a></li>
            </ul>
            <ul>
                <li><a href="http://brand.4006666688.com/brandinfo/7426" target="_blank">
                        <img src="http://www.4006666688.com/upload/brand/201404/08/7426/13969248780110.jpg" width="73" height="24" alt="车骑王子漆面快修����"/>
                    </a>
                </li>
                <li class="fore"><a class="fPurple" href="http://brand.4006666688.com/brandinfo/7426" target="_blank">车骑王子漆面快修</a></li>
            </ul>
            <ul>
                <li><a href="http://brand.4006666688.com/main/8406" target="_blank">
                        <img src="http://www.4006666688.com/upload/brand/201401/11/8406/13894252861010.jpg" width="73" height="24" alt="提拉米酥����"/>
                    </a>
                </li>
                <li class="fore"><a class="fPurple" href="http://brand.4006666688.com/main/8406" target="_blank">提拉米酥</a></li>
            </ul>

        </div>
        <ul class="mid_brand left">
            <li class="brand_width1 boxgrid captionfull">
                <a href="http://brand.4006666688.com/main/222" target="_blank">
                    <img src="http://www.4006666688.com/images/brand/3/2/2/2/index_recommend1.jpg" width="195" height="150"  style="border:1px solid #AFB4B4;" alt="比比客����"/>
                    <div class="cover boxcaption">
                        <h4>比比客</h4>
                        <p></p>
                    </div>
                </a>
            </li>
            <li class="brand_width1 boxgrid captionfull">
                <a href="http://brand.4006666688.com/main/7965" target="_blank">
                    <img src="http://www.4006666688.com/images/brand/4/7/9/6/5/index_recommend1.jpg" width="195" height="150"  style="border:1px solid #AFB4B4;" alt="妈咪丸面����"/>
                    <div class="cover boxcaption">
                        <h4>妈咪丸面</h4>
                        <p>那些年我们一起感受的味道</p>
                    </div>
                </a>
            </li>
            <li class="brand_width1 boxgrid captionfull">
                <a href="http://brand.4006666688.com/main/8406" target="_blank">
                    <img src="http://www.4006666688.com/images/brand/4/8/4/0/6/index_recommend1.jpg" width="195" height="150"  style="border:1px solid #AFB4B4;" alt="提拉米酥����"/>
                    <div class="cover boxcaption">
                        <h4>提拉米酥</h4>
                        <p>爱我，带我走</p>
                    </div>
                </a>
            </li>
            <li class="brand_width1 boxgrid captionfull">
                <a href="http://brand.4006666688.com/brandinfo/7426" target="_blank">
                    <img src="http://www.4006666688.com/images/brand/4/7/4/2/6/index_recommend1.jpg" width="195" height="150"  style="border:1px solid #AFB4B4;" alt="车骑王子漆面快修����"/>
                    <div class="cover boxcaption">
                        <h4>车骑王子漆面快修</h4>
                        <p></p>
                    </div>
                </a>
            </li>
            <li class="brand_width1 boxgrid captionfull">
                <a href="http://brand.4006666688.com/main/7286" target="_blank">
                    <img src="http://www.4006666688.com/images/brand/4/7/2/8/6/index_recommend1.jpg" width="195" height="150"  style="border:1px solid #AFB4B4;" alt="恩美特净水器����"/>
                    <div class="cover boxcaption">
                        <h4>恩美特净水器</h4>
                        <p></p>
                    </div>
                </a>
            </li>
            <li class="brand_width1 boxgrid captionfull">
                <a href="http://brand.4006666688.com/brandinfo/8614" target="_blank">
                    <img src="http://www.4006666688.com/images/brand/4/8/6/1/4/index_recommend1.jpg" width="195" height="150"  style="border:1px solid #AFB4B4;" alt="爱贝国际少儿英语����"/>
                    <div class="cover boxcaption">
                        <h4>爱贝国际少儿英语</h4>
                        <p>更懂中国孩子</p>
                    </div>
                </a>
            </li>
        </ul>
        <div class="right_brand left">
            <ul>
                <li class="brand_width3 boxgrid captionfull">
                    <a href="http://brand.4006666688.com/main/7098" target="_blank">
                        <img width="188" height="300" src="http://www.4006666688.com/images/brand/4/7/0/9/8/index_recommend3.jpg" style="border:1px solid #AFB4B4;" alt="憨豆咖啡����">
                        <div class="cover boxcaption">
                            <h4>憨豆咖啡</h4>
                            <p>Happy +Coffee = Mr Bean Coffee</p>
                        </div>
                    </a>
                </li>
            </ul>
        </div>


        <SCRIPT type=text/javascript>
            $(document).ready(function(){
                $('.boxgrid.captionfull').hover(function(){
                    $(".cover", this).stop().animate({top:'0'},{queue:false,duration:350});
                }, function() {
                    $(".cover", this).stop().animate({top:'-300px'},{queue:false,duration:350});
                });
            });
        </SCRIPT>
    </div>

    <!-- 第二屏结束 -->


    <div class="i_ad2 center">
        <!-- 横幅广告2 -->
        <!---->
        <a target="_blank" href="http://www.4006666688.com/huodong/yingyun.html"><img width="994" height="81" alt="千家加盟品牌访谈行孕婴加盟创业指导专题" src="http://www.4006666688.com/images/huodong/yingyun/yyzt.jpg"></a>
    </div>


    <!--咨询师推荐关注开始-->
    <div class="i_head center"><img alt="咨询师推荐关注" src="http://www.4006666688.com/images/images/i_menu3.jpg" width="1000" height="47" /></div>
    <div class="i_head center">
        <div class="i_ranking"><img alt="咨询师推荐" src="http://www.4006666688.com/images/images/i_listTitle.jpg" width="299" height="47" />

            <ul class="picul" id="rankDiv1">
                <li><img src="http://www.4006666688.com/images/images/num1.gif" width="26" height="21" alt="加盟排行榜"/></li>
                <li class="pichover"><a href="http://brand.4006666688.com/brandinfo/952" title="麦当劳加盟" target="_blank"><img src="http://www.4006666688.com/upload/brand/2009-08/13/952/t125100-1250147899.jpg" alt="麦当劳加盟" width="214" height="139" /></a>
                    <p><b class="fSize14"><a href="http://brand.4006666688.com/brandinfo/952" title="麦当劳加盟" target="_blank">麦当劳</a></b>&nbsp;&nbsp;中式&nbsp;&nbsp;<b class="fRed">200-500万</b></p>
                </li>
            </ul>
            <ul class="textul none" id="rankList1" onmouseover="divChangeUl('1','rankDiv','rankList',10)">
                <li><img src="http://www.4006666688.com/images/images/num1.gif" width="26" height="21" alt="加盟排行榜"/></li>
                <li><a href="http://brand.4006666688.com/brandinfo/952" title="麦当劳加盟" target="_blank">麦当劳加盟</a>【餐饮】</li>
            </ul>
            <ul class="picul none" id="rankDiv2">
                <li><img src="http://www.4006666688.com/images/images/num2.gif" width="26" height="21" alt="加盟排行榜"/></li>
                <li class="pichover"><a href="http://brand.4006666688.com/main/3333" title="天赐福燕加盟" target="_blank"><img src="http://www.4006666688.com/upload/brand/201309/02/3333/13781099470100.jpg" alt="天赐福燕加盟" width="214" height="139" /></a>
                    <p><b class="fSize14"><a href="http://brand.4006666688.com/main/3333" title="天赐福燕加盟" target="_blank">天赐福燕</a></b>&nbsp;&nbsp;保健食品&nbsp;&nbsp;<b class="fRed">10-20万</b></p>
                </li>
            </ul>
            <ul class="textul" id="rankList2" onmouseover="divChangeUl('2','rankDiv','rankList',10)">
                <li><img src="http://www.4006666688.com/images/images/num2.gif" width="26" height="21" alt="加盟排行榜"/></li>
                <li><a href="http://brand.4006666688.com/main/3333" title="天赐福燕加盟" target="_blank">天赐福燕加盟</a>【医疗】</li>
            </ul>
            <ul class="picul none" id="rankDiv3">
                <li><img src="http://www.4006666688.com/images/images/num3.gif" width="26" height="21" alt="加盟排行榜"/></li>
                <li class="pichover"><a href="http://brand.4006666688.com/brandinfo/256" title="吉祥馄饨加盟" target="_blank"><img src="http://www.4006666688.com/upload/brand/201408/25/256/14089552371100.jpg" alt="吉祥馄饨加盟" width="214" height="139" /></a>
                    <p><b class="fSize14"><a href="http://brand.4006666688.com/brandinfo/256" title="吉祥馄饨加盟" target="_blank">吉祥馄饨</a></b>&nbsp;&nbsp;中式&nbsp;&nbsp;<b class="fRed">1--10万</b></p>
                </li>
            </ul>
            <ul class="textul" id="rankList3" onmouseover="divChangeUl('3','rankDiv','rankList',10)">
                <li><img src="http://www.4006666688.com/images/images/num3.gif" width="26" height="21" alt="加盟排行榜"/></li>
                <li><a href="http://brand.4006666688.com/brandinfo/256" title="吉祥馄饨加盟" target="_blank">吉祥馄饨加盟</a>【餐饮】</li>
            </ul>
            <ul class="picul none" id="rankDiv4">
                <li><img src="http://www.4006666688.com/images/images/num4.gif" width="26" height="21" alt="加盟排行榜"/></li>
                <li class="pichover"><a href="http://brand.4006666688.com/main/3023" title="圆通快递加盟" target="_blank"><img src="http://www.4006666688.com/upload/brand/2009-07/23/3023/t125100-1248331680.jpg" alt="圆通快递加盟" width="214" height="139" /></a>
                    <p><b class="fSize14"><a href="http://brand.4006666688.com/main/3023" title="圆通快递加盟" target="_blank">圆通快递</a></b>&nbsp;&nbsp;物流快递&nbsp;&nbsp;<b class="fRed">1--10万</b></p>
                </li>
            </ul>
            <ul class="textul" id="rankList4" onmouseover="divChangeUl('4','rankDiv','rankList',10)">
                <li><img src="http://www.4006666688.com/images/images/num4.gif" width="26" height="21" alt="加盟排行榜"/></li>
                <li><a href="http://brand.4006666688.com/main/3023" title="圆通快递加盟" target="_blank">圆通快递加盟</a>【商务】</li>
            </ul>
            <ul class="picul none" id="rankDiv5">
                <li><img src="http://www.4006666688.com/images/images/num5.gif" width="26" height="21" alt="加盟排行榜"/></li>
                <li class="pichover"><a href="http://brand.4006666688.com/brandinfo/1819" title="巴拉巴拉加盟" target="_blank"><img src="http://www.4006666688.com/upload/brand/201409/10/1819/14103505830010.jpg" alt="巴拉巴拉加盟" width="214" height="139" /></a>
                    <p><b class="fSize14"><a href="http://brand.4006666688.com/brandinfo/1819" title="巴拉巴拉加盟" target="_blank">巴拉巴拉</a></b>&nbsp;&nbsp;童装&nbsp;&nbsp;<b class="fRed">50-100万</b></p>
                </li>
            </ul>
            <ul class="textul" id="rankList5" onmouseover="divChangeUl('5','rankDiv','rankList',10)">
                <li><img src="http://www.4006666688.com/images/images/num5.gif" width="26" height="21" alt="加盟排行榜"/></li>
                <li><a href="http://brand.4006666688.com/brandinfo/1819" title="巴拉巴拉加盟" target="_blank">巴拉巴拉加盟</a>【服装】</li>
            </ul>
            <ul class="picul none" id="rankDiv6">
                <li><img src="http://www.4006666688.com/images/images/num6.gif" width="26" height="21" alt="加盟排行榜"/></li>
                <li class="pichover"><a href="http://brand.4006666688.com/brandinfo/2247" title="鹭珂鸶加盟" target="_blank"><img src="http://www.4006666688.com/upload/brand/2010-04/17/2247/t125100-1271462161.jpg" alt="鹭珂鸶加盟" width="214" height="139" /></a>
                    <p><b class="fSize14"><a href="http://brand.4006666688.com/brandinfo/2247" title="鹭珂鸶加盟" target="_blank">鹭珂鸶</a></b>&nbsp;&nbsp;内衣&nbsp;&nbsp;<b class="fRed">1--10万</b></p>
                </li>
            </ul>
            <ul class="textul" id="rankList6" onmouseover="divChangeUl('6','rankDiv','rankList',10)">
                <li><img src="http://www.4006666688.com/images/images/num6.gif" width="26" height="21" alt="加盟排行榜"/></li>
                <li><a href="http://brand.4006666688.com/brandinfo/2247" title="鹭珂鸶加盟" target="_blank">鹭珂鸶加盟</a>【服装】</li>
            </ul>
            <ul class="picul none" id="rankDiv7">
                <li><img src="http://www.4006666688.com/images/images/num7.gif" width="26" height="21" alt="加盟排行榜"/></li>
                <li class="pichover"><a href="http://brand.4006666688.com/brandinfo/1696" title="快乐柠檬加盟" target="_blank"><img src="http://www.4006666688.com/upload/brand/2009-10/28/1696/t125100-1256722571.jpg" alt="快乐柠檬加盟" width="214" height="139" /></a>
                    <p><b class="fSize14"><a href="http://brand.4006666688.com/brandinfo/1696" title="快乐柠檬加盟" target="_blank">快乐柠檬</a></b>&nbsp;&nbsp;奶茶店&nbsp;&nbsp;<b class="fRed">50-100万</b></p>
                </li>
            </ul>
            <ul class="textul" id="rankList7" onmouseover="divChangeUl('7','rankDiv','rankList',10)">
                <li><img src="http://www.4006666688.com/images/images/num7.gif" width="26" height="21" alt="加盟排行榜"/></li>
                <li><a href="http://brand.4006666688.com/brandinfo/1696" title="快乐柠檬加盟" target="_blank">快乐柠檬加盟</a>【饮品】</li>
            </ul>
            <ul class="picul none" id="rankDiv8">
                <li><img src="http://www.4006666688.com/images/images/num8.gif" width="26" height="21" alt="加盟排行榜"/></li>
                <li class="pichover"><a href="http://brand.4006666688.com/brandinfo/2231" title="百斯盾裤业加盟" target="_blank"><img src="http://www.4006666688.com/upload/brand/24/160/2231/t125100-1242291265.jpg" alt="百斯盾裤业加盟" width="214" height="139" /></a>
                    <p><b class="fSize14"><a href="http://brand.4006666688.com/brandinfo/2231" title="百斯盾裤业加盟" target="_blank">百斯盾裤业</a></b>&nbsp;&nbsp;男女装&nbsp;&nbsp;<b class="fRed">20-50万</b></p>
                </li>
            </ul>
            <ul class="textul" id="rankList8" onmouseover="divChangeUl('8','rankDiv','rankList',10)">
                <li><img src="http://www.4006666688.com/images/images/num8.gif" width="26" height="21" alt="加盟排行榜"/></li>
                <li><a href="http://brand.4006666688.com/brandinfo/2231" title="百斯盾裤业加盟" target="_blank">百斯盾裤业加盟</a>【服装】</li>
            </ul>
            <ul class="picul none" id="rankDiv9">
                <li><img src="http://www.4006666688.com/images/images/num9.gif" width="26" height="21" alt="加盟排行榜"/></li>
                <li class="pichover"><a href="http://brand.4006666688.com/brandinfo/6091" title="CoCo都可茶饮加盟" target="_blank"><img src="http://www.4006666688.com/upload/brand/201103/09/6091/12996360021010.jpg" alt="CoCo都可茶饮加盟" width="214" height="139" /></a>
                    <p><b class="fSize14"><a href="http://brand.4006666688.com/brandinfo/6091" title="CoCo都可茶饮加盟" target="_blank">CoCo都可茶饮</a></b>&nbsp;&nbsp;特色饮品店&nbsp;&nbsp;<b class="fRed">100-200万</b></p>
                </li>
            </ul>
            <ul class="textul" id="rankList9" onmouseover="divChangeUl('9','rankDiv','rankList',10)">
                <li><img src="http://www.4006666688.com/images/images/num9.gif" width="26" height="21" alt="加盟排行榜"/></li>
                <li><a href="http://brand.4006666688.com/brandinfo/6091" title="CoCo都可茶饮加盟" target="_blank">CoCo都可茶饮加盟</a>【饮品】</li>
            </ul>
            <ul class="picul none" id="rankDiv10">
                <li><img src="http://www.4006666688.com/images/images/num10.gif" width="26" height="21" alt="加盟排行榜"/></li>
                <li class="pichover"><a href="http://brand.4006666688.com/brandinfo/6984" title="雷洛斯天使加盟" target="_blank"><img src="http://www.4006666688.com/upload/brand/201202/16/6984/13293843011000.jpg" alt="雷洛斯天使加盟" width="214" height="139" /></a>
                    <p><b class="fSize14"><a href="http://brand.4006666688.com/brandinfo/6984" title="雷洛斯天使加盟" target="_blank">雷洛斯天使</a></b>&nbsp;&nbsp;皮革箱包&nbsp;&nbsp;<b class="fRed">1--10万</b></p>
                </li>
            </ul>
            <ul class="textul" id="rankList10" onmouseover="divChangeUl('10','rankDiv','rankList',10)">
                <li><img src="http://www.4006666688.com/images/images/num10.gif" width="26" height="21" alt="加盟排行榜"/></li>
                <li><a href="http://brand.4006666688.com/brandinfo/6984" title="雷洛斯天使加盟" target="_blank">雷洛斯天使加盟</a>【服装】</li>
            </ul>

        </div>

        <div class="i_recommend"><img src="http://www.4006666688.com/images/images/i_kddzk.jpg" width="150" height="30" alt="开店点子库" />
            <ul class="ulline">
                <li>
                    <h1><a href="http://news.4006666688.com/detail/25877" title="怎么代理净水器？净水器适合什么样的人加盟" target="_blank">怎么代理净水器？净水器适合什么样的人加..</a></h1>
                    <p>对于净水器行业而言，大都数创业者还不太了解怎么代理净水器，净水器代理加盟首选中国十大净水器品牌&mdash;瑞轩源：CCTV央视上榜..　<a href="http://news.4006666688.com/detail/25877" title="怎么代理净水器？净水器适合什么样的人加盟" target="_blank" class="fOrange">点击进入>></a></p>
                </li>
            </ul>
            <ul class="ulline">
                <li>
                    <h1><a href="http://news.4006666688.com/detail/26568" title="扫加盟顾问微信获得一个身边的加盟顾问" target="_blank">扫加盟顾问微信获得一个身边的加盟顾问</a></h1>
                    <p>想做加盟，想做项目
                        但不知道有什么好加盟项目？&nbsp;
                        网上大片大片的加盟品牌项目不知道那个真假，不知好坏？&nbsp;
                        才开始想做..　<a href="http://news.4006666688.com/detail/26568" title="扫加盟顾问微信获得一个身边的加盟顾问" target="_blank" class="fOrange">点击进入>></a></p>
                </li>
            </ul>
            <ul>
                <li class="liico">
                    <a title="想加盟开店做项目，我就是您身边的加盟顾问" href="http://news.4006666688.com/detail/26461" target="_blank">
                        想加盟开店做项目，我就是您身边的加盟顾问          </a>
                </li>
                <li class="liico">
                    <a title="怎么代理净水器？净水器适合什么样的人加盟" href="http://news.4006666688.com/detail/25877" target="_blank">
                        怎么代理净水器？净水器适合什么样的人加盟          </a>
                </li>
                <li class="liico">
                    <a title="如何经营好面包店?面包店经营技巧全在这里" href="http://news.4006666688.com/detail/22453" target="_blank">
                        如何经营好面包店?面包店经营技巧全在这里          </a>
                </li>
                <li class="liico">
                    <a title="六大生活小常识 生活达人就是你" href="http://news.4006666688.com/detail/22452" target="_blank">
                        六大生活小常识 生活达人就是你          </a>
                </li>
                <li class="liico">
                    <a title="老客户支持 服装店的经营王道" href="http://news.4006666688.com/detail/22451" target="_blank">
                        老客户支持 服装店的经营王道          </a>
                </li>
                <li class="liico">
                    <a title="小编为你介绍七种服装店的陈列方式" href="http://news.4006666688.com/detail/22450" target="_blank">
                        小编为你介绍七种服装店的陈列方式          </a>
                </li>
            </ul>
            <!-- 小块广告2 -->
            <a href="http://brand.4006666688.com/main/648" target="_blank"><img src="http://www.4006666688.com/images/brand/3/6/4/8/index_small1.jpg" alt="维也纳酒店" width="398" height="112"/></a>    </div>
        <div class="i_brand"><img src="http://www.4006666688.com/images/images/i_zjgxpx.jpg" width="150" height="30" alt="最新更新品牌"/>
            <ul class="pTop15">

                <li class="pic"><a href="http://brand.4006666688.com/brandinfo/6933" title="盛德奇嘉加盟" target="_blank"><img src="http://www.4006666688.com/upload/brand/201202/09/6933/13287555810100.jpg" alt="盛德奇嘉加盟" width="214" height="139" /></a>
                    <p><b class="fSize14">盛德奇嘉</b>&nbsp;&nbsp;汽车用品&nbsp;&nbsp;<b class="fRed">1--10万</b></p>
                </li>
                <li>· <a href="http://brand.4006666688.com/brandinfo/7149" title="OUTCOOL奥库加盟" target="_blank">OUTCOOL奥库加盟  20-50万 【服装】</a></li>
                <li>· <a href="http://brand.4006666688.com/brandinfo/6020" title="千里之香章鱼小丸子加盟" target="_blank">千里之香章鱼小丸子加盟  1万以下 【餐饮】</a></li>
                <li>· <a href="http://brand.4006666688.com/brandinfo/4856" title="肯洁加盟" target="_blank">肯洁加盟  20-50万 【干洗】</a></li>
                <li>· <a href="http://brand.4006666688.com/brandinfo/6155" title="瓦罐面加盟" target="_blank">瓦罐面加盟  1--10万 【餐饮】</a></li>
                <li>· <a href="http://brand.4006666688.com/brandinfo/2416" title="秦朝瓦罐面加盟" target="_blank">秦朝瓦罐面加盟  1--10万 【餐饮】</a></li>
                <li>· <a href="http://brand.4006666688.com/brandinfo/6996" title="旧车站咖啡加盟" target="_blank">旧车站咖啡加盟  20-50万 【饮品】</a></li>
                <li>· <a href="http://brand.4006666688.com/brandinfo/7038" title="香格里拉干洗加盟" target="_blank">香格里拉干洗加盟  10-20万 【干洗】</a></li>
                <li>· <a href="http://brand.4006666688.com/brandinfo/7005" title="呗可咔司蛋糕花园加盟" target="_blank">呗可咔司蛋糕花园加盟  1--10万 【餐饮】</a></li>
                <li>· <a href="http://brand.4006666688.com/brandinfo/2908" title="阿里之门加盟" target="_blank">阿里之门加盟  10-20万 【零售】</a></li>
                <li>· <a href="http://brand.4006666688.com/brandinfo/8258" title="Gooddrink(古德沝客)加盟" target="_blank">Gooddrink(古德沝客)加盟  1--10万 【餐饮】</a></li>
                <li>· <a href="http://brand.4006666688.com/brandinfo/6137" title="再出发加盟" target="_blank">再出发加盟  1--10万 【美容】</a></li>
                <li>· <a href="http://brand.4006666688.com/main/5778" title="爱育幼童加盟" target="_blank">爱育幼童加盟  20-50万 【教育】</a></li>
            </ul>
        </div>
        <br  class="clear"/>
    </div>
    <!--咨询师推荐关注结束-->

    <br>

    <div class="center i_adstyle2">
        <!-- 横幅广告4 -->
        <!--<a href="http://brand.4006666688.com/main/1536" target="_blank"><img src="http://www.4006666688.com/images/brand/4/1/5/3/6/index_banner.jpg" alt="街客" width="994" height="81"/></a>-->
        <a target="_blank" href="http://www.4006666688.com/huodong/zaojiao.html"><img width="994" height="81" alt="千家加盟品牌访谈行早教加盟创业指导专题" src="http://www.4006666688.com/images/huodong/zaojiao/zjzd.jpg"></a>
    </div>

    <br>

    <!--优质品牌展示开始-->
    <div class="i_head center"><img src="http://www.4006666688.com/images/images/i_menu4.jpg" width="1000" height="47" alt="优质品牌展示"/></div>
    <div class="i_brandshow center">
        <ul>

            <li class="i_brand1  boxgrid captionfull">
                <a href="http://brand.4006666688.com/brandinfo/8413" target="_blank">
                    <img src="http://www.4006666688.com/images/brand/4/8/4/1/3/index_excellent1.jpg" alt="五号便当加盟" width="196" height="250" />
                    <div class="cover boxcaption">
                        <h4>五号便当</h4>
                        <p></p>
                    </div>
                </a>
            </li>
            <li class="i_brand1  boxgrid captionfull">
                <a href="http://brand.4006666688.com/main/3333" target="_blank">
                    <img src="http://www.4006666688.com/images/brand/4/3/3/3/3/index_excellent1.jpg" alt="天赐福燕加盟" width="196" height="250" />
                    <div class="cover boxcaption">
                        <h4>天赐福燕</h4>
                        <p>新健康主义的倡导者和领航者·最专业的燕窝品牌</p>
                    </div>
                </a>
            </li>
            <li class="i_brand1  boxgrid captionfull">
                <a href="http://brand.4006666688.com/main/3992" target="_blank">
                    <img src="http://www.4006666688.com/images/brand/4/3/9/9/2/index_excellent1.jpg" alt="上官燕加盟" width="196" height="250" />
                    <div class="cover boxcaption">
                        <h4>上官燕</h4>
                        <p>打造中国最好的燕窝连锁品牌</p>
                    </div>
                </a>
            </li>
            <li class="i_brand1  boxgrid captionfull">
                <a href="http://brand.4006666688.com/main/4560" target="_blank">
                    <img src="http://www.4006666688.com/images/brand/4/4/5/6/0/index_excellent1.jpg" alt="乐扣乐扣加盟" width="196" height="250" />
                    <div class="cover boxcaption">
                        <h4>乐扣乐扣</h4>
                        <p>顾客的幸福，我们的喜悦！</p>
                    </div>
                </a>
            </li>
            <li class="i_brand1  boxgrid captionfull">
                <a href="http://brand.4006666688.com/main/6983" target="_blank">
                    <img src="http://www.4006666688.com/images/brand/4/6/9/8/3/index_excellent1.jpg" alt="宝宝星加盟" width="196" height="250" />
                    <div class="cover boxcaption">
                        <h4>宝宝星</h4>
                        <p>中国婴童服务领军品牌</p>
                    </div>
                </a>
            </li>
        </ul>
    </div>
    <!--优质品牌展示结束-->

    <br>

    <div class="center i_adstyle2">
        <!-- 横幅广告5 -->
        <!--  -->
        <a target="_blank" href="http://www.4006666688.com/huodong/jmsjlb.html"><img width="994" height="81" alt="加盟商投资俱乐部" src="http://www.4006666688.com/images/huodong/jmsjlb/jmsjlb.jpg"></a>
    </div>

    <br>

    <!--勤劳的品牌开始-->
    <div class="i_head center"><img src="http://www.4006666688.com/images/images/i_menu5.jpg" width="1000" height="47" alt="勤劳的品牌" /></div>
    <div class="i_brandList center">
        <ul>
            <li>
                <a href="http://brand.4006666688.com/brandinfo/6086" title="Fine1900" target="_blank">
                    <img src="http://www.4006666688.com/upload/brand/201201/17/6086/13267403010110.jpg" alt="Fine1900加盟" height="104" width="124" />
                </a>
                <p><a href="http://brand.4006666688.com/brandinfo/6086" title="Fine1900" target="_blank">Fine1900</a></p>
            </li>
            <li>
                <a href="http://brand.4006666688.com/brandinfo/6933" title="盛德奇嘉" target="_blank">
                    <img src="http://www.4006666688.com/upload/brand/201202/09/6933/13287555810100.jpg" alt="盛德奇嘉加盟" height="104" width="124" />
                </a>
                <p><a href="http://brand.4006666688.com/brandinfo/6933" title="盛德奇嘉" target="_blank">盛德奇嘉</a></p>
            </li>
            <li>
                <a href="http://brand.4006666688.com/brandinfo/6234" title="正宗陕西特色小吃西安樊家腊汁肉夹馍加盟技术学习培训" target="_blank">
                    <img src="http://www.4006666688.com/upload/brand/201210/08/6234/13496868360000.jpg" alt="正宗陕西特色小吃西安樊家腊汁肉夹馍加盟技术学习培训加盟" height="104" width="124" />
                </a>
                <p><a href="http://brand.4006666688.com/brandinfo/6234" title="正宗陕西特色小吃西安樊家腊汁肉夹馍加盟技术学习培训" target="_blank">正宗陕西特色小吃西安</a></p>
            </li>
            <li>
                <a href="http://brand.4006666688.com/brandinfo/1364" title="AA国际动漫" target="_blank">
                    <img src="http://www.4006666688.com/upload/brand/201511/16/1364/14476600120010.jpg" alt="AA国际动漫加盟" height="104" width="124" />
                </a>
                <p><a href="http://brand.4006666688.com/brandinfo/1364" title="AA国际动漫" target="_blank">AA国际动漫</a></p>
            </li>
            <li>
                <a href="http://brand.4006666688.com/brandinfo/7149" title="OUTCOOL奥库" target="_blank">
                    <img src="http://www.4006666688.com/upload/brand/201611/25/7149/14800527721110.jpg" alt="OUTCOOL奥库加盟" height="104" width="124" />
                </a>
                <p><a href="http://brand.4006666688.com/brandinfo/7149" title="OUTCOOL奥库" target="_blank">OUTCOOL奥库</a></p>
            </li>
            <li>
                <a href="http://brand.4006666688.com/brandinfo/7098" title="憨豆咖啡" target="_blank">
                    <img src="http://www.4006666688.com/upload/brand/201203/22/7098/13324125110100.png" alt="憨豆咖啡加盟" height="104" width="124" />
                </a>
                <p><a href="http://brand.4006666688.com/brandinfo/7098" title="憨豆咖啡" target="_blank">憨豆咖啡</a></p>
            </li>
        </ul>
    </div>
    <!--勤劳的品牌结束-->

    <!--# 友情链接 #-->

    <!--友情链接开始-->
    <div class="i_head center"><img src="http://www.4006666688.com/images/images/i_menu6.jpg" width="1000" height="47" alt="友情链接"/></div>
    <div class="i_head center" >
        <div class="i_fLink">
            <ul>
                <li class="textLink"><a href="http://spxy.sbs.edu.cn" target="_blank" title="上海商学院">上海商学院</a></li>
                <li class="textLink"><a href="http://www.storescn.com" target="_blank" title="中国连锁杂志社">中国连锁杂志社</a></li>
                <li class="textLink"><a href="http://www.chuangyezg.com/" target="_blank" title="创业中国网">创业中国网</a></li>
                <li class="textLink"><a href="http://www.bailiren.com/" target="_blank" title="化妆品代理">化妆品代理</a></li>
                <li class="textLink"><a href="http://www.31jmw.com/" target="_blank" title="小生意">小生意</a></li>
                <li class="textLink"><a href="http://www.jmbao.com/" target="_blank" title="招商加盟">招商加盟</a></li>
                <li class="textLink"><a href="http://www.aadongman.com" target="_blank" title="动漫店加盟">动漫店加盟</a></li>
                <li class="textLink"><a href="http://www.kuaile800.com" target="_blank" title="品牌加盟">品牌加盟</a></li>
                <li class="textLink"><a href="http://www.96519.net" target="_blank" title="新白领商机网">新白领商机网</a></li>
                <li class="textLink"><a href="http://www.kangel.net.cn" target="_blank" title="干洗店加盟">干洗店加盟</a></li>
                <li class="textLink"><a href="http://www.xinmanyuan.com" target="_blank" title="动漫店">动漫店</a></li>
                <li class="textLink"><a href="http://www.texu1.com" target="_blank" title="中国特许经营第一网">中国特许经营第一网</a></li>
                <li class="textLink"><a href="http://www.syc123.com" target="_blank" title="化妆品加盟">化妆品加盟</a></li>
                <li class="textLink"><a href="http://www.3188.tv" target="_blank" title="服装加盟">服装加盟</a></li>
                <li class="textLink"><a href="http://www.liansuo.com" target="_blank" title="连锁加盟">连锁加盟</a></li>
                <li class="textLink"><a href="http://www.maimaiti.org" target="_blank" title="买卖提">买卖提</a></li>
                <li class="textLink"><a href="http://www.9518.cn/" target="_blank" title="9518环球商机网">9518环球商机网</a></li>
                <li class="textLink"><a href="http://www.tinlu.com" target="_blank" title="网络营销">网络营销</a></li>
                <li class="textLink"><a href="http://www.chuangniu.com" target="_blank" title="创牛商机网">创牛商机网</a></li>
                <li class="textLink"><a href="http://sh.job592.com/" target="_blank" title="上海人才网">上海人才网</a></li>
                <li class="textLink"><a href="http://www.tzkd.com" target="_blank" title="投资开店">投资开店</a></li>
                <li class="textLink"><a href="http://www.wiseivr.com" target="_blank" title="财知百科">财知百科</a></li>
                <li class="textLink"><a href="http://www.17828.cn" target="_blank" title="连锁加盟网">连锁加盟网</a></li>
                <li class="textLink"><a href="http://bj.zxdyw.com" target="_blank" title="北京装修网">北京装修网</a></li>
                <li class="textLink"><a href="http://www.lj168.com/" target="_blank" title="珞珈投资">珞珈投资</a></li>
                <li class="textLink"><a href="http://www.chuangyezg.com/" target="_blank" title="创业网">创业网</a></li>
                <li class="textLink"><a href="http://www.fjcha.com" target="_blank" title="茶叶招商">茶叶招商</a></li>
                <li class="textLink"><a href="http://www.qegee.com" target="_blank" title="创业加盟">创业加盟</a></li>
                <li class="textLink"><a href="http://www.wwwwx.cn" target="_blank" title="网店货源网">网店货源网</a></li>
                <li class="textLink"><a href="http://www.6788.cn/" target="_blank" title="6788招商网">6788招商网</a></li>
                <li class="textLink"><a href="http://www.jm58.cn" target="_blank" title="招商加盟">招商加盟</a></li>
                <li class="textLink"><a href="http://www.xiche168.com" target="_blank" title="汽车美容加盟">汽车美容加盟</a></li>
                <li class="textLink"><a href="http://www.ggsgg.com" target="_blank" title="广搜商务网">广搜商务网</a></li>
                <li class="textLink"><a href="http://zu.sy.soufun.com/" target="_blank" title="沈阳租房">沈阳租房</a></li>
                <li class="textLink"><a href="http://www.zsyzw.cn/" target="_blank" title="中国招商引资网">中国招商引资网</a></li>
                <li class="textLink"><a href="http://cy.89178.com" target="_blank" title="创业项目">创业项目</a></li>
                <li class="textLink"><a href="http://www.yzhygd.com/" target="_blank" title="创业项目加盟">创业项目加盟</a></li>
                <li class="textLink"><a href="http://sj.89178.com" target="_blank" title="创业网">创业网</a></li>
                <li class="textLink"><a href="http://www.shengyijie.net/" target="_blank" title="创业加盟">创业加盟</a></li>
                <li class="textLink"><a href="http://www.szjstz.cn" target="_blank" title="投资加盟">投资加盟</a></li>
                <li class="textLink"><a href="http://www.yinhangxyk.com" target="_blank" title="信用卡商城">信用卡商城</a></li>
                <li class="textLink"><a href="http://www.shengyijie.com.cn/" target="_blank" title="创业项目加盟">创业项目加盟</a></li>
                <li class="textLink"><a href="http://anhui.3158.cn/" target="_blank" title="安徽招商加盟">安徽招商加盟</a></li>
                <li class="textLink"><a href="http://www.zhifuj.cn" target="_blank" title="致富经">致富经</a></li>
                <li class="textLink"><a href="http://www.fanmeishi.cn" target="_blank" title="化妆品加盟">化妆品加盟</a></li>
                <li class="textLink"><a href="http://www.168jiameng.com" target="_blank" title="加盟网">加盟网</a></li>
                <li class="textLink"><a href="http://www.biz178.com" target="_blank" title="加盟网">加盟网</a></li>
                <li class="textLink"><a href="http://www.9ijm.com/" target="_blank" title="就爱加盟网">就爱加盟网</a></li>
                <li class="textLink"><a href="http://agent.jc001.cn/" target="_blank" title="建材加盟网">建材加盟网</a></li>
                <li class="textLink"><a href="http://yangzhou.baixing.com/" target="_blank" title="扬州分类信息网">扬州分类信息网</a></li>
                <li class="textLink"><a href="http://www.oleena.net.cn/" target="_blank" title="奥琳娜品牌授权网站">奥琳娜品牌授权网站</a></li>
                <li class="textLink"><a href="http://www.licensingfair.cn/" target="_blank" title="品牌授权">品牌授权</a></li>
                <li class="textLink"><a href="http://www.ccfcc.net" target="_blank" title="医药连锁">医药连锁</a></li>
                <li class="textLink"><a href="http://www.dnsqfw.org/" target="_blank" title="社区生活">社区生活</a></li>
                <li class="textLink"><a href="http://www.89178.com" target="_blank" title="创业网">创业网</a></li>
                <li class="textLink"><a href="http://www.51jiameng.com" target="_blank" title="加盟商机">加盟商机</a></li>
                <li class="textLink"><a href="http://www.dv37.com" target="_blank" title="加盟网">加盟网</a></li>
                <li class="textLink"><a href="http://www.959.cn/" target="_blank" title="959品牌招商网">959品牌招商网</a></li>
                <li class="textLink"><a href="http://www.laijiameng.cn" target="_blank" title="来加盟">来加盟</a></li>
                <li class="textLink"><a href="http://www.91jm.com" target="_blank" title="91加盟网">91加盟网</a></li>
                <li class="textLink"><a href="http://www.mbcnet.cn" target="_blank" title="童装加盟">童装加盟</a></li>
                <li class="textLink"><a href="http://www.4006666688.com/about/link" target="_blank" title="更多"><strong style="color: rgb(61, 70, 75);">申请链接</strong></a></li>
            </ul>
        </div>
    </div>
    <div class="i_head center" >
        <div class="i_fLink">
            <ul>
                <li class="picLink"><a href="http://www.zx110.org/"><img src="http://www.4006666688.com/show/shwj110.jpg" width="128" height="58" alt="网络110"></a></li>
                <li class="picLink"><a href="http://sh.cyberpolice.cn/"><img src="http://www.4006666688.com/show/cxw.jpg" width="128" height="58" alt="网络诚信 人人有责"></a></li>
            </ul>
        </div>
    </div>
@stop