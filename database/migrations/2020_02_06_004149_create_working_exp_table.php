<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorkingExpTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('experience', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('position')->default('my postiion')->nullable();   //set default for test
            $table->string('company')->nullable();
            $table->date('startTime')->nullable();
            $table->date('endTime')->nullable();
            $table->boolean('Position_status')->default('0')->nullable();
            $table->text('duty')->nullable();
            $table->integer('user_id')->index();
            $table->index(['created_at']);
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
        Schema::dropIfExists('experience');
    }
}
