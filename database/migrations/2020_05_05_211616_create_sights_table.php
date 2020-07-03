<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSightsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tx_sights', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('parent_id')->default(0)->nullable()->comment('父_id');
            $table->integer('city_id')->nullable()->comment('城市');
            $table->string('cn_name',100)->nullable()->comment('名称');
            $table->string('en_name',100)->nullable()->comment('英文'); 
            $table->string('full_cname',100)->nullable()->comment('名称');
            $table->string('phone')->nullable()->comment('电话');
            $table->string('address',200)->nullable()->comment('地址');
            $table->string('zipcode',10)->nullable()->comment('邮编');
            $table->text('description')->nullable()->comment('简介');
            $table->tinyInteger('active')->default(0)->nullable()->comment('激活：默认0-关闭, 1-审核, 2-激活, ');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tx_sights');
    }
}
