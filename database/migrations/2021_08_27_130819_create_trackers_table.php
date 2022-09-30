<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrackersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trackers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->string('contact')->nullable();
            $table->string('key_skills')->nullable();
            $table->string('designation')->nullable();
            $table->string('experience')->nullable();
            $table->string('gender')->nullable();
            $table->string('current_ctc')->nullable();
            $table->text('expected_ctc')->nullable();
            $table->string('resume')->nullable();
            $table->text('remarks')->nullable();
            $table->string('notice_period')->nullable();
            $table->integer('employer_id')->nullable();
            $table->string('added_by')->nullable();
            $table->enum('active',['0', '1'])->default('1');
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
        Schema::dropIfExists('trackers');
    }
}
