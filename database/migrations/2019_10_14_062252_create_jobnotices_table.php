<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobnoticesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobnotices', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('adv_id')->unsigned()->index();
            $table->integer('designation_id')->unsigned()->index();
            $table->string('notice_heading');
            $table->string('notice_attachment');
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
        Schema::dropIfExists('jobnotices');
    }
}
