<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBecilUserDatasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('becil_user_datas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('fname')->nullable();
            $table->string('mname')->nullable();
            $table->string('lname')->nullable();
            $table->string('mobile')->nullable();
            $table->string('email1')->nullable();
            $table->string('email2')->nullable();
            $table->integer('registration_id')->nullable();
            $table->text('aadhar_no')->nullable();
            $table->string('pan_no')->nullable();
            $table->string('dob')->nullable();
            $table->string('nationality')->nullable();
            $table->string('gender')->nullable();
            $table->text('prefered_location')->nullable();
            $table->string('category')->nullable();
            $table->string('highest_qualification')->nullable();

            $table->string('eight_school_name')->nullable();
            $table->string('eight_passing_year')->nullable();
            $table->string('eight_marks')->nullable();

            $table->string('ten_board_name')->nullable();
            $table->string('ten_passing_year')->nullable();
            $table->string('ten_marks')->nullable();
            $table->string('ten_stream')->nullable();

            $table->string('twelve_board_name')->nullable();
            $table->string('twelve_passing_year')->nullable();
            $table->string('twelve_marks')->nullable();
            $table->string('twelve_stream')->nullable();

            $table->string('diploma_institute_name')->nullable();
            $table->string('diploma_name')->nullable();
            $table->string('diploma_passing_year')->nullable();
            $table->string('diploma_marks')->nullable();
            $table->string('diploma_stream')->nullable();

            $table->string('ug_degree')->nullable();
            $table->string('ug_branch')->nullable();
            $table->string('ug_university')->nullable();
            $table->string('ug_year')->nullable();
            $table->string('ug_marks')->nullable();
            $table->string('ug_edu_type')->nullable();

            $table->string('pg_degree')->nullable();
            $table->string('pg_branch')->nullable();
            $table->string('pg_university')->nullable();
            $table->string('pg_year')->nullable();
            $table->string('pg_marks')->nullable();
            $table->string('pg_edu_type')->nullable();

            $table->string('additional_institute_name')->nullable();
            $table->string('additional_qual')->nullable();
            $table->string('additional_qual_year')->nullable();
            $table->string('additional_qual_marks')->nullable();
            $table->string('additional_qual_type')->nullable();

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
        Schema::dropIfExists('becil_user_datas');
    }
}
