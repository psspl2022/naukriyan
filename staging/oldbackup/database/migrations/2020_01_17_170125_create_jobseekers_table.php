<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobseekersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobseekers', function (Blueprint $table) {
          /*  $table->increments('id');
            $table->enum('user_type',['Jobseeker'])->default('Jobseeker');
            $table->string('fname')->nullable();
            $table->string('lname')->nullable();
            $table->string('email')->nullable();
            $table->string('password')->nullable();
            $table->string('username')->nullable();
            $table->bigInteger('contact')->nullable();
            $table->string('gender')->nullable();
            $table->string('aadhar_no')->nullable();
            $table->string('designation')->nullable();
            $table->string('dob')->nullable();
            $table->integer('role')->unsigned()->index()->nullable();
            $table->integer('applyjobs_id')->unsigned()->index()->nullable();
            $table->integer('savedjobs_id')->unsigned()->index()->nullable();
            $table->integer('industry_id')->unsigned()->index()->nullable();
            $table->integer('functionalrole_id')->unsigned()->index()->nullable();
            $table->string('user_token')->nullable();
            $table->string('remember_token')->nullable();
            $table->enum('email_verified',['No', 'Yes'])->default('No');
            $table->enum('contact_verified',['No', 'Yes'])->default('No');
            
            $table->enum('blocked_by_admin',['No', 'Yes'])->default('No');
            $table->enum('deleted',['No', 'Yes'])->default('No');
            $table->enum('can_edit_company',['No', 'Yes'])->default('No');
            $table->string('profile_pic_thumb')->nullable();
            $table->timestamp('last_login')->nullable();
            $table->string('user_slug')->nullable();
            $table->string('recruitment_stage')->nullable();
            $table->string('profile_complete_stage')->nullable();

            $table->integer('add_by')->unsigned()->index()->nullable();
             $table->enum('active',['No', 'Yes'])->default('No');
            $table->enum('status',['0', '1'])->default('1');
            $table->timestamps();*/
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jobseekers');
    }
}
