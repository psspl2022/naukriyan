<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEnquiriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enquiries', function (Blueprint $table) {
            $table->increments('id');
            $table->string('enq_name')->nullable();
              $table->string('enq_email')->nullable();
              $table->bigInteger('enq_contact')->nullable();
              $table->enum('enq_type',['1', '2','3','4','5']);
              $table->longtext('enq_message')->nullable();
              $table->integer('enq_userid')->unsigned()->index()->nullable();
            $table->enum('enq_usertype',['Employer', 'Jobseeker','Consultant','SubUser','Admin','Others'])->default('Others');
            $table->enum('enq_status',['Open', 'Close'])->default('Open');
            $table->timestamp('enquiry_open_date')->nullable();
            $table->timestamp('enquiry_close_date')->nullable();
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
        Schema::dropIfExists('enquiries');
    }
}
