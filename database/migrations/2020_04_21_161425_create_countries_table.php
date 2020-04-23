<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCountriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tx_countries', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('continent_id')->nullable()->comment('对应大陆continent表的id');
            $table->string('name',256)->nullable()->comment('英文常用标准名称，主要用于显示');
            $table->string('lower_name',256)->nullable()->comment('对应于英文标准名称的小写，主要用于搜索比较');
            $table->string('country_code',64)->nullable()->comment('英文缩写名称，全大写');
            $table->string('full_name',256)->nullable()->comment('英文标准名称全称');
            $table->string('cname',256)->nullable()->comment('中文常用标准名称，通常简称');
            $table->string('full_cname',256)->nullable()->comment('中文全称名称，非缩写');
            $table->text('remark')->nullable()->comment('备注字段，保留');
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
        Schema::dropIfExists('tx_countries');
    }
}
