<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCareersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('careers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('post_name');
            $table->string('slug');
            $table->text('post_short_desc')->nullable();
            $table->longText('post_long_desc')->nullable();
            $table->string('skill_required');
            $table->integer('min_exp');
            $table->integer('max_exp');
            $table->integer('total_opening');
            $table->string('current_ctc');
            $table->string('interview_process');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('careers');
    }
}
