<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('korean_name');
            $table->string('username');
            $table->string('contact_number', 25);
            $table->string('contact_number1', 25)->nullable();
            $table->date('dob');
            $table->string('gender', 15);
            $table->string('remarks', 25)->nullable();
            $table->string('email')->unique();
            $table->string('password');
            $table->boolean('is_leveltest')->default(0);
            $table->text('image')->nullable();
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
            $table->boolean('is_deleted')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
