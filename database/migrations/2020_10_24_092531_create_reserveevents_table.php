<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReserveeventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reserveevents', function (Blueprint $table) {
            $table->id();
            $table->string('checkpyment');
            $table->string('EventName');
            $table->string('Type');
            $table->string('Day');
            $table->string('Time');
            $table->string('Ticket_No');
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
        Schema::dropIfExists('reserveevents');
    }
}
