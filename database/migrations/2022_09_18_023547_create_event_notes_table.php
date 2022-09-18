<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventNotesTable extends Migration
{
    public function up()
    {
        Schema::create('event_notes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->foreignId('workshop_id')->constrained();
            $table->enum('role', ['speaker', 'audience']);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('event_notes');
    }
}
