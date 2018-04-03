<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use QL\QueryList;

class QuerylistHtmlController extends Controller
{
    public function getQueryListHtml()
    {
        $urls=explode(PHP_EOL,Storage::get('brand.txt'));
        //dd($urls);
        //采集某页面所有的图片
        //$data = QueryList::get('http://cms.querylist.cc/bizhi/453.html')->find('img')->attrs('src');
        //采集某页面所有的超链接和超链接文本内容
        //可以先手动获取要采集的页面源码
        for ($i=0;$i<count($urls);$i++)
        {
            $html = file_get_contents($urls[$i]);
            //然后可以把页面源码或者HTML片段传给QueryList
            $imagepic=[];
            /**$data = QueryList::html($html)->rules([  //设置采集规则
                // 采集所有a标签的href属性
                'title' => ['title','text'],
                'litpic'=>['div.join_main.left > div.join_cond1 > dl.join_t1 > dt > img','src'],
                'brandmoshi'=>['div.join_main.left > div.join_cond1 > dl.join_t1 > dd:nth-child(2)','text'],//行业
                'brandpay'=>['div.join_main.left > div.join_cond1 > dl.join_t1 > dd:nth-child(3)','text'],//投资
                'genre'=>['div.join_main.left > div.join_cond1 > dl.join_t1 > dd:nth-child(4)','text'],//经营模式
                'brandarea'=>['div.join_main.left > div.join_cond1 > dl.join_t1 > dd:nth-child(5)','text'],//加盟区域
                'brandmap'=>['div.join_main.left > div.join_cond1 > dl.join_t1 > dd:nth-child(6)','text'],//经营产品
                'tags'=>['div.join_main.left > div.join_cond1 > dl.join_t1 > dd:nth-child(7)','text'],//品牌标签
                'brandgroup'=>['div.join_main.left > div.join_cond1 > dl.join_t1 > dd:nth-child(8)','text'],//公司名称
                'branduser'=>['#joinus > table  > tr > td:nth-child(2) > ul > li:nth-child(1)','text'],//联系人
                'brandphone'=>['#joinus > table > tr > td:nth-child(2) > ul > li:nth-child(2)','text'],//电话
                'brandurl'=>['#joinus > table >  tr > td:nth-child(2) > ul > li:nth-child(3)','text'],//网址
                'brandemail'=>['#joinus > table >  tr > td:nth-child(2) > ul > li:nth-child(4)','text'],//邮箱
                'brandaddr'=>['#joinus > table >  tr > td:nth-child(2) > ul > li:nth-child(5)','text'],//店址
                'imagepics1'=>['div.join_main.left > div.join_cond2 > dl > dd:nth-child(2) > img','src'],//图集
                'imagepics2'=>['div.join_main.left > div.join_cond2 > dl > dd:nth-child(3) > img','src'],//图集
                'imagepics3'=>['div.join_main.left > div.join_cond2 > dl > dd:nth-child(4) > img','src'],//图集
                'body'=>['div.join_main.left > div:nth-child(6)','html'],//加盟费用明细
                'jmzc_content'=>['div.join_main.left > div:nth-child(8)','html'],//加盟条件
                'jmxq_content'=>['div.join_main.left > div:nth-child(10)','html'],//加盟详情
            ])->query()->getData();
             * **/
            echo ($urls[$i].'<br/>');

        }

    }
    public function curl404()
    {
        $urls=explode(PHP_EOL,Storage::get('brand.txt'));
        for ($i=0;$i<count($urls);$i++)
        {
            $ch = curl_init ();
            curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,false);//跳过证书检查
            curl_setopt($ch,CURLOPT_SSL_VERIFYHOST,false);//从证书中检查SSL加密算法是否存在
            curl_setopt($ch, CURLOPT_URL, $urls[$i]);
            curl_setopt($ch, CURLOPT_TIMEOUT, 200);
            curl_setopt($ch, CURLOPT_HEADER, FALSE);
            curl_setopt($ch, CURLOPT_NOBODY, FALSE);
#curl_setopt( $ch, CURLOPT_POSTFIELDS, "username=".$username."&password=".$password );
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, FALSE);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
            curl_exec($ch);
            $httpCode = curl_getinfo($ch,CURLINFO_HTTP_CODE);
            if ($httpCode!=404)
            {
                Storage::append('201.txt', $urls[$i]);
            }else{
                echo ($urls[$i].'<br/>');
            }
            curl_close($ch);
        }

    }
}
