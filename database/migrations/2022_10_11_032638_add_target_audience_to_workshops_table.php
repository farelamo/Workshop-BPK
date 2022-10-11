<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTargetAudienceToWorkshopsTable extends Migration
{
    public function up()
    {
        Schema::table('workshops', function (Blueprint $table) {
            $table->foreignId('target_audience_id')->constrained()->after('topic_id');
        });
    }

    public function down()
    {
        Schema::table('workshops', function (Blueprint $table) {
            $table->dropColumn('target_audience_id');
        });
    }
}
