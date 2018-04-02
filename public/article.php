<?php

require '../vendor/autoload.php';
use Carbon\Carbon;
class article{

public function articles()
{
    $sourceArray=[];
    $mysqli = new mysqli("localhost", "root", "", "kangjie");
    if ($mysqli->connect_errno) {
        printf("Connect failed: %s\n", $mysqli->connect_error);
        exit();
    }
    $mysqli->set_charset("utf8");
    $result = $mysqli->query("SELECT url,result FROM dede_co_htmls  WHERE result <> ''");
    $i=0;
    while ($row=$result->fetch_assoc())
    {
        $sourceArray[$i]['id']=str_replace('http://news.4006666688.com/detail/','',$row['url']);
        $sourceArray[$i]['title']=preg_match("#\{dede:field name=\'title\'\}([\s\S]*){dede:field name='writer'}#",$row['result'],$match);
        $sourceArray[$i]['title']=str_replace(PHP_EOL,'',str_replace('{/dede:field}','',$match[1]));
        $sourceArray[$i]['keywords']=str_replace(PHP_EOL,'',str_replace('{/dede:field}','',$match[1]));
        $sourceArray[$i]['body']=preg_match("#\{dede:field name=\'body\'\}([\s\S]*){dede:field name='litpic'}#",$row['result'],$match);
        $sourceArray[$i]['body']=str_replace(PHP_EOL,'',str_replace('{/dede:field}','',$match[1]));
        preg_match("#\{dede:field name=\'pubdate\'\}([\s\S]*){dede:field name='body'}#",$row['result'],$match);
        $sourceArray[$i]['created_at']=str_replace('{/dede:field}','',$match[1]);
        $sourceArray[$i]['created_at']=str_replace(PHP_EOL,'',$sourceArray[$i]['created_at']);
        $sourceArray[$i]['created_at']=str_replace('年','-',$sourceArray[$i]['created_at']);
        $sourceArray[$i]['created_at']=str_replace('月','-',$sourceArray[$i]['created_at']);
        $sourceArray[$i]['created_at']=str_replace('日','-',$sourceArray[$i]['created_at']);
        $sourceArray[$i]['created_at']=strtotime(str_replace(' ','',$sourceArray[$i]['created_at']));
        //echo Carbon::createFromTimestamp($sourceArray[$i]['created_at'],'PRC');
        $sourceArray[$i]['created_at']=Carbon::createFromTimestamp($sourceArray[$i]['created_at'],'PRC');
        $sourceArray[$i]['updated_at']=$sourceArray[$i]['created_at'];
        $sourceArray[$i]['published_at']=$sourceArray[$i]['created_at'];
        $sourceArray[$i]['typeid']=32;
        $sourceArray[$i]['ismake']=1;
        $sourceArray[$i]['click']=rand(500,2000);
        $sourceArray[$i]['shorttitle']=$sourceArray[$i]['title'];
        $sourceArray[$i]['tags']=$sourceArray[$i]['title'];
        $sourceArray[$i]['mid']=0;
        $sourceArray[$i]['write']='梁李良';
        $sourceArray[$i]['dutyadmin']=1;

        //print_r( $sourceArray);
        //exit();
        $i++;
    }
    //print_r($sourceArray);
    $mysqli->close();
    $mysqli = new mysqli("localhost", "root", "", "dfjmw");
    if ($mysqli->connect_errno) {
        printf("Connect failed: %s\n", $mysqli->connect_error);
        exit();
    }
    $mysqli->set_charset("utf8");
    for ($j=0;$j<count($sourceArray);$j++)
    {
        $archivesSql="INSERT INTO zhaji_archives (id,typeid,ismake,click,title,shorttitle,mid,keywords,`write`,dutyadmin,published_at,created_at,updated_at) VALUE (
          {$sourceArray[$j]['id']},
          {$sourceArray[$j]['typeid']},
          {$sourceArray[$j]['ismake']},
          {$sourceArray[$j]['click']},
          '{$sourceArray[$j]['title']}',
          '{$sourceArray[$j]['shorttitle']}',
          {$sourceArray[$j]['mid']},
          '{$sourceArray[$j]['keywords']}',
          '{$sourceArray[$j]['write']}',
          {$sourceArray[$j]['dutyadmin']},
          '{$sourceArray[$j]['published_at']}',
          '{$sourceArray[$j]['created_at']}',
          '{$sourceArray[$j]['updated_at']}'
);";
        //echo $archivesSql;

        $addonarticleSql="INSERT INTO zhaji_addonarticles (id,typeid,body,created_at,updated_at) VALUE (
      {$sourceArray[$j]['id']},
      {$sourceArray[$j]['typeid']},
      '{$sourceArray[$j]['body']}',
      '{$sourceArray[$j]['created_at']}',
      '{$sourceArray[$j]['updated_at']}'
);";
        echo $archivesSql.'<br/>';
        $mysqli->query($archivesSql);
        $mysqli->query($addonarticleSql);
    }
    $mysqli->close();
}

}
$articles=new article();
$articles->articles();