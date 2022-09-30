<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConsultantCandidatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('consultant_candidates', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedBigInteger('consultant_id')->nullable();
            $table->unsignedBigInteger('jobmanager_id')->nullable();
            $table->string('name');
            $table->string('email');
            $table->string('mobile');
            $table->string('gender');
            $table->string('resume_url');
            $table->enum('status', ['joined', 'offer rejected', 'backout after join', 'screening rejected', 'screening pending', 'cv rejected', 'interview rejected'])->nullable();

            $table->foreign('consultant_id')->references('id')->on('consultants');
            $table->foreign('jobmanager_id')->references('id')->on('jobmanagers');

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
        Schema::dropIfExists('consultant_candidates');
    }
}
