<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBraincertSchedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('braincert_schedules', function (Blueprint $table) {
            $table->increments('id');
           // $table->integer('class_session_id')->unsigned();
            $table->string('braincert_class_id')->nullable();
            $table->timestamps();

            $table->integer('braincertable_id')->unsigned();    
            $table->string('braincertable_type');    

            //$table->foreign('class_session_id')->references('id')->on('class_sessions')->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('braincert_schedules');
    }
}
