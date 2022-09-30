<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVenuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('venues', function (Blueprint $table) {
            $table->increments('id');
            $table->string('venue_name');
            $table->text('venue_address');
            $table->string('contact_person');
            $table->string('email');
            $table->bigInteger('contact_no');
            $table->text('instructions');
            $table->enum('venue_status',['0', '1'])->default('1');
            $table->integer('add_by'); 
            $table->string('add_by_usertype');  

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
        Schema::dropIfExists('venues');
    }
}
