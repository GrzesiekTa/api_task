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
            $table->id();
            $table->string('url');
            $table->string('name', 32);
            $table->string('gender', 6);
            $table->string('culture', 64)->nullable();
            $table->string('born', 128)->nullable();
            $table->string('died', 64)->nullable();
            $table->json('titles');
            $table->json('aliases');
            $table->string('father')->nullable();
            $table->string('mother')->nullable();
            $table->string('spouse')->nullable();
            $table->json('allegiances');
            $table->json('books');
            $table->json('povBooks');
            $table->json('tvSeries');
            $table->json('playedBy');

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
        Schema::dropIfExists('person');
    }
}
