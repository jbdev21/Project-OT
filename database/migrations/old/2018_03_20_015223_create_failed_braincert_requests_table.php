<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFailedBraincertRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('failed_braincert_requests', function (Blueprint $table) {
            $table->increments('id');
            $table->text('message');
            $table->string('task');
            $table->boolean('seen')->default(0);
            $table->string('failedbraincertable_type_id');
            $table->string('failedbraincertable_type_type');
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
        Schema::dropIfExists('failed_braincert_requests');
    }
}
