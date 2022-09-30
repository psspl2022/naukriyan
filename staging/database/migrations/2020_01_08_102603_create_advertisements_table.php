<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdvertisementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('advertisements', function (Blueprint $table) {
            $table->increments('ads_id');
            $table->string('ads_title');
            $table->string('ads_link');
            $table->string('ads_startdate');
            $table->string('ads_enddate');
            $table->string('ads_image');
            $table->string('ads_category');
            $table->enum('ads_for',['Employer', 'Jobseeker','Consultant','All'])->default('All');
            $table->enum('ads_status',['0', '1'])->default('1');
            $table->integer('add_by')->unsigned()->index();
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
        Schema::dropIfExists('advertisements');
    }
}
