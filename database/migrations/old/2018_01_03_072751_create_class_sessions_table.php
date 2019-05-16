<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClassSessionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('class_sessions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('classer_id')->unsigned();
            $table->datetime('date_time');
            $table->string('status', 25);
            $table->integer('postponed_deduction')->nullable();
            $table->text('reason')->nullable();
            $table->timestamp('postponed_timestamp')->nullable();
            $table->string('postponed_apply')->nullable();
            $table->text('comment')->nullable();
            $table->integer('admin_id')->nullable();
            $table->integer('comprehension')->nullable();
            $table->integer('pronounciation')->nullable();
            $table->integer('fluency')->nullable();
            $table->integer('vocabulary')->nullable();
            $table->integer('grammar')->nullable();
            $table->integer('sub_id')->unsigned()->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('class_sessions');
    }
}
