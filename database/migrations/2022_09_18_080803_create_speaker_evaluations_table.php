<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSpeakerEvaluationsTable extends Migration
{
    public function up()
    {
        Schema::create('speaker_evaluations', function (Blueprint $table) {
            $table->id();
            $table->text('comfortable')->nullable();
            $table->text('event_suggestion')->nullable();
            $table->text('file')->nullable();
            $table->foreignId('user_id')->constrained();
            $table->foreignId('workshop_id')->constrained();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('speaker_evaluations');
    }
}
