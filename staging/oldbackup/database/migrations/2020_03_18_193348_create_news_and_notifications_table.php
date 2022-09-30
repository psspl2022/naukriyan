<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewsAndNotificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news_and_notifications', function (Blueprint $table) {
            $table->increments('id');
            $table->string('news_subject')->nullable();
            $table->string('one_liner_news')->nullable();  
            $table->text('description')->nullable();
            $table->enum('news_for',['All', 'Jobseeker','Employer','Consultant','SubUser'])->nullable(); 
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
        Schema::dropIfExists('news_and_notifications');
    }
}
