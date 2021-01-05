<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFootballFixtursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('football_fixturs', function (Blueprint $table) {
            $table->id();
            $table->string('Date');
            $table->string('HomwTeam');
            $table->string('AwayTeam');
            $table->string('Time');
            $table->string('Stadium_Name');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('football_fixturs');
    }
}
