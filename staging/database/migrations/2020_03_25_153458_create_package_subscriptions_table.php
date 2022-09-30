<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePackageSubscriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('package_subscriptions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('package_id')->nullable()->index();
            $table->integer('user_id')->nullable()->index();
            $table->string('user_type')->nullable();
            $table->integer('job_id')->nullable();
            $table->enum('payment_status',['0', '1'])->default('0')->comment('1 for completed, 0 for not completed');
            $table->string('payment_mode')->nullable();
            $table->string('payment_date')->nullable();
            $table->enum('package_status',['0', '1'])->default('1')->comment('1 for active, 0 for de-active');
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
        Schema::dropIfExists('package_subscriptions');
    }
}
