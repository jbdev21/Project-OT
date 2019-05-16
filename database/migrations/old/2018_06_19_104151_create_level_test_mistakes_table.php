<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLevelTestMistakesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('level_test_mistakes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('level_test_id')->unsigned();
            $table->integer('admin_id')->unsigned();
            $table->text('mistake');
            $table->text('correction');
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
        Schema::dropIfExists('level_test_mistakes');
    }
}
