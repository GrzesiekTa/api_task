<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PersonVehicle extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('person_vehicle', function (Blueprint $table) {
            $table->unsignedInteger('personId');
            $table->unsignedInteger('vehicleId');

            $table->foreign('personId')->references('id')->on('person');
            $table->foreign('vehicleId')->references('id')->on('vehicle');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('person_vehicle');
    }
}
