<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJsSocialLinksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('js_social_links', function (Blueprint $table) {
            $table->increments('id'); 
            $table->integer('js_userid')->unsigned()->index();
            $table->string('facebook_link')->nullable();
            $table->string('twitter_link')->nullable();
            $table->string('linkedin_link')->nullable();
            $table->string('google_plus_link')->nullable();
            $table->string('github_link')->nullable();
            $table->string('blog_link')->nullable();
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
        Schema::dropIfExists('js_social_links');
    }
}
