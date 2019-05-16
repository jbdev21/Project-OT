<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMistakesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mistakes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('class_session_id')->unsigned();
            $table->text('mistake_body');
            $table->text('correction');
            $table->timestamps();

            $table->foreign('class_session_id')->references('id')->on('class_sessions')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mistakes');
    }
}
