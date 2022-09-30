<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePackagemanagersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('packagemanagers', function (Blueprint $table) {
            // $table->increments('id');
            // $table->string('package_name')->nullable();
            // $table->string('package_description')->nullable();
            // $table->integer('package_price')->nullable();
            // $table->integer('package_total_jobs')->nullable();
            // $table->integer('package_total_resume_downloads')->nullable();
            // $table->integer('package_total_excel_export')->nullable();
            // $table->integer('package_total_resume_views')->nullable();
            // $table->integer('package_total_resume_forward')->nullable();
            // $table->integer('package_total_resume_search')->nullable();
            // $table->integer('package_total_email')->nullable();
            // $table->integer('package_total_sms');
            // $table->integer('package_status')->default('1');
            //  $table->enum('package_recruitment_service',['No', 'Yes'])->default('No'); 
            // $table->enum('package_for',['Employeer', 'Jobseeker','Consultant']);
            // $table->string('basic_job')->nullable(); 
            // $table->string('hot_job')->nullable();
            // $table->string('premium_job')->nullable();
            // $table->string('package_service')->nullable();
            // $table->string('service_name')->nullable();
            // $table->string('service_description')->nullable();
            // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('packagemanagers');
    }
}
