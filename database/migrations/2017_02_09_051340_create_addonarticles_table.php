<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAddonarticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('addonarticles', function (Blueprint $table) {
            $table->increments('id')->unique();
            $table->integer('typeid');
            $table->text('body')->nullable();
            $table->string('redirect')->nullable();//跳转链接
            $table->string('brandname')->nullable();//品牌名称
            $table->string('brandtime')->nullable();//成立时间
            $table->string('brandorigin')->nullable();//品牌发源地
            $table->string('brandnum')->nullable();//门店总数
            $table->string('brandpay')->nullable();//加盟费用
            $table->string('brandarea')->nullable();//加盟区域
            $table->string('brandmap')->nullable();//经营范围
            $table->string('brandperson')->nullable();//加盟人群
            $table->string('brandattch')->nullable();//加盟意向人数
            $table->string('brandapply')->nullable();//申请加盟人数
            $table->string('brandchat')->nullable();//项目咨询人数
            $table->string('brandgroup')->nullable();//公司名称
            $table->string('brandaddr')->nullable();//公司地址
            $table->string('brandduty')->nullable();//区域授权
            $table->mediumText('imagepics')->nullable();//品牌图集
            $table->string('acreage')->nullable();//所需面积
            $table->string('genre')->nullable();//公司性质
            $table->string('licenseno')->nullable();//特许加盟许可证号
            $table->string('registeredcapital')->nullable();//注册资金
            $table->integer('decorationpay')->default(0);//装修费用
            $table->integer('quartersrent')->default(0);//前两季度房租
            $table->integer('equipmentcost')->default(0);//铺货设备费用
            $table->integer('workingcapital')->default(0);
            $table->integer('laborquarter')->default(0);
            $table->integer('miscellaneous')->default(0);
            $table->integer('dailyvolume')->default(0);
            $table->integer('unitprice')->default(0);
            $table->integer('watercoal')->default(0);
            $table->string('bdxg_search')->nullable();
            $table->string('ppjstitle')->nullable();//品牌介绍标题
            $table->string('jmxqtitle')->nullable();//加盟详情标题
            $table->string('jmystitle')->nullable();//加盟优势标题
            $table->string('jmlctitle')->nullable();//加盟流程标题
            $table->string('jmzctitle')->nullable();//加盟政策标题
            $table->string('jmasktitle')->nullable();//加盟问答标题
            $table->mediumText('jmxq_content')->nullable();//加盟详情内容
            $table->mediumText('jmys_content')->nullable();//加盟优势内容
            $table->mediumText('jmlc_content')->nullable();//加盟流程内容
            $table->mediumText('jmzc_content')->nullable();//开店要求内容
            $table->mediumText('jmask_content')->nullable();//开店问答内容
            $table->timestamps();
            $table->index('typeid');
            $table->index('created_at');
            $table->index('brandname');
            $table->index('brandnum');
            $table->index('brandpay');
            $table->index('brandattch');
            $table->index('brandapply');
            $table->index('brandchat');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('addonarticles');
    }
}
