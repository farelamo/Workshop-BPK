<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorkshopsTable extends Migration
{
    public function up()
    {
        Schema::create('workshops', function (Blueprint $table) {
            $table->id();
            $table->string('title', 200);
            $table->text('description');
            $table->text('destination');
            $table->text('image');
            $table->text('document');
            $table->date('date');
            $table->foreignId('link_id')->constrained();
            $table->foreignId('topic_id')->constrained();
            $table->integer('total_visited')->unsigned()->nullable();
            $table->integer('total_audience')->unsigned()->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('workshops');
    }
}
