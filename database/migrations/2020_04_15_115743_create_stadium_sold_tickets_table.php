<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStadiumSoldTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stadium_sold_tickets', function (Blueprint $table) {
            $table->id();
            $table->string('checkpyment');
            $table->string('Home_Team');
            $table->string('Away_Team');
            $table->string('Stadium_Name');
            $table->string('Stadium_Section');
            $table->string('Time');
            $table->string('Day');
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
        Schema::dropIfExists('stadium_sold_tickets');
    }
}
