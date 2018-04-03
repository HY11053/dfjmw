<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumsToBrandarticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('brandarticles', function (Blueprint $table) {
            $table->string('brandmoshi')->nullable();//经营模式
            $table->string('branduser')->nullable();//联系人
            $table->string('brandphone')->nullable();//联系电话
            $table->string('brandurl')->nullable();//公司网址
            $table->string('brandemail')->nullable();//公司邮箱
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('brandarticles', function (Blueprint $table) {

            $table->dropColumn(['brandmoshi','branduser','brandphone','brandurl','brandemail']);
        });
    }
}
