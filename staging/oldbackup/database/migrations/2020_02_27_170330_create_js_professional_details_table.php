<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJsProfessionalDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('js_professional_details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('js_userid')->unsigned()->index();
            $table->string('designation')->nullable();
            $table->string('organisation')->nullable();
            $table->string('job_type')->nullable();
            $table->string('job_shift')->nullable();
            $table->string('industry_name')->nullable();
            $table->string('functional_area')->nullable();
            $table->string('from_date')->nullable();
            $table->string('to_date')->nullable();
            $table->string('responsibility')->nullable();
            $table->string('currently_work_here')->nullable();
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
        Schema::dropIfExists('js_professional_details');
    }
}
