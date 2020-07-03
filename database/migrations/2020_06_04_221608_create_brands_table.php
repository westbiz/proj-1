<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBrandsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tx_brands', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('cname', 100)->comment('中文名称');
            // 丰田、标致、雪佛兰|座位数|
            $table->string('ename', 100)->nullable()->comment('英文名称');
            $table->string('symbol', 255)->nullable()->comment('标志图片');
            $table->text('describtion')->nullable()->comment('描述');
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
        Schema::dropIfExists('tx_brands');
    }
}
