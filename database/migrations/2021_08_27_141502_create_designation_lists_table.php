<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDesignationListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('designation_lists', function (Blueprint $table) {
            $table->increments('id');
            $table->string('designation')->nullable();
            $table->string('description')->nullable();
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
        Schema::dropIfExists('designation_lists');
    }
}
