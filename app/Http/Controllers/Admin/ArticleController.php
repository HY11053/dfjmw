<?php

namespace App\Http\Controllers\Admin;

use App\AdminModel\Addonarticle;
use App\AdminModel\Archive;
use App\AdminModel\Arctype;
use App\AdminModel\Brandarticle;
use App\Events\SitemapEvent;
use App\Http\Requests\CreateArticleRequest;
use App\Helpers\UploadImages;
use App\Http\Requests\ImagesUploadRequest;
use App\Notifications\ArticlePublishedNofication;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Log;

class ArticleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth.admin:admin');
    }

    /**文档列表
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    function Index()
    {
        //$articles = Archive::where('published_at','<=',Carbon::now())->latest()->paginate(30);
        $articles = Archive::orderBy('id','desc')->paginate(30);
        return view('admin.article',compact('articles'));
    }

    /**普通文档创建
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    function Create()
    {
        $allnavinfos=Arctype::where('is_write',1)->pluck('typename','id');
        return view('admin.article_create',compact('allnavinfos'));
    }

    /**品牌文档创建
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    function BrandCreate()
    {
        $allnavinfos=Arctype::where('is_write',1)->pluck('typename','id');
        return view('admin.article_brandcreate',compact('allnavinfos'));
    }

    /**文档创建提交数据处理
     * @param CreateArticleRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    function PostCreate(CreateArticleRequest $request)
    {
        if(isset($request['flags']))
        {
            $request['flags']=UploadImages::Flags($request['flags']);
        }else{
            $request['flags']='';
        }
        if($request['image'])
        {
            $request['litpic']=UploadImages::UploadImage($request);
            if(empty($request['flags']))
            {
                $request['flags'].='p';
            }else{
                $request['flags'].=',p';
            }
        }elseif (preg_match('/<[img|IMG].*?src=[\' | \"](.*?(?:[\.jpg|\.jpeg|\.png|\.gif|\.bmp]))[\'|\"].*?[\/]?>/i',$request['body'],$match)){
            $request['litpic']=$match[1];
            if(empty($request['flags']))
            {
                $request['flags'].='p';
            }else{
                $request['flags'].=',p';
            }
        }else{
            $request['litpic']='';
        }
       $request['keywords']=$request['keywords']?$request['keywords']:$request['title'];
        $request['click']=rand(100,900);
        $request['description']=(!empty($request['description']))?$request['description']:str_limit(trim(str_replace(' ','',str_replace('&nbsp;','',mb_ereg_replace('^(　| )+','', preg_replace('/\r|\n/', '', trim(strip_tags(htmlspecialchars_decode($request['body'])))))))), $limit = 180, $end = '');
        $request['write']=auth('admin')->user()->name;
        $request['dutyadmin']=auth('admin')->id();
        //图片alt信息及title替换
        $request['body']=$this->ImageInformation($request->input('body'),$request->input('shorttitle')?$request->input('shorttitle'):$request->input('brandname'),$request->input('title'));
      //不同文档类型分类入库
        if (!$request->input('mid'))
        {
            Archive::create($request->all());
            $request['id']=Archive::max('id');
            Addonarticle::create($request->all());
            //百度主动推送
            $thisarticle=Archive::where('id',Archive::max('id'))->find(Archive::max('id'));
            $thisarticleurl='http://zhaji.5988.com'.'/'.$thisarticle->arctype->real_path.'/'.$thisarticle->id.'.shtml';
            $miparticleurl='http://mip.zhaji.5988.com'.'/'.$thisarticle->arctype->real_path.'/'.$thisarticle->id.'.shtml';
            $token=config('app.api', '');
            $mip_api=config('app.mip_api', '');
            if($thisarticle->created_at>Carbon::now()){
                return redirect(action('Admin\ArticleController@Index'));
            }else{
                //$this->BaiduCurl($thisarticleurl,$token,'');
                //$this->BaiduCurl($miparticleurl,$mip_api,'');
                //event(new SitemapEvent());
                return redirect(action('Admin\ArticleController@Index'));
            }
        }else{
            $request['jmxq_content']=$this->ImageInformation($request->input('jmxq_content'),$request->input('shorttitle')?$request->input('shorttitle'):$request->input('brandname'),$request->input('title'));
            $request['jmys_content']=$this->ImageInformation($request->input('jmys_content'),$request->input('shorttitle')?$request->input('shorttitle'):$request->input('brandname'),$request->input('title'));
            $request['jmask_content']=$this->ImageInformation($request->input('jmask_content'),$request->input('shorttitle')?$request->input('shorttitle'):$request->input('brandname'),$request->input('title'));
            $request['jmlc_content']=$this->ImageInformation($request->input('jmlc_content'),$request->input('shorttitle')?$request->input('shorttitle'):$request->input('brandname'),$request->input('title'));
            $request['jmzc_content']=$this->ImageInformation($request->input('jmzc_content'),$request->input('shorttitle')?$request->input('shorttitle'):$request->input('brandname'),$request->input('title'));
            Brandarticle::create($request->all());
            return redirect(action('Admin\ArticleController@Brands'));
        }
        auth('admin')->user()->notify(new ArticlePublishedNofication(Archive::latest() ->first()));


    }

    /**普通文档文档编辑
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    function Edit($id)
    {
        $allnavinfos=Arctype::where('is_write',1)->pluck('typename','id');
        $pics=explode(',',Addonarticle::where('id',$id)->value('imagepics'));
        //$articleinfos=Archive::find($id);
        $articleinfos=DB::table('archives')->join('addonarticles','archives.id','=','addonarticles.id')->where('addonarticles.id','=',$id)->first();
        return view('admin.article_edit',compact('id','articleinfos','allnavinfos','pics'));
    }
    public function BrandEdit($id)
    {
        $allnavinfos=Arctype::where('is_write',1)->pluck('typename','id');
        $pics=explode(',',Addonarticle::where('id',$id)->value('imagepics'));
        $articleinfos=Brandarticle::where('id',$id)->first();
        return view('admin.article_brandedit',compact('id','articleinfos','allnavinfos','pics'));

    }

    /**文档编辑提交处理
     * @param CreateArticleRequest $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    function PostEdit(CreateArticleRequest $request,$id)
    {
        if(isset($request['flags']))
        {
            $request['flags']=UploadImages::Flags($request['flags']);
        }else{
            $request['flags']='';
        }
        if($request['image'])
        {
            $request['litpic']=UploadImages::UploadImage($request);
            if(empty($request['flags'])){
                $request['flags'].='p';
            }else{
                $request['flags'].=',p';
            }
        }elseif (preg_match('/<[img|IMG].*?src=[\' | \"](.*?(?:[\.jpg|\.jpeg|\.png|\.gif|\.bmp]))[\'|\"].*?[\/]?>/i',$request['body'],$match)){
            $request['litpic']=$match[1];
            if(empty($request['flags']))
            {
                $request['flags'].='p';
            }else{
                $request['flags'].=',p';
            }

        }else{
            $request['litpic']='';
        }
        //$request['description']=(!empty($request['description']))?$request['description']:str_limit(mb_ereg_replace('^(　| )+','', preg_replace('/\r|\n/', '', trim(strip_tags(htmlspecialchars_decode($request['body']))))), $limit = 180, $end = '');
        //dd($request->all());
        $request['description']=str_limit(str_replace(' ','',str_replace('&nbsp;','',mb_ereg_replace('^(　| )+','', preg_replace('/\r|\n/', '', trim(strip_tags(htmlspecialchars_decode($request['description']))))))), $limit = 180, $end = '');
        if (empty($request['imagepics']))
        {
            $request['imagepics']=' ';
        }

        $request['body']=$this->ImageInformation($request->input('body'),$request->input('shorttitle')?$request->input('shorttitle'):$request->input('brandname'),$request->input('title'));
        //$flags=array_unique(explode(',',Archive::where('id',$id)->value('flags')));
        //$request['flags']=implode(',',$flags);
        if (!$request->input('mid'))
        {
            Archive::findOrFail($id)->update($request->all());
            Addonarticle::findOrFail($id)->update($request->all());
            return redirect(action('Admin\ArticleController@Index'));
        }else{
            $request['jmxq_content']=$this->ImageInformation($request->input('jmxq_content'),$request->input('shorttitle')?$request->input('shorttitle'):$request->input('brandname'),$request->input('title'));
            $request['jmys_content']=$this->ImageInformation($request->input('jmys_content'),$request->input('shorttitle')?$request->input('shorttitle'):$request->input('brandname'),$request->input('title'));
            $request['jmask_content']=$this->ImageInformation($request->input('jmask_content'),$request->input('shorttitle')?$request->input('shorttitle'):$request->input('brandname'),$request->input('title'));
            $request['jmlc_content']=$this->ImageInformation($request->input('jmlc_content'),$request->input('shorttitle')?$request->input('shorttitle'):$request->input('brandname'),$request->input('title'));
            $request['jmzc_content']=$this->ImageInformation($request->input('jmzc_content'),$request->input('shorttitle')?$request->input('shorttitle'):$request->input('brandname'),$request->input('title'));
            Brandarticle::findOrFail($id)->update($request->all());
            return redirect(action('Admin\ArticleController@Brands'));
        }

    }

    /**当前用户发布的文档
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    function OwnerShip()
    {
        $articles = Archive::where('dutyadmin',auth('admin')->user()->id)->latest()->paginate(30);
        return view('admin.article',compact('articles'));
    }

    /**等待审核的文档
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    function PendingAudit()
    {
        $articles = Archive::where('ismake','<>',1)->latest()->paginate(30);
        return view('admin.article',compact('articles'));
    }

    /**等待发布的文档
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    function PedingPublished(){
        $articles = Archive::where('published_at','>',Carbon::now())->latest()->paginate(30);
        return view('admin.article',compact('articles'));
    }

    /**文档预览
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    function PreViewArticle($id){
        $articleinfos=DB::table('addonarticles')->join('arctypes','addonarticles.typeid','=','arctypes.id')->join('archives','addonarticles.id','=','archives.id')->where('addonarticles.id','=',$id)->first();
        return view('admin.article_preview',compact('articleinfos'));
    }

    /**文档删除
     * @param $id
     * @return string
     */
    function DeleteArticle($id)
    {
        if(auth('admin')->user()->id)
        {
            Archive::where('id',$id)->delete();
            Addonarticle::where('id',$id)->delete();
            return '删除成功';
        }else{
            return '无权限执行此操作！';
        }


    }

    /**文档搜索
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    function PostArticleSearch(Request $request)
    {
        $articles=Archive::where('title','like','%'.$request->input('title').'%')->latest()->paginate(30);
        return view('admin.article',compact('articles'));
    }

    /**图集上传处理
     * @param ImagesUploadRequest $request
     */
    function UploadImages(ImagesUploadRequest $request){
        UploadImages::UploadImage($request);
    }

    /**品牌文档查看
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    function Brands()
    {
        $articles=Brandarticle::where('mid',1)->latest()->paginate(30);
        return view('admin.brandarticle',compact('articles'));
    }

    /** 栏目文章查看
     * @param Request $request
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    function Type(Request $request,$id)
    {
        $articles=Archive::where('typeid',$id)->latest()->paginate(30);
        return view('admin.article',compact('articles'));
    }

    /**文章图片信息修改
     * @param $content
     * @param $title
     * @param $fulltitle
     * @return mixed
     */
    function ImageInformation($content,$title,$fulltitle)
    {
        preg_match('/<img.+(title=\".*?\").+>/i',$content,$match);
        if (empty($match))
        {
            return $content;
        }
        preg_match('/<img.+(alt=\".*?\").+>/i',$content,$match2);
        //dd($match2);
        if (empty($match2))
        {
            return $content;
        }

        $patterns=array();
        $replacement=array();
        $patterns[0]=$match[1];
        $patterns[1]=$match2[1];
        $title=empty($title)?$fulltitle:$title;
        $replacement[0]='title="'.$title.'"';
        $replacement[1]='alt="'.$title.'"';
        //dd($patterns[0]);
        $content=str_replace($patterns[0],$replacement[0],$content);
        $content=str_replace($patterns[1],$replacement[1],$content);
        return $content;
    }

    /**百度主动推送
     * @param $thisarticleurl
     * @param $token
     * @param $type
     */
    private function BaiduCurl($thisarticleurl,$token,$type)
    {
        $urls = array(
            $thisarticleurl
        );
        $ch = curl_init();
        $options =  array(
            CURLOPT_URL =>$token,
            CURLOPT_POST => true,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POSTFIELDS => implode("\n", $urls),
            CURLOPT_HTTPHEADER => array('Content-Type: text/plain'),
        );
        curl_setopt_array($ch, $options);
        $result = curl_exec($ch);
        Log::info($thisarticleurl.$type);
        Log::info($result);
    }

}
