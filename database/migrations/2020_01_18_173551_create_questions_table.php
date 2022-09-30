<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->nullable();
            $table->string('question_mode')->nullable();
            $table->string('question_category')->nullable();
            $table->string('title')->nullable();
            $table->text('question_name')->nullable();
            $table->text('answer')->nullable();
            $table->text('option1')->nullable();
            $table->text('option2')->nullable();
            $table->text('option3')->nullable();
            $table->text('option4')->nullable();
            $table->integer('marks')->nullable();
            $table->integer('company_id')->unsigned()->index()->nullable();
            $table->integer('industry_id')->unsigned()->index()->nullable();
            $table->integer('functionalrole_id')->unsigned()->index()->nullable();
            $table->integer('is_required')->nullable();
            $table->integer('is_shuffle')->nullable();
            $table->enum('status',['0', '1'])->default('1');
            $table->integer('add_by')->unsigned()->index()->nullable();
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
        Schema::dropIfExists('questions');
    }
}
