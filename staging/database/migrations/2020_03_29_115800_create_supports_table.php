<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSupportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('supports', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('support_id')->unique();
             $table->string('support_fname')->nullable();
             $table->string('support_lname')->nullable();
             $table->string('support_email')->nullable();
            $table->longtext('support_comment')->nullable();
            $table->integer('support_userid')->unsigned()->index()->nullable();
             $table->enum('support_usertype',['Employer', 'Jobseeker','Consultant','SubUser','Admin','Others']);
             $table->enum('support_subject',['1', '2','3','4','5']); 
             $table->enum('support_status',['Open', 'Close','Dropped'])->default('Open');
             $table->timestamp('support_open_date')->nullable();
            $table->timestamp('support_close_date')->nullable();
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
        Schema::dropIfExists('supports');
    }
}
