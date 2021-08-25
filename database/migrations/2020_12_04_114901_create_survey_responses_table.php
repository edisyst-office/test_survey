<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSurveyResponsesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('survey_responses', function (Blueprint $table) {
            $table->id();
//            $table->unsignedBigInteger('survey_compilation_id');
//            $table->foreign('survey_compilation_id')->references('id')->on('survey_compilations');
            $table->foreignId('survey_compilation_id')->references('id')->on('survey_compilations');
            $table->foreignId('question_id')->constrained();
            $table->foreignId('answer_id')->constrained();
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
        Schema::dropIfExists('survey_responses');
    }
}
