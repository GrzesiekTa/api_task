<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Person extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('person', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 32);
            $table->string('url', 255);
            $table->string('gender', 6);
            $table->string('culture', 64)->nullable();
            $table->string('born', 128)->nullable();
            $table->string('died', 128)->nullable();
            $table->json('titles');
            $table->json('aliases');
            $table->string('father', 255)->nullable();
            $table->string('mother', 255)->nullable();
            $table->string('spouse', 255)->nullable();
            $table->json('allegiances');
            $table->json('books');
            $table->json('povBooks');
            $table->json('tvSeries');
            $table->json('playedBy');

            $table->unsignedInteger('planetId');
            $table->foreign('planetId')->references('id')->on('planet');

            $table->unsignedInteger('typeId');
            $table->foreign('typeId')->references('id')->on('type');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('person');
    }
}
