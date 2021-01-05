<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventSoldTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('event_sold_tickets', function (Blueprint $table) {
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
        Schema::dropIfExists('event_sold_tickets');
    }
}
