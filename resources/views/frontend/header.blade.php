@inject('headers',App\Header')
<header>
<div class="header">
    <div class="top">
        <div class="inner">
            <div class="top_l">您好，欢迎访问5988创业商机网！</div>
            <div class="top_r">
                <div class="tel">7*24小时免费直拨 400-8858-878</div>
                <div class="add_wb">
                  </div>
            </div>
        </div>
    </div>

    <div class="header_box_wrap">
        <div class="header_box">
            <div class="logo"><a href="/" target="_blank"><img src="http://www.5988.com/public/images/logo.jpg" alt="5988创业商机网"/></a>
                @if(Request::getrequesturi()=='/')
                    <h1 class="zhaji_logo">炸鸡加盟</h1>
                @else
                <h2 class="zhaji_logo">炸鸡加盟</h2>
                @endif
            </div>
            <div class="search">
                <div class="search_tab">
                    <ul>
                        <li class="cur">找商机</li>
                        <li><a href="/project/0-1~5-0-0.shtml" target="_blank">5万以下</a></li>
                        <li><a href="/project/0-5~10-0-0.shtml" target="_blank">5-10万</a></li>
                        <li><a href="/project/0-10~20-0-0.shtml" target="_blank">10-20万</a></li>
                        <li><a href="/project/0-20~50-0-0.shtml" target="_blank">20-50万</a></li>
                    </ul>
                </div>
                <div class="search_box">
                    <form action="" method="get">
                        <input type="text" onblur="if (this.value == '') {this.value = this.attributes['def'].value;this.className='search_input';}" onfocus="if (this.value == this.attributes['def'].value) {this.value='';this.className='search_input1';}" def="想找什么项目？" class="search_input" value="想找什么项目？" name="search">
                        <input type="submit" class="search_btn" value="搜索">
                    </form>
                </div>
            </div>
            <div class="quick_btn">
                <ul>
                    <li>
                        <a href="/paihangbang"><i class="icon1"></i><span class="tit">排行榜</span></a>
                    </li>
                    <li>
                        <a href="javascript:;" rel="nofollow" target="_self"><i class="icon2"></i><span class="tit">项目搜索</span></a>
                    </li>

                    <li>
                        <a href="/brands"><i class="icon3"></i><span class="tit">品牌大全</span></a>
                    </li>
                    <li>
                        <a href="javascript:;" rel="nofollow" target="_self"><i class="icon4"></i><span class="tit">加盟问答</span></a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <nav>
    <div class="nav">
        <div class="inner">
            <ul class="nav_list">
                <li class="cur"><a href="/" >首页</a></li>
                @foreach($headers->HeaderLists() as $real_path=>$header)

                <li><a href="/{{$real_path}}" >{{$header}}</a></li>
                @endforeach
            </ul>
        </div>
    </div>
    </nav>

   @yield('subnav')
</div>
</header>