<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableMembers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('members', function (Blueprint $table) {
            $table->increments('id');
            $table->string('identify_id')->unique()->comment('识别ID');
            $table->unsignedInteger('application_id')->nullable()->comment('所属项目');

            // 用户基本信息
            $table->string('mobile')->nullable()->unique()->comment('手机号');
            $table->string('email')->nullable()->unique()->comment('邮箱');
            $table->string('name')->nullable()->comment('姓名');
            $table->string('birth_year')->nullable()->comment('出生年份');
            $table->tinyInteger('gender')->nullable()->comment('性别 1男 0女 2未知');
            $table->string('user_type')->nullable()->comment('用户类型');
            $table->string('province')->nullable()->comment('省');// TODO 省市名称需统一
            $table->string('city')->nullable()->comment('市');
            $table->string('area')->nullable()->comment('区');
            // 注册渠道分析
            $table->timestamp('signup_time')->nullable()->comment('注册时间');
            $table->string('register_channel')->nullable()->comment('注册渠道');
            $table->string('utm_medium')->nullable()->comment('广告系列媒介');
            $table->string('utm_source')->nullable()->comment('广告系列来源');
            $table->string('first_referrer')->nullable()->comment('首次前向地址');
            $table->string('first_referrer_host')->nullable()->comment('首次前向域名');
            $table->timestamp('first_visit_time')->nullable()->comment('首次访问时间');
            $table->timestamp('first_source')->nullable()->comment('首次访问来源');

            $table->timestamps();
            $table->softDeletes();

            $table->foreign('application_id')->references('id')->on('applications');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('members', function (Blueprint $table) {
            $table->dropForeign('members_application_id_foreign');
        });
        Schema::dropIfExists('members');
    }
}
