<?php

namespace App\AdminModel;

use Illuminate\Database\Eloquent\Model;

class Addonarticle extends Model
{
    //,
    protected $fillable=[
        'id',
        'typeid',
        'body',
        'redirect',
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
        'imagepics',
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
        'bdxg_search',
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
    ];
    public function archive(){
        return $this->belongsTo('App\AdminModel\Archive', 'id');
    }
    public function arctype()
    {
        return $this->belongsTo('App\AdminModel\Arctype','typeid');
    }
}

