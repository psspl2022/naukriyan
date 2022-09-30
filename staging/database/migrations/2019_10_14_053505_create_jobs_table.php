<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->integer('adv_id')->unsigned()->index();
            $table->integer('recruiter_id')->unsigned()->index();
            $table->integer('job_type_id')->unsigned()->index();
            $table->integer('designation_id')->unsigned()->index();
            $table->integer('org_id')->unsigned()->index();
            $table->tinyInteger('no_of_vacancy');
            $table->text('description');
            $table->date('opening_date');
            $table->date('closing_date');
            $table->integer('location_id')->unsigned()->index();
            $table->integer('fee_sc_st_ph')->unsigned()->index();
            $table->integer('fee_gen_obc')->unsigned()->index();
            $table->integer('created_by')->unsigned()->index();
            $table->enum('active',['0', '1'])->default('1');
            $table->enum('status',['0', '1'])->default('1');
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
