<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePopUpsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pop_ups', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->text('description');
            $table->string('position');
            $table->string('title_color');
            $table->string('text_color');
            $table->string('background_color');
            $table->string('button_text')->nullable();
            $table->text('button_link')->nullable();
            $table->text('button_text_color')->nullable();
            $table->text('button_color')->nullable();
            $table->date('date_start');
            $table->date('date_end')->nullable();
            $table->boolean('show');
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
        Schema::dropIfExists('pop_ups');
    }
}
