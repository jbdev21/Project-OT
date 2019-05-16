<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClassersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('classers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('class_code', 25);
            $table->integer('course_id')->unsigned();
            $table->string('type');
            $table->integer('user_id')->unsigned();
            $table->integer('total_sessions')->unsigned();
            $table->integer('minutes')->unsigned();
            $table->date('start_date');
            $table->time('time');
            $table->integer('admin_id')->unsigned()->nullable();
            $table->string('status',25);
            $table->integer('credit')->nullable();
            $table->string('payment_method',25)->nulllable();
            $table->integer('payment_price');
            $table->string('payment_status')->default('unpaid');
            $table->integer('book_id')->nullable();
            $table->integer('page')->nullable();
            $table->text('note')->nullable();
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
        Schema::dropIfExists('classers');
    }
}
