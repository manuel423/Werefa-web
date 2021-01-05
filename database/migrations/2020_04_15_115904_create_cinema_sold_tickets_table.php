<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCinemaSoldTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cinema_sold_tickets', function (Blueprint $table) {
            $table->id();
            $table->string('checkpyment');
            $table->string('Movie_Name');
            $table->string('Cinema_Place');
            $table->longtext('Seat_id');
            $table->longtext('Seat_No');
            $table->string('Day');
            $table->string('Time');
            $table->string('amount');
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
        Schema::dropIfExists('cinema_sold_tickets');
    }
}
