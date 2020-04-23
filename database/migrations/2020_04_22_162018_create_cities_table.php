<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tx_cities', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('parent_id')->nullable()->comment('父id');
            $table->bigInteger('country_id')->nullable()->comment('城市所在的国家对应的id');
            $table->string('state',256)->nullable()->comment('省或者州的英文名称,若某国家没有这一个行政级别,则为空');
            $table->string('name',256)->nullable()->comment('城市的标准英文名称');
            $table->string('lower_name',256)->nullable()->comment('对应于英文标准名称的小写，主要用于搜索比较');
            $table->string('cn_state',256)->nullable()->comment('省或者州的中文名称,若某国家没有这一个行政级别');
            $table->string('cn_name',256)->nullable()->comment('城市的标准中文名称');
            $table->string('state_code',64)->nullable()->comment('省或者州代码(一般表示缩写),若某个国家没有州或省这个行政级别，则为空');
            $table->string('city_code',64)->nullable()->comment('省或者州代码(一般表示缩写),若某个国家没有州或省这个行政级别，则为空');
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
        Schema::dropIfExists('tx_cities');
    }
}
