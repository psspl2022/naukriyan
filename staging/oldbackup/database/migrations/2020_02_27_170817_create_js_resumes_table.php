<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJsResumesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('js_resumes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('js_userid')->unsigned()->index();
            $table->string('resume')->nullable();
            $table->string('resume_video_link')->nullable();
            $table->text('cover_letter')->nullable();
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
        Schema::dropIfExists('js_resumes');
    }
}
