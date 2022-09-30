<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSaveCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('save_comments', function (Blueprint $table) {
            $table->increments('id');
            $table->string('comment');
            $table->integer('emp_userid')->comment('Comment By');
            $table->integer('js_userid')->comment('Comment To');
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
        Schema::dropIfExists('save_comments');
    }
}
