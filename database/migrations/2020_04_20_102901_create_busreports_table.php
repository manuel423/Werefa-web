<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBusreportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('busreports', function (Blueprint $table) {
            $table->id();
            $table->string('Bus_Name');
            $table->string('Bus_No');
            $table->string('From');
            $table->string('To');
            $table->string('Time');
            $table->date('Date');
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
        Schema::dropIfExists('busreports');
    }
}
