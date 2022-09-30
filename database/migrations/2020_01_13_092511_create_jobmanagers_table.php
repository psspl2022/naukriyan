<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobmanagersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobmanagers', function (Blueprint $table) {
            $table->increments('job_id');
            $table->string('title');
            $table->integer('userid')->unsigned()->index();
            $table->integer('company_id')->unsigned()->index();
            $table->string('description');
            $table->string('responsibility');
            $table->integer('job_sector_id')->unsigned()->index();
            $table->string('is_deleted');
            $table->string('job_address');
            $table->integer('job_city_id')->unsigned()->index();
            $table->integer('job_state_id')->unsigned()->index();
            $table->integer('job_category_id')->unsigned()->index();
             $table->integer('job_posted_type_id')->unsigned()->index(); 
            $table->string('expiry_date'); 
            $table->string('last_apply_date');
            $table->integer('job_questionnarie_id')->unsigned()->index();
            $table->string('job_keywords');
            $table->integer('job_benefits_id')->unsigned()->index();
            $table->string('job_skills'); 
            $table->string('job_preference'); 
            $table->string('job_shift'); 
            $table->integer('job_role'); 
            $table->string('job_carreer_level'); 
            $table->integer('job_type_id')->unsigned()->index(); 
            $table->string('grad_start_year'); 
            $table->string('grad_end_year');
            $table->string('job_vaccancy'); 
            $table->string('job_qualification'); 
            $table->string('job_exp'); 
            $table->integer('sal_disclosed'); 
            $table->string('offered_sal_min'); 
            $table->string('offered_sal_max'); 
            $table->integer('job_industry_id')->unsigned()->index(); 
            $table->integer('job_functional_role_id')->unsigned()->index(); 
            $table->string('job_position'); 
            $table->string('main_exp'); 
            $table->string('max_exp'); 
            $table->string('job_ctc'); 
            $table->string('job_for');
             $table->string('counstraint_payment');
              $table->string('reject_reason');
              $table->integer('jobfair_event_id')->unsigned()->index();
              $table->integer('status');
               $table->integer('add_by');   
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
        Schema::dropIfExists('jobmanagers');
    }
}
