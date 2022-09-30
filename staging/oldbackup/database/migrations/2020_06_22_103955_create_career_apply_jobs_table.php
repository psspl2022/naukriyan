<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCareerApplyJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('career_apply_jobs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('full_name');
            $table->string('email_id');
            $table->string('phone_num');
            $table->string('location');
            $table->string('experience');
            $table->string('current_ctc');
            $table->string('expected_ctc');
            $table->string('source_of_job')->nullable();
            $table->string('resume');

            $table->integer('career_id')->unsigned()->nullable();

            $table->timestamps();
            $table->softDeletes();

            $table->foreign('career_id')
                ->references('id')
                ->on('careers')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('career_apply_jobs');
    }
}
