<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('Event');
            $table->string('VVIP');
            $table->string('VIP');
            $table->string('Regular');
            $table->string('Other');
            $table->string('Date');
            $table->string('Time');
            $table->string('Location');
            $table->string('Organizer');
            $table->integer('VVIP_am')->unsigned();
            $table->integer('VIP_am')->unsigned();
            $table->integer('Regular_am')->unsigned();
            $table->integer('Other_am')->unsigned();
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
        Schema::dropIfExists('events');
    }
}
