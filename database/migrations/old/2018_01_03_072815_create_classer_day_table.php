<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClasserDayTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('classer_day', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('classer_id')->unsigned();
            $table->integer('day_id')->unsigned();
            $table->timestamps();

            $table->foreign('classer_id')->references('id')->on('classers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('classer_days');
    }
}
