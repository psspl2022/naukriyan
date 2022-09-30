<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMyInboxesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('my_inboxes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('sender_email');
            $table->string('sender_usertype');
            $table->string('receiver_email');
            $table->string('receiver_usertype');
            $table->string('subject');
            $table->string('attachment');
            $table->text('message');
            $table->enum('status',['0', '1'])->default('1');
            $table->enum('read_status',['0', '1'])->default('1');
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
        Schema::dropIfExists('my_inboxes');
    }
}
