<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('answers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('answer');

            $table->unsignedInteger('question_id')->nullable();
            $table->foreign('question_id')->references('id')->on('questions');

            $table->unsignedInteger('visitor_id')->nullable();
            $table->foreign('visitor_id')->references('id')->on('visitors');

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
        Schema::dropIfExists('answers');
    }
};





