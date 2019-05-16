<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('coursetype_id')->unsigned();
            $table->string('course_code');
            $table->integer('days_in_week');
            $table->integer('minutes');
            $table->integer('months');
            $table->integer('postponed_credit');
            $table->integer('price');
            $table->boolean('available')->defaul(1);
            $table->timestamps();
            $table->softDeletes();
             $table->foreign('coursetype_id')->references('id')->on('course_types')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('courses');
    }
}
