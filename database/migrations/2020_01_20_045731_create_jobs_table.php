<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id')->index()->nullable(); //who post this job
            $table->string('title');
            $table->string('classification')->nullable();
            $table->string('type')->nullable();
            $table->string('company logo')->nullable();
            $table->string('company name')->nullable();
            $table->string('city or suburb')->nullable();
            $table->string('location')->nullable();   //location
            $table->string('salary')->nullable(); //salary
            $table->string('description')->nullable(); //desscription
            $table->date('closing date')->nullable(); //closing date
            $table->integer('company size')->nullable(); //use integer
            $table->text('content')->nullable();
            $table->index(['created_at'])->nullable(); //creating time
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
        Schema::dropIfExists('jobs');
    }
}
