<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSightTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tx_sight_types', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('sight_id')->unsigned()->default(0);
            $table->integer('type_id')->unsigned()->default(0);
            $table->unique(['sight_id', 'type_id']);
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
        Schema::dropIfExists('tx_sight_types');
    }
}
