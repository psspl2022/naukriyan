<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJsCertificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('js_certifications', function (Blueprint $table) {
            $table->increments('id');
             $table->integer('js_userid')->unsigned()->index();
            $table->string('course')->nullable();
            $table->string('certificate_institute_name')->nullable();
            $table->string('cert_from_date')->nullable();
            $table->string('cert_to_date')->nullable();
            $table->string('grade')->nullable();
            $table->string('certification_type')->nullable();
            $table->text('description')->nullable();
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
        Schema::dropIfExists('js_certifications');
    }
}
