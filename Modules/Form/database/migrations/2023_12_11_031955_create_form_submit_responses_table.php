<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('form_submit_responses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('form_submit_id');
            $table->unsignedBigInteger('question_id');
            $table->string('answer_type'); // text, option
            $table->text('answer_value');
            $table->timestamps();

            $table->foreign('form_submit_id')->references('id')->on('form_submits');
            $table->foreign('question_id')->references('id')->on('form_questions');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('form_submit_responses');
    }
};
