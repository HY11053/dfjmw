@extends('frontend.frontend')
@section('title'){{$thistypeinfo->title}}@stop
@section('keywords'){{$thistypeinfo->keywords}}@stop
@section('description'){{$thistypeinfo->description}}@stop
@section('headlibs')
    <meta name="Copyright" content="东方特许加盟网-{{env('APP_URL')}}"/>
    <meta name="author" content="东方特许加盟网" />
    <meta http-equiv="mobile-agent" content="format=wml; url={{str_replace('http://zhaji.','http://m.zhaji.',config('app.url'))}}{{Request::getrequesturi()}}" />
    <meta http-equiv="mobile-agent" content="format=xhtml; url={{str_replace('http://zhaji.','http://m.zhaji.',config('app.url'))}}{{Request::getrequesturi()}}" />
    <meta http-equiv="mobile-agent" content="format=html5; url={{str_replace('http://zhaji.','http://m.zhaji.',config('app.url'))}}{{Request::getrequesturi()}}" />
    <link rel="alternate" media="only screen and(max-width: 640px)" href="{{str_replace('http://zhaji.','http://m.zhaji.',config('app.url'))}}{{Request::getrequesturi()}}" >
    <link rel="canonical" href="{{env('APP_URL')}}{{Request::getrequesturi()}}"/>
@stop
@section('main_content')
   @include('frontend.position')
<div class="main clearfix">
	<!--左边 开始-->
	<div class="ph_l">
		<p class="tit">炸鸡店品牌排行榜</p>
		<ul>
			<li class="cur"><a target="_self" href="/hanshizhaji">韩式炸鸡</a></li>
			<li><a target="_self" href="/meishizhaji">美式炸鸡</a></li>
			<li><a target="_self" href="/zhongshizhaji">中式炸鸡</a></li>
			<li><a target="_self" href="/taishizhaji">泰式炸鸡</a></li>
			<li><a target="_self" href="/fashizhaji">法式炸鸡</a></li>
		</ul>
	</div>
	<!--左边 结束-->
	
	<!--右边 开始-->
	<div class="ph_r">
		<div class="hd"><em>炸鸡店品牌排行榜</em></div>
		<div class="tip_info">{{$thistypeinfo->description}}</div>
		<div class="bd">

			@foreach($pagelists as $index=>$pagelist)
				<dl>
					<dt>
						<a target="_blank" href="/{{$pagelist->arctype->real_path}}/{{$pagelist->id}}.shtml" title="{{$pagelist->article->brandname}}">
							<img src="{{$pagelist->litpic}}" alt="{{$pagelist->article->brandname}}">
							<em @if($index<4) class="top{{$index+1}}" @endif>{{$index+1}}</em>
						</a>
					</dt>
					<dd>
						<h3><span>投票数:<em class="votenum">{{$pagelist->click}}</em></span><a href="/{{$pagelist->arctype->real_path}}/{{$pagelist->id}}.shtml" title="{{$pagelist->article->brandname}}" target="_blank">{{$pagelist->article->brandname}}</a></h3>
						<p class="desc">{{str_limit($pagelist->description,300,'...')}}</p>
						<a href="javascript:void(0);" class="btn">我要投票</a>
					</dd>
				</dl>
			@endforeach
			
		</div>
		<div class="page">
			{{--{!! preg_replace('/<a href=[\'\"]?([^\'\" ]+).*?>/','<a href="${1}/">',$pagelists->links()) !!}--}}
			{!! $pagelists->links() !!}
		</div>
	</div>
	<!--右边 结束-->
</div>
@stop
