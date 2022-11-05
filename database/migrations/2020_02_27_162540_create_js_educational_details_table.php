<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJsEducationalDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('js_educational_details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('js_userid')->unsigned()->index();
            $table->string('education')->nullable();
            $table->string('degree_name')->nullable();
            $table->string('course_type')->nullable();
            $table->string('percentage_grade')->nullable();
            $table->string('passing_year')->nullable();
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
        Schema::dropIfExists('js_educational_details');
    }
}
