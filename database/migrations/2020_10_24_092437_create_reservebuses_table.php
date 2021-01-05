<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservebusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservebuses', function (Blueprint $table) {
            $table->id();
            $table->string('checkpyment');
            $table->string('Bus_id');
            $table->string('Bus_Name');
            $table->string('Bus_No');
            $table->string('From');
            $table->string('To');
            $table->string('Time');
            $table->date('Date');
            $table->longtext('Seat_id');
            $table->longtext('Seat_No');
            $table->string('amount');
            $table->string('Ticket_No');
            $table->string('Name');
            $table->string('Phone');
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
        Schema::dropIfExists('reservebuses');
    }
}
