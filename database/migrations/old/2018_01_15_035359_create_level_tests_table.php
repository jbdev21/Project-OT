<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLevelTestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('level_tests', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('admin_id')->unsigned()->nullable();
            $table->string('name', 191);
            $table->string('korean_name', 191);
            $table->string('mobile', 191);
            $table->string('type')->default('Video');
            $table->date('date');
            $table->string('time');

            $table->integer('book_id')->unsigned()->nullable();

            $table->integer('comprehension')->nullable();
            $table->text('comprehension_comment')->nullable();
            
            $table->integer('pronounciation')->nullable();
            $table->text('pronounciation_comment')->nullable();

            $table->integer('fluency')->nullable();
            $table->text('fluency_comment')->nullable();

            $table->integer('vocabulary')->nullable();
            $table->text('vocabulary_comment')->nullable();

            $table->integer('grammar')->nullable();
            $table->text('grammar_comment')->nullable();

            $table->text('comment')->nullable();
            $table->integer('rate')->nullable();
            
            $table->boolean('is_done')->default(0);
            $table->text('status')->default('ready');

            $table->text('age_group')->nullable();
            $table->text('self_assesment')->nullable();

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
        Schema::dropIfExists('level_tests');
    }
}
