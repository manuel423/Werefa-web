<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBusinfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('businfos', function (Blueprint $table) {
            $table->id();
            $table->string('BusName');
            $table->integer('Bus_num')->unsigned();
            $table->string('From');
            $table->string('To');
            $table->string('TakeofTime');
            $table->string('AraivalTime');
            $table->date('Date');
            $table->integer('avilablseat')->unsigned();
            $table->integer('Price')->unsigned();
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
        Schema::dropIfExists('businfos');
    }
}
