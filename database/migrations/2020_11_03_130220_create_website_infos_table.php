<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWebsiteInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::create('website_infos', function (Blueprint $table) {
        //     $table->increments('id');
        //     $table->string('logo');
        //     $table->text('about_us');
        //     $table->text('terms_and_condition');
        //     $table->text('privacy_policy');
        //     $table->text('guidelines_faqs');
        //     $table->timestamps();
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('website_infos');
    }
}
