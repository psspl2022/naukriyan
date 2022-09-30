<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmpcompaniesdetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empcompaniesdetails', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('emp_userid')->unsigned()->index();
            $table->string('company_name');
            $table->integer('company_industry')->unsigned()->index();
            $table->integer('company_state')->unsigned()->index();
            $table->integer('company_city')->unsigned()->index();
            $table->integer('company_country')->unsigned()->index();
            $table->string('address');
            $table->string('establish_date');
            $table->string('company_logo');
            $table->string('company_email');
            $table->bigInteger('company_contact');
            $table->string('cover_image');
            $table->string('website');
            $table->string('no_of_employee');
            $table->string('about');
            $table->string('company_capital');
            $table->string('cin_no');
            $table->string('tagline');
            $table->string('owner_name');
            $table->string('company_video');
            $table->string('company_package');
            $table->enum('marked_top',['No', 'Yes'])->default('No');
            $table->enum('marked_featured',['No', 'Yes'])->default('No');
            $table->integer('add_by')->unsigned()->index();
            $table->enum('active',['No', 'Yes'])->default('Yes');
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
        Schema::dropIfExists('empcompaniesdetails');
    }
}
