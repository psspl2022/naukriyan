<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConsultantJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('consultant_jobs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('consultant_id')->unsigned()->nullable();
            $table->integer('jobmanager_id')->unsigned()->nullable();
            $table->enum('status', ['accept', 'reject']);
            $table->timestamps();

            $table->foreign('consultant_id')->references('id')->on('consultants');
            $table->foreign('jobmanager_id')->references('id')->on('jobmanagers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('consultant_jobs');
    }
}
