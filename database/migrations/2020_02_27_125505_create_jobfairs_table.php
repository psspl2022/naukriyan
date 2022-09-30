<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobfairsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobfairs', function (Blueprint $table) {
            $table->increments('id');
              $table->string('events_name')->nullable();
            $table->date('event_start_date')->nullable();
             $table->date('event_end_date')->nullable();
              $table->integer('event_no_of_company')->nullable();
               $table->string('event_companies_name')->nullable();
                $table->string('status')->nullable();
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
        Schema::dropIfExists('jobfairs');
    }
}
