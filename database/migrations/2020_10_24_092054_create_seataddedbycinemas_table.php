<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSeataddedbycinemasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seataddedbycinemas', function (Blueprint $table) {
            $table->id();
            $table->string('Movie_Name');
            $table->string('Cinema_Place');
            $table->longtext('Seat_id');
            $table->longtext('Seat_No');
            $table->string('Day');
            $table->string('Time');
            $table->string('amount');
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
        Schema::dropIfExists('seataddedbycinemas');
    }
}
