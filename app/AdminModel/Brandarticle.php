<?php

namespace App\AdminModel;

use Illuminate\Database\Eloquent\Model;

class Brandarticle extends Model
{
    protected $fillable=[
        'typeid',
        'ismake',
        'click',
        'title',
        'shorttitle',
        'flags',
        'tags',
        'country',
        'mid',
        'keywords',
        'description',
        'write',
        'litpic',
        'dutyadmin',
        'published_at',
        'body',
        'redirect',
        'imagepics',
        'bdxg_search',
        'brandname',
        'brandtime',
        'brandorigin',
        'brandnum',
        'brandpay',
        'brandarea',
        'brandmap',
        'brandperson',
        'brandattch',
        'brandapply',
        'brandchat',
        'brandgroup',
        'brandaddr',
        'brandduty',
        'acreage',
        'genre',
        'licenseno',
        'registeredcapital',
        'decorationpay',
        'quartersrent',
        'equipmentcost',
        'workingcapital',
        'laborquarter',
        'miscellaneous',
        'dailyvolume',
        'unitprice',
        'watercoal',
        'ppjstitle',
        'jmxqtitle',
        'jmystitle',
        'jmlctitle',
        'jmzctitle',
        'jmasktitle',
        'jmxq_content',
        'jmys_content',
        'jmlc_content',
        'jmzc_content',
        'jmask_content',
        'brandmoshi','branduser','brandphone','brandurl','brandemail'
    ];
    public function arctype()
    {
        return $this->belongsTo('App\AdminModel\Arctype','typeid');
    }
}
