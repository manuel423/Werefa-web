<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCinemaplacesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cinemaplaces', function (Blueprint $table) {
            $table->id();
            $table->string('cinema_id');
            $table->string('Name');
            $table->string('username');
            $table->string('password');
            $table->string('location');
            $table->integer('Screen');
            $table->integer('Price');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cinemaplaces');
    }
}
