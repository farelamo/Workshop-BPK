<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAudienceEvaluationsTable extends Migration
{
    public function up()
    {
        Schema::create('audience_evaluations', function (Blueprint $table) {
            $table->id();
            $table->text('received')->nullable();
            $table->text('speaker_suggestion')->nullable();
            $table->text('event_suggestion')->nullable();
            $table->text('note')->nullable();
            $table->foreignId('user_id')->constrained();
            $table->foreignId('workshop_id')->constrained();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('audience_evaluations');
    }
}
