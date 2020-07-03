<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVehiclesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tx_vehicles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 100)->comment('名称');
            $table->string('symbol', 255)->nullable()->comment('标志图片');
            $table->string('remark', 100)->nullable()->comment('简介');
            // 大巴26-57、中巴14-22、小型巴士9-12、小客车5-7
            $table->tinyInteger('active')->default(0)->comment('激活');
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
        Schema::dropIfExists('tx_vehicles');
    }
}
